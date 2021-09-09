<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Nilai;
use DB;
use Illuminate\Support\Carbon;
use App\Http\Requests\ImportNilai;
use Illuminate\Database\QueryException;

class NilaiController extends Controller
{
    protected $status = null;
    protected $error = null;
    protected $data = null;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index(Request $request)
    {
        //
        try {
            $input = DB::table("mahasiswa as m")
                ->select(
                    "m.nomor as id_mahasiswa",
                    "m.nama",
                    "m.nrp as nim",
                    "kl.nomor as id_kuliah",
                    "n.*"
                )
                ->join("kelas as k", "k.nomor", "=", "m.kelas")
                ->join("kuliah as kl", "kl.kelas", "=", "k.nomor")
                ->join("nilai as n", "n.kuliah", "=", "kl.nomor",'left')
                ->where('kl.tahun', $request->tahun)
                ->where('kl.kelas', $request->kelas)
                ->where('kl.matakuliah', $request->matakuliah)
                ->get();
    
                $data=[];
            foreach ($input as $key => $value) {
                $arr = [
                    'id_kuliah' => $value->id_kuliah,
                    'id_mahasiswa' => $value->id_mahasiswa,
                    'is_published' => $value->is_published,
                    'publisher' => $value->publisher,
                    'tgl_publish' => $value->tgl_publish,
                    'nim' => $value->nim,
                    'nama' => $value->nama,
                    'nomor' => ($value->nomor==null)?0:$value->nomor,
                    'kuliah' => ($value->nomor==null)?0:$value->nomor,
                    'mahasiswa' => ($value->mahasiswa==null)?0:$value->mahasiswa,
                    'quis1' => ($value->quis1==null)?0:$value->quis1,
                    'quis2' => ($value->quis2==null)?0:$value->quis2,
                    'tugas' => ($value->tugas==null)?0:$value->tugas,
                    'ujian' => ($value->ujian==null)?0:$value->ujian,
                    'na' => ($value->na==null)?0:$value->na,
                    'her' => ($value->her==null)?0:$value->her,
                    'nh' => ($value->nh==null)?"":$value->nh,
                    'keterangan' => ($value->keterangan==null)?"":$value->keterangan,
                    'nhu' => ($value->nhu==null)?"":$value->nhu,
                    'nsp' => ($value->nsp==null)?0:$value->nsp,
                    'kuis' => ($value->kuis==null)?0:$value->kuis,
                    'praktikum' => ($value->praktikum==null)?0:$value->praktikum,
                ];
                array_push($data,$arr);
            }
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function rekap(Request $request)
    {
        try {
            if ($request->nim) {
                $data = DB::table('mahasiswa as m')
                            ->select('m.nrp','m.nama','mk.kode','mk.matakuliah','m.jumlah_sks','n.nomor' ,'n.nh','n.na')
                            ->join('kelas as k','k.nomor','=','m.kelas')
                            ->join('kuliah as kl','kl.kelas','=','k.nomor')
                            ->join('matakuliah as mk','mk.nomor','=','kl.matakuliah')
                            ->join('nilai as n','n.kuliah','=','kl.nomor','left')
                            ->where('m.nrp',$request->nim)
                            ->where('mk.semester',$request->semester)
                            ->where('kl.tahun',$request->tahun)
                            ->get();
            }else{
                $data = [];
            }
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $data = $request->data;
            $result = [];
            foreach ($data as $d) {
                if ($d['nomor']==0) {
                    $result[] = Nilai::create($d);
                }else{
                    $query = Nilai::where('nomor',$d['nomor']);
                    $nilai = $query->update($d);
                    $result[] = $query->get();
                }
            }
            $this->data = $result;
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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($tahun, $mk, $kls, $prodi)
    {
        try {
            $input = DB::table("nilai")
                ->select(
                    "matakuliah.matakuliah",
                    "mahasiswa.nama",
                    "kuliah.tahun",
                    "kelas.kode",
                    "nilai.nomor",
                    "nilai.kuliah",
                    "nilai.mahasiswa",
                    "nilai.quis1",
                    "nilai.quis2",
                    "nilai.tugas",
                    "nilai.ujian",
                    "nilai.na",
                    "nilai.her",
                    "nilai.nh",
                    "nilai.keterangan",
                    "nilai.nhu",
                    "nilai.nsp",
                    "nilai.kuis",
                    "nilai.praktikum"
    
                )
                ->join("mahasiswa", "mahasiswa.nomor", "=", "nilai.mahasiswa")
                ->join("kuliah", "kuliah.nomor", "=", "nilai.kuliah")
                ->join("kelas", "kelas.nomor", "=", "mahasiswa.kelas")
                ->join("matakuliah", "matakuliah.nomor", "=", "kuliah.matakuliah")
                ->where('kuliah.tahun', $tahun)
                ->where('kuliah.matakuliah', $mk)
                ->where('mahasiswa.kelas', $kls)
                ->where('matakuliah.program', $prodi)
                ->get();
            $this->data = $input;
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function publish(Request $request)
    {
        
        $data = $request->data;
        date_default_timezone_set('Asia/Jakarta');
        Carbon::setLocale('id');

        $date_now = Carbon::now();
        try {
            $result = [];
            foreach ($data as $d) {
                $d['tgl_publish'] = $date_now->toDateTimeString();
                $query = Nilai::where('nomor',$d['nomor']);
                $nilai = $query->update($d);
                $result[] = $query->get();
            }
            $this->data = $result;
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
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $check = Nilai::where('nomor', $id);
    
            if ($check) {
                $this->status = "success";
                $this->data = $check->get();
                $check->delete();
            } else {
                $this->status = "failed";
                $this->error = "data tidak ada";
            }
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
