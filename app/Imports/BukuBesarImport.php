<?php

namespace App\Imports;

use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithCalculatedFormulas;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use App\Models\Mahasiswa;
use App\Models\KeuanganPembayaran;

class BukuBesarImport implements ToCollection, WithHeadingRow, WithCalculatedFormulas, SkipsEmptyRows
{
    private $res = [
        "error" => [],
        "nim_not_exist" => [],
    ];

    public function result()
    {
        if (!$this->res) return ['import' => 'success'];
        return $this->res;
    }

    public function collection(Collection $rows)
    {
        try {
            foreach ($rows as $i) {
                DB::beginTransaction();
                $cek_mhs = Mahasiswa::select('nomor','ukt_kelompok','ukt_nominal')
                    ->where('nrp', $i['nim'])
                    ->first();
                if(!$cek_mhs){
                    $this->res['nim_not_exist'][] = $i['nim'];
                    continue;
                }
                // update if not exist kelompok ukt
                if (!$cek_mhs->ukt_kelompok) {
                    Mahasiswa::where('nrp', $i['nim'])
                        ->update([
                            'ukt_kelompok' => $i['klp_ukt'],
                            'ukt_nominal' => $i['tarif_ukt']
                        ]);
                }
                // updateOrCreate
                $res = [];
                $res[$i['nim']] = 0;
                for ($smt=1; $smt <= 14; $smt++) {
                    if (!$i[$smt]) continue;
                    KeuanganPembayaran::updateOrCreate(
                        [ 'id_mahasiswa' => $cek_mhs->nomor, 'semester' => $smt ],
                        [
                            'nominal' => $i[$smt], 
                            'status' => '1',
                            'keterangan' => "data unggahan",
                            'semester' => $smt,
                            'id_mahasiswa' => $cek_mhs->nomor
                        ]
                    );
                    $res[$i['nim']] += 1;
                }

                $this->res[] = $res;
                DB::commit();
            }
        } catch(QueryException $e) {
            $res["error"] = $e;
        }
    }

    public function headingRow(): int
    {
        return 4;
    }
}
