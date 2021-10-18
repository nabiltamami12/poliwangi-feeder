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
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Database\QueryException;
use App\Imports\BukuBesarImport;
use App\Exports\PiutangExport;

class BerkasKeuanganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected $status = null;
    protected $error = null;
    protected $data = null;

    public function index()
    {
        try {
            $data = BK::select(
            'keuangan_piutang.id', 
            'keuangan_piutang.id_mahasiswa', 
            'keuangan_piutang.path_perjanjian', 
            'mahasiswa.nrp as nim',
            'mahasiswa.nama',
            DB::raw('CASE WHEN jenis = "spi" THEN total ELSE 0 END as SPI'),
            DB::raw('CASE WHEN jenis = "ukt" THEN total ELSE 0 END as UKT'),
            DB::raw('SUM(CASE WHEN id_mahasiswa = id_mahasiswa THEN `keuangan_piutang`.total END) as jumlah'),
            'keuangan_piutang.status as status_piutang')
            ->join('mahasiswa', 'mahasiswa.nomor', '=', 'keuangan_piutang.id_mahasiswa')
            ->groupBy('keuangan_piutang.id_mahasiswa')
            ->get();
            $this->data = $data;
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
        try {
            $this->data = BK::select(
                DB::raw('sum(total) as total_piutang, 
                sum(case when status_lunas = "belum_lunas" THEN total END) as belum_terbayar,
                count(distinct case when status_lunas = "belum_lunas" then id_mahasiswa END) as total_mahasiswa')
            )->first();
    
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

        try {
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
                $this->data = $document;
                $this->status = "success";
            }
        } catch (QueryException $e) {
            $this->status = "failed";
            $this->error = $e;
        }
        return response()->json([
            "status" => $this->status,
            "data" => $this->data,
            'error' => $this->err
        ]);
    }

    public function detail_cicilan(Request $req, $id) {
        try {
            $record = BK::findOrFail($id);
            $tenor = $req->tenor;
            
            $final_nominal = array_map('intval', $req->nominal);
            $final_tanggal = array_map('intval', $req->tanggal);
            $total = array_sum($final_nominal);
            $record->nominal = $final_nominal;
            $record->tanggal = $final_tanggal;
            $record->total = $total;
            $record->tenor = $tenor;
            $record->save();
    
            for ($y = 0; $y < $tenor; $y++) {
                $check = DB::table('keuangan_pembayaran')->where([
                    'id_mahasiswa' => $req->id_mahasiswa,
                    'id_piutang' => $req->id_piutang,
                    'tanggal' => $final_tanggal[$y],
                    'nominal' => $final_nominal[$y],
                ])->first();
                if ($check==null) {
                    $other = new KB;
                    $other->id_mahasiswa = $req->id_mahasiswa;
                    $other->id_piutang = $id;
                    $other->tanggal = $final_tanggal[$y];
                    $other->nominal = $final_nominal[$y];
                    $other->status = "belum_terbayar";
                    $other->keterangan = "pembayaran SPI";
                    $other->save();
                }
            }
    
            $this->status = 'success';
            $this->data = $record;
        } catch (QueryException $e) {
            $this->status = "failed";
            $this->error = $e;
        }
   

        return response()->json([
            'status' => $this->status,
            'data' => $this->data,
            'err' => $this->error,
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
        try {
            $data = BK::findOrFail($id);
            $data->status = "approved";
            $data->save();
            $this->data = $data;
            $this->status = "success";
        } catch (QueryException $e) {
            $this->status = "failed";
            $this->error = $e;
        }
        return response()->json([
            'status' => $this->status,
            'data' => $this->data,
            'error' => $this->err
        ]);
    }

    public function perjanjian(Request $request, $id) {
        try {
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
            $record->path_perjanjian = '/berkas_keuangan/perjanjian/'.$namafile;
            $path = public_path(). '/berkas_keuangan/perjanjian/'.$namafile;
            $check = file_exists($path);
    
            if ($check) {
                $delete = File::delete($path);
                $files->storeAs('berkas_keuangan/perjanjian', $namafile, 'public');
            } else {
                $files->move(public_path() . '/berkas_keuangan/perjanjian', $namafile);
            }
    
            $record->save();
            $this->status = "success";
            $this->data = $record;
        } catch (QueryException $e) {
            $this->status = "failed";
            $this->error = $e;
        }
        return response()->json([
                "status" => $this->status,
                "data" => $this->data,
                'error' => $this->error,
        ]);
    }

    public function upload_buku_besar(Request $request)
    {
        try {
            $import = new BukuBesarImport;
            Excel::import($import, $request->file);
            
            $this->status = "success";
            $this->data = $import->result();
        } catch (QueryException $e) {
            $this->status = "failed";
            $this->error = $e;
        }
        return response()->json([
            "status" => $this->status,
            "data" => $this->data,
            'error' => $this->error,
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

    public function penyisihanpiutang()
    {
        try {
            $data = BK::select(
            'keuangan_piutang.id', 
            'keuangan_piutang.id_mahasiswa', 
            'keuangan_piutang.total', 
            'mahasiswa.nrp as nim',
            'mahasiswa.nama',
            DB::raw('SUM(CASE WHEN id_mahasiswa = id_mahasiswa THEN `keuangan_piutang`.total END) as jumlah'),
            'keuangan_piutang.status as status_piutang')
            ->join('mahasiswa', 'mahasiswa.nomor', '=', 'keuangan_piutang.id_mahasiswa')
            ->groupBy('keuangan_piutang.id_mahasiswa')
            ->get();
            $this->data = $data;
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

    public function export_piutang()
    {
        ini_set('memory_limit', '-1');
        ini_set('max_execution_time', '-1');
        return Excel::download(new PiutangExport, 'Rekap Piutang Mahasiswa.xlsx');
    }
}
