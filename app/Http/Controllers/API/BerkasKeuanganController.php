<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\File;
use App\Models\BerkasKeuangan as BK;
use Illuminate\Support\Facades\DB;
use App\Models\KeuanganPembayaran as KB;

class BerkasKeuanganController extends Controller
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
        $this->data = BK::select('keuangan_piutang.id_mahasiswa', 
        'mahasiswa.nama',
        DB::raw('CASE WHEN jenis = "spi" THEN total ELSE "-" END as SPI'),
        DB::raw('CASE WHEN jenis = "ukt" THEN total ELSE "-" END as UKT'),
        DB::raw('SUM(CASE WHEN id_mahasiswa = id_mahasiswa THEN `keuangan_piutang`.total END) as jumlah'),
        'keuangan_piutang.status as status_piutang')
        ->join('mahasiswa', 'mahasiswa.nrp', '=', 'keuangan_piutang.id_mahasiswa')
        ->groupBy('keuangan_piutang.id_mahasiswa')
        ->get();

        $this->status = "success";

        return response()->json([
            "status" => $this->status,
            "data" => $this->data,
            "error" => $this->err
        ]);
    }

    public function detail_dokumen($id) {
        $this->data = BK::select(
            DB::raw('right(path_perjanjian, 16) as dokumen_perjanjian,
                     right(path_pengajuan, 15) as dokumen_pengajuan')
        )->where('id_mahasiswa', $id)
        ->get();
        $this->status = "success";

        return response()->json([
            "status" => $this->status,
            "data" => $this->data,
            "error" => $this->err
        ]);
    }

    public function statistik() {
        $this->data = BK::select(
            DB::raw('sum(total) as total_piutang, 
            sum(case when status_lunas = "belum_lunas" THEN total END) as belum_terbayar,
            count(distinct case when status_lunas = "belum_lunas" then id_mahasiswa END) as total_mahasiswa')
        )->get();

        $this->status = "success";

        return response()->json([
            "status" => $this->status,
            "data" => $this->data,
            "error" => $this->err
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $validator = Validator::make(
            $data,
            [
                'file' => 'required|mimes:doc,docx,pdf,txt|max:2048',
                'id_mahasiswa' => 'required',
                'jenis' => 'required',
            ]
        );

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        }


        if ($files = $request->file('file')) {
            $namafile = $request->id_mahasiswa.'_'.$files->getClientOriginalName();
            $document = new BK();
            $document->path_pengajuan = '/berkas_keuangan/'.$namafile;
            $document->id_mahasiswa = $request->id_mahasiswa;
            $document->tahun = Carbon::now()->format('Y');
            $document->status_lunas = "belum_lunas";
            $document->status = "not_approved";

            $path = public_path(). '/berkas_keuangan/'.$namafile;
            $check = file_exists($path);
            if ($check) {
                $delete = File::delete($path);
                $files->storeAs('berkas_keuangan', $namafile, 'public');
            } else {
                $files->storeAs('berkas_keuangan', $namafile, 'public');
            }
            $files->move(public_path() . '/berkas_keuangan', $namafile);
            $document->save();
            $this->status = "success";


            return response()->json([
                "status" => $this->status,
                "message" => "File successfully uploaded",
                "data" => $document,
                'error' => $this->err
            ]);
        }
    }

    public function detail_cicilan(Request $req, $id) {
        $record = BK::findOrFail($id);
        $limit = $req->tenor;
        $array_nominal = [];
        $array_bulan = [];
        for ($x = 1; $x <= $limit; $x++) {
            $string = "nominal_{$x}";
            $month = "bulan_{$x}";
            $array_nominal[] = $req->$string;
            $array_bulan[] = $req->$month;
        }
        $final_nominal = json_encode($array_nominal, JSON_UNESCAPED_SLASHES);
        $final_bulan = json_encode($array_bulan, JSON_UNESCAPED_SLASHES);
        $total = array_sum($array_nominal);
        $record->nominal = $final_nominal;
        $record->bulan = $final_bulan;
        $record->total = $total;
        $record->tenor = $limit;
        $record->save();

        for ($y = 0; $y < $limit; $y++) {
            $other = new KB;

            $other->id_mahasiswa = $record->id_mahasiswa;
            $other->id_piutang = $record->id;
            $other->bulan = $array_bulan[$y];
            $other->nominal = $array_nominal[$y];
            $other->status = "belum_terbayar";
            $other->keterangan = "pembayaran SPI";
            $other->save();
        }


        $this->status = 'success';
        $this->data = $record;
        return response()->json([
            'status' => $this->status,
            'data' => $this->data,
            'err' => $this->err,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    public function approve($id) {
        $data = BK::findOrFail($id);
        $data->status = "approved";
        $data->save();
        $this->data = $data;
        $this->status = "success";
        return response()->json([
            'status' => $this->status,
            'data' => $this->data,
            'error' => $this->err
        ]);
    }

    public function perjanjian(Request $request, $id) {
        $record = BK::findOrFail($id);
        $data = $request->all();
        $validator = Validator::make(
            $data,
            [
                'file' => 'required|mimes:doc,docx,pdf,txt|max:2048',
            ]
        );

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors(), 'data' => $data], 401);
        }
        $files = $request->file('file');

        $namafile = $record->id_mahasiswa.'_'.$files->getClientOriginalName();
        $record->path_perjanjian = '/berkas_keuangan/'.$namafile;
        $path = public_path(). '/berkas_keuangan/'.$namafile;
        $check = file_exists($path);

        if ($check) {
            $delete = File::delete($path);
            $files->storeAs('berkas_keuangan', $namafile, 'public');
        } else {
            $files->move(public_path() . '/berkas_keuangan', $namafile);
        }

        $record->save();
        return response()->json([
                "status" => $this->status,
                "message" => "File successfully updated",
                "data" => $record,
                'error' => $this->err,
                'file' => $check
        ])
        ;

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
