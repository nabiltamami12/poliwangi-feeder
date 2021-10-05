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
        DB::enableQueryLog();
        //
        try {
            $input = DB::table("mahasiswa as m")
                ->select(
                    "m.nomor as id_mahasiswa",
                    "m.nama",
                    "m.nrp as nim",
                    "kl.nomor as id_kuliah",
                    // "n.*"
                )
                ->join("kuliah as kl", "kl.kelas", "=", "m.kelas")
                // ->join("nilai as n", "n.kuliah", "=", "kl.nomor",'left')
                ->where('kl.tahun', $this->tahun_aktif)
                ->where('kl.kelas', $request->kelas)
                ->where('kl.matakuliah', $request->matakuliah)
                ->get();

                $data=[];
            foreach ($input as $key => $value) {
                $nilai = DB::table('nilai')->where([
                    'kuliah' => $value->id_kuliah,
                    'mahasiswa' => $value->id_mahasiswa,
                ])->first();
                $arr = [
                    'id_kuliah' => $value->id_kuliah,
                    'id_mahasiswa' => $value->id_mahasiswa,
                    'is_published' => $nilai->is_published,
                    'publisher' => $nilai->publisher,
                    'tgl_publish' => $nilai->tgl_publish,
                    'nim' => $value->nim,
                    'nama' => $value->nama,
                    'nomor' => ($nilai->nomor==null)?0:$nilai->nomor,
                    'quis1' => ($nilai->quis1==null)?0:$nilai->quis1,
                    'quis2' => ($nilai->quis2==null)?0:$nilai->quis2,
                    'tugas' => ($nilai->tugas==null)?0:$nilai->tugas,
                    'ujian' => ($nilai->ujian==null)?0:$nilai->ujian,
                    'na' => ($nilai->na==null)?0:$nilai->na,
                    'her' => ($nilai->her==null)?0:$nilai->her,
                    'nh' => ($nilai->nh==null)?"":$nilai->nh,
                    'keterangan' => ($nilai->keterangan==null)?"":$nilai->keterangan,
                    'nhu' => ($nilai->nhu==null)?"":$nilai->nhu,
                    'nsp' => ($nilai->nsp==null)?0:$nilai->nsp,
                    'kuis' => ($nilai->kuis==null)?0:$nilai->kuis,
                    'praktikum' => ($nilai->praktikum==null)?0:$nilai->praktikum,
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
                            ->select('m.nrp','m.nama','mk.kode','mk.matakuliah','m.jumlah_sks','n.nomor' ,'n.nh','n.na', 'mk.nomor as nomor_matkul')
                            ->join('kelas as k','k.nomor','=','m.kelas')
                            ->join('kuliah as kl','kl.kelas','=','k.nomor')
                            ->join('matakuliah as mk','mk.nomor','=','kl.matakuliah')
                            ->join('nilai as n','n.kuliah','=','kl.nomor','left')
                            ->where('m.nrp',$request->nim)
                            ->where('mk.semester',$this->semester_aktif)
                            ->where('kl.tahun',$this->tahun_aktif)
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
