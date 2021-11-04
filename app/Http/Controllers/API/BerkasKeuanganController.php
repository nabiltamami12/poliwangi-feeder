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
use App\Models\Periode;
use Illuminate\Validation\Rule;

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
            $periode = Periode::select('tahun', 'semester')->orderByDesc('status')->orderByDesc('tahun')->limit(1)->get();
            $data = BK::select(
            'keuangan_piutang.id', 
            'keuangan_piutang.id_mahasiswa', 
            'keuangan_piutang.path_perjanjian', 
            'mahasiswa.nrp as nim',
            'mahasiswa.nama',
            'mahasiswa.ukt',
            DB::raw('CASE WHEN jenis = "spi" THEN total ELSE 0 END as SPI'),
            DB::raw('SUM(CASE WHEN id_mahasiswa = id_mahasiswa THEN `keuangan_piutang`.total END) as jumlah'),
            'keuangan_piutang.status as status_piutang')
            ->where('tahun','=',$periode[0]->tahun)
            ->where('keuangan_piutang.semester','=',$periode[0]->semester)
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

    public function detail_piutang($id_piutang) {
        $periode = Periode::select('tahun', 'semester')->orderByDesc('status')->orderByDesc('tahun')->limit(1)->get();
        $data = BK::select(
            'keuangan_piutang.id', 
            'keuangan_piutang.id_mahasiswa', 
            'keuangan_piutang.path_perjanjian', 
            'keuangan_piutang.path_pengajuan', 
            'mahasiswa.nrp as nim',
            'mahasiswa.nama',
            'mahasiswa.ukt',
            DB::raw('CASE WHEN jenis = "spi" THEN total ELSE 0 END as SPI'),
            DB::raw('SUM(CASE WHEN id_mahasiswa = id_mahasiswa THEN `keuangan_piutang`.total END) as jumlah'),
            'keuangan_piutang.status as status_piutang')
            ->join('mahasiswa', 'mahasiswa.nomor', '=', 'keuangan_piutang.id_mahasiswa')
            ->groupBy('keuangan_piutang.id_mahasiswa')
            ->where('keuangan_piutang.id', $id_piutang)
            ->where('keuangan_piutang.tahun', $periode[0]->tahun)
            ->where('keuangan_piutang.semester', $periode[0]->semester)
            ->get();
        if (isset($data[0])) {
            $data = $data[0];
            $data->cicilan = KB::where(['id_piutang' => $id_piutang])->get();
            $data->riwayat = BK::where('id_mahasiswa', $data->id_mahasiswa)->where('id', '!=', $id_piutang)->orderByDesc('tahun')->orderByDesc('semester')->get();
            foreach ($data->riwayat as $key => $value) {
                $data->riwayat[$key]->cicilan = KB::where(['id_piutang' => $value->id])->get();
            }
            $this->data = $data;
        }
        $this->status = "success";

        return response()->json([
            "status" => $this->status,
            "data" => $this->data,
            "error" => $this->error
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

    public function template_perjanjian(Request $request) {
        try {
            $data = $request->all();
            $validator = Validator::make(
                $data,
                [
                    'file' => 'required|mimes:doc,docx,pdf|max:2048',
                ]
            );
    
            if ($validator->fails()) {
                return response()->json(['error' => $validator->errors(), 'data' => $data], 401);
            }

            if ($request->hasFile('file')) {
                $nilai = date('YmdHi').$request->file->getClientOriginalName();
                if($request->file->storeAs('template', $nilai)){
                    $setting = DB::table('setting')->where('nama', 'like', 'template_perjanjian_%')->orderByDesc('nama')->limit(1)->get();
                    if (!isset($setting[0])) {
                        DB::table('setting')->insert([
                            'nama' => 'template_perjanjian_1',
                            'nilai' => $nilai,
                            'keterangan' => 'Template Perjanjian',
                        ]);
                        $this->data = ['file' => 'template_perjanjian_1'];
                    }else{
                        $version = intval(str_replace('template_perjanjian_', '', $setting[0]->nama))+1;
                        DB::table('setting')->insert([
                            'nama' => 'template_perjanjian_'.$version,
                            'nilai' => $nilai,
                            'keterangan' => 'Template Perjanjian',
                        ]);
                        $this->data = ['file' => 'template_perjanjian_'.$version];

                    }
                    $this->status = "success";
                }
            }
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

    public function download_template_perjanjian()
    {
        $template_perjanjian = DB::table('setting')->where('nama', 'like', 'template_perjanjian_%')->orderByDesc('nama')->get();
        if (!isset($template_perjanjian[0])) {
            abort(404);
        }
        $pathToFile = storage_path('app/template/' . $template_perjanjian[0]->nilai);
        return response()->download($pathToFile);
    }

    public function check_template_perjanjian()
    {
        $template_perjanjian = DB::table('setting')->where('nama', 'like', 'template_perjanjian_%')->orderByDesc('nama')->get();
        $this->data = null;
        $this->status = "error";
        $this->error = 'File not found!';
        if (isset($template_perjanjian[0])) {
            $this->data = url('/api/v1/download/template-perjanjian');
            $this->status = "success";
            $this->error = null;
        }
        return response()->json([
                "status" => $this->status,
                "data" => $this->data,
                'error' => $this->error,
        ]);
    }

    public function perjanjian(Request $request) {
        try {
            $data = $request->all();
            $validator = Validator::make(
                $data,
                [
                    // 'file' => 'required|mimes:doc,docx,pdf,txt|max:2048',
                    'id_mahasiswa' => 'required'
                ]
            );
    
            if ($validator->fails()) {
                return response()->json(['error' => $validator->errors(), 'data' => $data], 401);
            }
            $periode = Periode::select('tahun', 'semester')->orderByDesc('status')->orderByDesc('tahun')->limit(1)->get();
            $current_data = BK::select('id')->where('id_mahasiswa','=',$data['id_mahasiswa'])->where('tahun','=',$periode[0]->tahun)->where('semester','=',$periode[0]->semester)->limit(1)->get();
            if (!isset($current_data[0]) /*&& $request->hasFile('file')*/) {
                // $path_pengajuan = $data['id_mahasiswa'].'_'.$periode[0]->tahun.'_'.$request->file->getClientOriginalName();
                // if($request->file->storeAs('piutang', $path_pengajuan)){
                    $document = new BK();
                    // $document->path_pengajuan = '/piutang/'.$path_pengajuan;
                    $document->id_mahasiswa = $data['id_mahasiswa'];
                    $document->tahun = $periode[0]->tahun;
                    $document->semester = $periode[0]->semester;
                    $document->status = "Pending";
                    $document->save();
                    $this->data = $document;
                    $this->status = "success";
                // }
            }
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

    public function cicilan_piutang(Request $request)
    {
        $data = $request->all();
        $status_piutang = $data['status_piutang'];
        $bk = BK::find($data['id_piutang']);
        $bk->status = $status_piutang;
        $bk->save();
        if (isset($data['cicilan'])) {
            $total = count($data['cicilan']);

            $check = DB::table('keuangan_pembayaran')->where([
                'id_mahasiswa' => $data['id_mahasiswa'],
                'id_piutang' => $data['id_piutang'],
            ])->first();

            $belum_lunas = KB::where('id_mahasiswa', '=', $data['id_mahasiswa'])->where('status', '=', null)->first();

            if ($check==null && $belum_lunas == null) {
                // KB::where('id_mahasiswa', '=', $data['id_mahasiswa'])->where('status', '=', null)->update([
                //     'nominal' => 0,
                //     'status' => 1
                // ]);
                for ($i = 0; $i < $total; $i++) {
                    $other = new KB;
                    $other->id_mahasiswa = $data['id_mahasiswa'];
                    $other->id_piutang = $data['id_piutang'];
                    $other->tanggal = $data['jatuh_tempo'][$i];
                    $other->nominal = $data['cicilan'][$i];
                    $other->keterangan = "UKT";
                    $other->save();
                    $this->status = 'success';
                }
            }
        }
        if (isset($data['idkp'])) {
            foreach ($data['idkp'] as $key => $idkp) {
                if ($idkp) {
                    $kb = KB::find($idkp);
                    $kb->tanggal = $data['jatuh_tempo'][$key];
                    $kb->save();
                    $this->status = 'success';
                }
            }
        }
        return response()->json([
            "status" => $this->status,
            "data" => $this->data,
            'error' => $this->error,
        ]);
    }

    public function update_jatuh_tempo(Request $request)
    {
        if (isset($request->tgl) && isset($request->id)) {
            $kb = KB::find($request->id);
            $kb->tanggal = $request->tgl;
            $kb->save();
            $this->status = 'success';
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

    public function mahasiswa_pembayaran_tagihan(Request $request)
    {
        $request->validate([
            'id_mahasiswa' => 'required'
        ]);
        $this->status = 'success';
        $id_mahasiswa = $request->id_mahasiswa;
        $kb = KB::select('nominal', 'tanggal', 'trx_id', 'nomor_va')->where('id_mahasiswa', $id_mahasiswa)->where('status', null)->where('id_piutang', '!=', null)->orderBy('tanggal')->first();
        $data = (object)[];
        $data->tipe = 'ukt';
        if (isset($kb->nominal)) {
            $data = $kb;
            $data->tipe = 'cicilan';
        }else{
            $mhs = DB::table('mahasiswa')->select('ukt', 'tglmasuk')->where('nomor', $id_mahasiswa)->first();
            $data->nominal = $mhs->ukt;
            $periode = Periode::select('tahun', 'semester')->orderByDesc('status')->orderByDesc('tahun')->limit(1)->first();
            $semester = $periode->tahun.$periode->semester;
            $angkatan = date('Y', strtotime($mhs->tglmasuk));
            $semesterke = \App\Helpers\CoreHelper::hitung_semester($semester, $angkatan);
            $kb = KB::select('nominal', 'tanggal', 'trx_id', 'nomor_va', 'status')->where('id_mahasiswa', $id_mahasiswa)->where('semester', $semesterke)->first();
            if (isset($kb->status) && $kb->status == 1) {
                $data->tipe = 'lunas';
            }else{
                if (isset($kb->nomor_va)) {
                    $data->nomor_va = $kb->nomor_va;
                }else{
                    $data->nomor_va = null;
                }
            }
        }
        if (isset($request->generate_va) && $request->generate_va == 1) {
            $data->nomor_va = '8277087781881441';
        }
        $riwayat = KB::select('tanggal', 'nominal', 'id_piutang')->where('id_mahasiswa', $id_mahasiswa)->where('status', 1)->orderByDesc('tanggal')->get();
        $data->riwayat = $riwayat;
        $this->data = $data;
        return response()->json([
            "status" => $this->status,
            "data" => $this->data,
            "error" => $this->error
        ]);
    }

    public function dokumen_mahasiswa(Request $request) {
        try {
            $data = $request->all();
            $validator = Validator::make(
                $data,
                [
                    'tipe' => ['required', Rule::in(['pengajuan', 'perjanjian'])],
                    'file' => 'required|mimes:doc,docx,pdf,txt|max:4096',
                    'id_mahasiswa' => 'required'
                ]
            );
    
            if ($validator->fails()) {
                return response()->json(['error' => $validator->errors(), 'data' => $data], 401);
            }

            $periode = Periode::select('tahun', 'semester')->orderByDesc('status')->orderByDesc('tahun')->first();
            $current_data = BK::select('id', 'status')->where('id_mahasiswa','=',$request->id_mahasiswa)->where('tahun','=',$periode->tahun)->where('semester','=',$periode->semester)->first();
            if (isset($current_data) && strtolower($current_data->status) == 'pending' && $request->hasFile('file')) {
                $path = $data['id_mahasiswa'].'_'.$periode->tahun.$periode->semester.'_'.$request->file->getClientOriginalName();
                if($request->file->storeAs($request->tipe, $path)){
                    $kb = BK::find($current_data->id);
                    $kb->{'path_'.$request->tipe} = '/'.$request->tipe.'/'.$path;
                    $kb->save();
                    $this->status = "success";
                }
            }
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
}
