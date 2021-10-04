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
                for ($i=0; $i < ; $i++) { 
                    // code...
                }
                // KeuanganPembayaran::updateOrCreate(
                //     ['id_mahasiswa' => $cek_mhs->nomor, 'semester' => $i['semester']],

                // );

                // id_mahasiswa #
                // semester #
                // nominal
                // status "1"
                // keterangan "data unggahan"
                $this->res[] = $cek_mhs;

                // $this->res[] = $cek_mhs;
                // $this->res[] = $row['nama'];
                // $row[99] = 'tes';
                // $this->res[] = $row;
            }


            // DB::beginTransaction();
            // DB::commit();
        } catch(QueryException $e) {
            $res["error"] = $e;
        }
    }

    public function headingRow(): int
    {
        return 4;
    }
}
