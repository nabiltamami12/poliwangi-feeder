<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Imports\SpiImport;
use App\Models\Spi;
use App\Exports\SpiExport;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Database\QueryException;

class SpiController extends Controller
{
    protected $status = null;
    protected $error = null;
    protected $data = null;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        try {
            $this->data = Spi::select('mahasiswa.nama', 'mahasiswa.nrp', 'spi.id', 'spi.tarif', 'spi.id_mahasiswa', 'spi.tanggal_pembayaran', DB::raw("SUM(spi.pembayaran) as nom_pembayaran"), DB::raw("spi.tarif - SUM(spi.pembayaran) as piutang"))->join('mahasiswa', 'mahasiswa.nomor', '=', 'spi.id_mahasiswa')->groupBy('spi.id_mahasiswa')->get();
            $this->status = "success";
        } catch (QueryException $e) {
            $this->status = "failed";
            $this->error = $e;
        }
        return response()->json([
            "status" => $this->status,
            "data" => $this->data,
            "error" => $this->error
        ]);
    }

    public function import(Request $req) {
        $data = Excel::toArray(new SpiImport, $req->file);
        $container = $data[0];
        $finalArr = array();

        foreach ($container as $key=>$value) {
            $mhs = DB::table('mahasiswa')->select('nomor', 'program_studi')->where('nrp', $container[$key]['nim'])->first();
            $id_mahasiswa = $mhs->nomor;
            $program_studi = $mhs->program_studi;
            $tarif_spi = DB::table('tarif_kelompok')->select('spi')->where('program_studi', $program_studi)->first()->spi;
            Spi::where('id_mahasiswa', $id_mahasiswa)->delete();
            $container[$key]['tgl_pembayaran'] = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject( $container[$key]['tgl_pembayaran'])->format('Y-m-d');

            array_push($finalArr, [
                'id_mahasiswa' => $id_mahasiswa,
                'tarif' => $tarif_spi,
                'pembayaran' => $container[$key]['pembayaran_spi'],
                'tanggal_pembayaran' => $container[$key]['tgl_pembayaran'],
                'piutang' => $container[$key]['piutang']
            ]);
        };
         
        try {
            foreach ($finalArr as $key=>$value) {
                $check = Spi::where([
                    ['id_mahasiswa', $finalArr[$key]['id_mahasiswa']],
                    ['tanggal_pembayaran', $finalArr[$key]['tanggal_pembayaran']]
                ]);
                if ($check->get()->isEmpty() == true) {
                   Spi::insert($finalArr[$key]);       
                } else {  
                   $check->update($finalArr[$key]);
                }
            } 
   
            $this->status = "success";
            $this->data = $finalArr;
        } catch (QueryException $e) {
            $this->status = "failed";
            $this->error = $e;
        }
        return response()->json([
            "status" => $this->status,
            "data" => $this->data,
            "error" => $this->error
        ]);
    }

    public function export($prodi) {
        if ($prodi == null) {
            return response()->json([
                'status' => 'error', 
                "data" => null, 
                'error' => "Parameter tidak lengkap."]);
        } else {
            $get = DB::table('program_studi')->select('program_studi')->where('nomor', $prodi)->get();
            $program_studi =  strtoupper($get[0]->program_studi);
            $filename = "rekapspi_".strtolower(str_replace(' ', '_',  $program_studi)).".xlsx";
            return Excel::download(new SpiExport($prodi, $program_studi), $filename);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $this->data = Spi::select(
                'spi.id_mahasiswa',
                'mahasiswa.nama',
                'spi.tanggal_pembayaran',
                'spi.pembayaran',
                'spi.keterangan')
                ->where('id_mahasiswa', $id)
                ->join('mahasiswa', 'spi.id_mahasiswa', '=', 'mahasiswa.nomor')
                ->get();
            
            $this->status = "success";
        } catch (QueryException $e) {
            $this->status = "failed";
            $this->error = $e;
        }
        return response()->json([
            "status" => $this->status,
            "data" => $this->data,
            "error" => $this->error
        ]);
    }
}
