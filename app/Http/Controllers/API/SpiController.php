<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Imports\SpiImport;
use App\Models\Spi;
use App\Exports\SpiExport;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class SpiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $status = null;
    protected $err = null;
    protected $data = null;

    public function index()
    {
        $first = Spi::select('id_mahasiswa')->distinct()->get();
        $final = [];
        foreach ($first as $key=>$value) {
            $second[$key] = Spi::select(
            'mahasiswa.nama',
            'spi.id',
            'spi.tarif',
            'spi.id_mahasiswa',
            'spi.tanggal_pembayaran',
            DB::raw("SUM(spi.pembayaran) as nom_pembayaran"),
            DB::raw("spi.tarif - SUM(spi.pembayaran) as piutang"))
            ->where('spi.id_mahasiswa', $first[$key]->id_mahasiswa)
            ->join('mahasiswa', 'spi.id_mahasiswa', '=', 'mahasiswa.nrp')
            ->get();
        }

        foreach ($second as $key=>$value) {
            array_push($final, $second[$key][0]);
        }


        $this->data = $final;
        $this->status = "success";


        return response()->json([
            "status" => $this->status,
            "data" => $this->data,
            "error" => $this->err,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function import(Request $req) {
        $data = Excel::toArray(new SpiImport, $req->file);
        $container = $data[0];
        $finalArr = array();

        foreach ($container as $key=>$value) {
            $container[$key]['tgl_pembayaran'] = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject( $container[$key]['tgl_pembayaran'])->format('Y-m-d');

            array_push($finalArr, [
                'id_mahasiswa' => $container[$key]['nim'],
                'tarif' => $container[$key]['tarif_spi'],
                'pembayaran' => $container[$key]['pembayaran_spi'],
                'tanggal_pembayaran' => $container[$key]['tgl_pembayaran'],
                'piutang' => $container[$key]['piutang']
            ]);
         };

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

         return response()->json([
            "status" => $this->status,
            "data" => $this->data,
            "error" => $this->err,
         ]);
    }

    public function export() {
        return Excel::download(new SpiExport, 'export.xlsx');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->data = Spi::select(
            'spi.id_mahasiswa',
            'mahasiswa.nama',
            'spi.tanggal_pembayaran',
            'spi.pembayaran',
            'spi.keterangan')
            ->where('id_mahasiswa', $id)
            ->join('mahasiswa', 'spi.id_mahasiswa', '=', 'mahasiswa.nrp')
            ->get();
        
        $this->status = "success";

        return response()->json([
            "status" => $this->status,
            "data" => $this->data,
            "error" => $this->err,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
