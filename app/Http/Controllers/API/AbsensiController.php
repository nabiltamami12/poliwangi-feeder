<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use App\Models\Absensi as Abs;
use Illuminate\Support\Facades\Validator;

class AbsensiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $status = null;
    protected $error = null;
    protected $data = null;

    public function index(Request $req)
    {
        // Untuk mengambil seluruh data (Admin dan Dosen)
        set_time_limit(0);

        $table = DB::table('mahasiswa');
        date_default_timezone_set('Asia/Jakarta');
        Carbon::setLocale('id');

        
        $now = Carbon::now()->format('H:i');
        $int = (int) str_replace(':', '', $now);
        if ($int >= 1000 && $int <= 1140 ) {
            $limit = Carbon::now()->addMinutes(50)->format('H:i');
        } else {
            $limit = Carbon::now()->addMinutes(90)->format('H:i');
        }
        $day = Carbon::now()->isoformat('dddd');

        $date = Carbon::now()->format('Y-m-d');
        $array = [];
        $jenjang = $req->jenjang;
        $prodi = $req->prodi;
        $matkul = $req->matkul;

        
        
        try {
            $data = $table->select(
                'mahasiswa.nomor',
                'mahasiswa.nrp',
                'mahasiswa.nama',
                'matakuliah.matakuliah',
                'hari.hari',
                'jam.jam',
                'program.program AS jenjang',
                'jurusan.jurusan',
                'kuliah.nomor as kuliah'
                )
            ->join("kuliah", "kuliah.kelas", "=", "mahasiswa.kelas")
            ->join("matakuliah", "matakuliah.nomor", "=", "kuliah.matakuliah")
            ->join("hari", "hari.nomor", "=", "kuliah.hari")
            ->join("jam", "jam.nomor", "=", "kuliah.jam")
            ->join("program_studi", 'program_studi.nomor', '=', 'matakuliah.program_studi')
            ->join("program", "program.nomor", "=", "program_studi.program")
            ->join('jurusan', 'jurusan.nomor', '=', 'program_studi.jurusan')
            ->where("hari.hari", $day)
            ->when($matkul, function($query, $matkul) {
                return $query->where('matakuliah.nomor', $matkul);
            })
            ->when($jenjang, function ($query, $jenjang) {
                return $query->where('program.program', $jenjang);
            })
            ->when($prodi, function($query, $prodi) {
                return $query->where('jurusan.jurusan', $prodi);
            })
            ->whereBetween('jam.jam', [$now, $limit])
            ->orderBy('mahasiswa.nama', 'asc')
            ->paginate(10);
                
            foreach ($data as $key=>$value) {
                $batas[$key] = Carbon::parse($data[$key]->jam)->addMinutes(15)->format('H:i');
                $check[$key] = Abs::whereDate('tanggal', $date)->where('kuliah',  $data[$key]->kuliah)->first();

                if ($check[$key]) {
                    $baru[$key] = $check[$key]->status;
                } else {
                    $baru[$key] = "Belum Presensi";
                };
                array_push($array, [
                    "nomor" => $data[$key]->nomor,
                    "nrp" => $data[$key]->nrp,
                    "nama" => $data[$key]->nama,
                    "matakuliah" => $data[$key]->matakuliah,
                    "hari" => $data[$key]->hari,
                    "jam" => $data[$key]->jam,
                    "batas" => $batas[$key],
                    "jenjang" => $data[$key]->jenjang,
                    "jurusan" => $data[$key]->jurusan,
                    'status' => $baru[$key]
                ]);
            }
            $this->data = $array;
            $this->status = "success";
        } catch (QueryException $e) {
            $this->status = "failed";
            $this->error = $e;
        }
        
        

        return response()->json([
            "status" =>$this->status,
            "data" => $this->data,
            "error" => $this->error,
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
        date_default_timezone_set('Asia/Jakarta');
        Carbon::setLocale('id');

        $date = Carbon::now()->format('Y-m-d H:i:s');
        $year = Carbon::now()->isoformat('Y');
        $date_check = Carbon::now()->format('Y-m-d');
        

        $request->merge(["tanggal" => $date]);
        $request['status'] = "H";
        $data = $request->all();
        $validated = Validator::make($data, [
            // 'kuliah' => 'required',
            // 'mahasiswa' => 'required',
            // 'status' => 'required',
            // 'minggu' => 'required'
        ]);

        if ($validated->fails()) {
            $this->status = 'error';
            $this->error = $validated->errors();
        } else {
            try {
                $data = Abs::create($data);
                $this->data = $data;
                $this->status = "success";
            } catch (QueryException $e) {
                $this->status = "failed";
                $this->error = $e;
            }
        }
        return response()->json([
            "status" => $this->status,
            "data" => $this->data,
            "error" => $this->error
        ]);
    }
    
    public function absensi_dosen(Request $request)
    {
        DB::enableQueryLog();
        date_default_timezone_set('Asia/Jakarta');
        Carbon::setLocale('id');

        $date = Carbon::now()->format('Y-m-d H:i:s');
        $date_check = Carbon::now()->format('Y-m-d');
        $year = Carbon::now()->isoformat('Y');
        $dosen = "";
        $kuliah = "";

        
        
        try {
            foreach ($request->data as $key => $value) {
                $value["tanggal_entry"] = $date;
                $dosen = $value['dosen'];
                $kuliah = $value['kuliah'];
                $pertemuan = $value['minggu'];

                $dt_kls = [
                    'tahun' => $year,
                    'kuliah' => $kuliah,
                    'pertemuan' => $pertemuan
                ];
                
                $value['minggu'] = $pertemuan;
    
                if ($value['status']==null) {
                    $value['status'] = "A";
                }
                $check = Abs::where(['kuliah'=>$value['kuliah'],'mahasiswa'=>$value['mahasiswa'],'minggu'=>$value['minggu']])->first();
                if ($check==null) {
                    $value["tanggal"] = $date;
                    $data = Abs::create($value);
                } else {
                    $data = Abs::where('nomor', $check['nomor'])->update($value);
                }            
            }

            $check = DB::table('kelas_mengajar')->where($dt_kls)->first();
            $dt_kls['status'] = "hadir";
            $dt_kls['dosen'] = $dosen;
            if ($check==null) {                
                $kls_mngjr = DB::table('kelas_mengajar')->insert($dt_kls);
            }else{
                $kls_mngjr = DB::table('kelas_mengajar')->where('id',$check->id)->update($dt_kls);
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

    public function absensi_admin(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        Carbon::setLocale('id');

        $date = Carbon::now()->format('Y-m-d H:i:s');
        try {
            foreach ($request->data as $key => $value) {
                $id_absensi = $value['nomor'];
                unset($value['nomor']);
                $value["tanggal_entry"] = $date;
                $dosen = $value['dosen'];
    
                if ($value['status']==null) {
                    $value['status'] = "A";
                }
                $data = Abs::where('nomor', $id_absensi)->update($value);
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

    public function get_batal_kelas(Request $request)
    {
        try {
            $data = DB::table('kelas_mengajar')
                        ->select('matakuliah.matakuliah','kelas_mengajar.id')
                        ->join('kuliah','kuliah.nomor','=','kelas_mengajar.kuliah')
                        ->join('matakuliah','kuliah.matakuliah','=','matakuliah.nomor')
                        ->where('kelas_mengajar.status','batal')
                        ->where('kelas_mengajar.dosen',$request->dosen)
                        ->get();
            $this->data = $data;
            $this->status = 'success';
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
    public function show($id)
    {
        DB::enableQueryLog();
        // Untuk mengambil hanya per mahasiswa.
        $table = DB::table('mahasiswa');
        date_default_timezone_set('Asia/Jakarta');
        Carbon::setLocale('id');
        

        $now = Carbon::now()->format('H:i');
        $date = Carbon::now()->format('Y-m-d');
        $int = (int) str_replace(':', '', $now);

        $day = Carbon::now()->isoformat('dddd');
        $year = Carbon::now()->isoformat('Y');
        $array = [];
        
        try {
            $data = $table->distinct()->select(
                'matakuliah.matakuliah',
                'pegawai.nama as dosen',
                'kuliah.dosen as id_dosen',
                'kelas.kode as kelas',
                'kelas.nomor as id_kelas',
                'hari.hari',
                'jam.jam',
                'kuliah.nomor as kuliah',
                'kelas_mengajar.pertemuan'
                )
            ->join("kuliah", "kuliah.kelas", "=", "mahasiswa.kelas")
            ->join("kelas", "kelas.nomor", "=", "kuliah.kelas")
            ->join("matakuliah", "matakuliah.nomor", "=", "kuliah.matakuliah")
            ->join("pegawai", "pegawai.nomor", "=", "kuliah.dosen")
            ->join("hari", "hari.nomor", "=", "kuliah.hari")
            ->join("jam", "jam.nomor", "=", "kuliah.jam")
            ->join("kelas_mengajar", "kelas_mengajar.kuliah", "=", "kuliah.nomor",'left')
            ->where('mahasiswa.nomor', '=', $id)
            ->where("hari.hari", $day)
            ->where("kuliah.tahun", $year)
            ->orderBy('jam.jam', 'asc')
            ->orderBy('kelas_mengajar.pertemuan', 'desc')
            ->groupBy('kuliah.nomor')
            ->get();

            
            $id_kelas = '';
            foreach ($data as $key=>$value) {
                $limit = Carbon::parse($value->jam)->addMinutes(120)->format('H:i');
                $pertemuan = ($value->pertemuan==null)?1:$value->pertemuan;

                if ($now >= $value->jam && $now <= $limit) {
                    $kelas_check = DB::table('kelas_mengajar')->where([
                        'tahun' => $year,
                        'kuliah' => $value->kuliah,
                        'pertemuan' => $pertemuan,
                    ])->first();
                    $data_kls_mengajar = [
                        'tahun' => $year,
                        'kuliah' => $value->kuliah,
                        'pertemuan' => $pertemuan,
                        'jam_mulai' => $now,
                        'status' => 'mengajar',
                        'status_kelas' => 'open',
                    ];
                    if ($kelas_check==null) {
                        DB::table('kelas_mengajar')->insert($data_kls_mengajar);
                    } else {
                        DB::table('kelas_mengajar')->where('id',$kelas_check->id)->update($data_kls_mengajar);
                    }
                }

                $id_kelas = $value->id_kelas;
                $check[$key] = Abs::whereDate('tanggal', $date)->where('kuliah',  $data[$key]->kuliah)->first();

                if ($check[$key]) {
                    if ($check[$key]->status=='H') {
                        $baru[$key] = "Hadir";
                    } elseif ($check[$key]->status=='I') {
                        $baru[$key] = "Izin";
                    } elseif ($check[$key]->status=='S') {
                        $baru[$key] = "Sakit";
                    } else{
                        $baru[$key] = "Unknown";
                    }
                    $status = $check[$key]->status;
                } else {
                    $status = null;
                    $baru[$key] = "Belum Presensi";
                };
                array_push($array, [
                    "matakuliah" => $data[$key]->matakuliah,
                    "dosen" => $data[$key]->dosen,
                    "kelas" => $data[$key]->kelas,
                    "hari" => $data[$key]->hari,
                    "jam" => $data[$key]->jam,
                    'status' => $status,
                    'status_text' => $baru[$key],
                    'kuliah' => $data[$key]->kuliah
                ]);
            }

            $kelas_mengajar = DB::table('kelas_mengajar')
                            ->select('kelas_mengajar.*','matakuliah.matakuliah','kelas.kode')
                            ->join('kuliah','kuliah.nomor','=','kelas_mengajar.kuliah')
                            ->join('kelas','kelas.nomor','=','kuliah.kelas')
                            ->join('matakuliah','matakuliah.nomor','=','kuliah.matakuliah')
                            ->where('kuliah.kelas',$id_kelas)
                            ->where('kelas_mengajar.status_kelas','open')
                            ->get();

            $this->data = ['kelas'=>$kelas_mengajar,'data'=>$array];
            $this->status = "success";
        } catch (QueryException $e) {
            $this->status = "failed";
            $this->error = $e;
        }
        
        

        return response()->json([
            "status" =>$this->status,
            "data" => $this->data,
            "error" => $this->error,
        ]);
    }

    public function show_dosen($id)
    {
        DB::enableQueryLog();
        // Untuk mengambil hanya per mahasiswa.
        $table = DB::table('kuliah');
        date_default_timezone_set('Asia/Jakarta');
        Carbon::setLocale('id');
        

        $now = Carbon::now()->format('H:i');
        $date = Carbon::now()->format('Y-m-d');

        $day = Carbon::now()->isoformat('dddd');
        $year = Carbon::now()->isoformat('Y');
        $array = [];
        
        try {
            $data = $table->distinct()
            ->select(
                'matakuliah.matakuliah',
                'pegawai.nama as dosen',
                'kuliah.dosen as id_dosen',
                'kelas.kode as kelas',
                'hari.hari',
                'jam.jam',
                'kuliah.nomor as kuliah',
                DB::raw("(select count(*) from mahasiswa m where m.kelas = kuliah.kelas and kuliah.tahun=".$year.") as jml_mhs"),
                'kelas_mengajar.pertemuan'
                )
            ->join("kelas", "kelas.nomor", "=", "kuliah.kelas")
            ->join("matakuliah", "matakuliah.nomor", "=", "kuliah.matakuliah")
            ->join("pegawai", "pegawai.nomor", "=", "kuliah.dosen")
            ->join("hari", "hari.nomor", "=", "kuliah.hari")
            ->join("jam", "jam.nomor", "=", "kuliah.jam")
            ->join("kelas_mengajar", "kelas_mengajar.kuliah", "=", "kuliah.nomor",'left')
            ->where("hari.hari", $day)
            ->where("kuliah.tahun", $year)
            ->where(function($query) use ($id)
            {
                $query->where('kuliah.dosen','=',$id)
                      ->orWhere('kuliah.dosen2','=',$id)
                      ->orWhere('kuliah.dosen3','=',$id)
                      ->orWhere('kuliah.dosen4','=',$id)
                      ->orWhere('kuliah.dosen5','=',$id);
            })
            ->orderBy('jam.jam', 'asc')
            ->orderBy('kelas_mengajar.pertemuan', 'desc')
            ->groupBy('kuliah.nomor')
            ->get();



            foreach ($data as $key => $value) {
                $limit = Carbon::parse($value->jam)->addMinutes(220)->format('H:i');
                $pertemuan = ($value->pertemuan==null)?1:$value->pertemuan;

                if ($now >= $value->jam && $now <= $limit) {
                    $kelas_check = DB::table('kelas_mengajar')->where([
                        'tahun' => $year,
                        'kuliah' => $value->kuliah,
                        'pertemuan' => $pertemuan,
                    ])->first();
                    $data_kls_mengajar = [
                        'tahun' => $year,
                        'kuliah' => $value->kuliah,
                        'pertemuan' => $pertemuan,
                        'jam_mulai' => $now,
                        'status' => 'mengajar',
                        'status_kelas' => 'open',
                    ];
                    if ($kelas_check==null) {
                        DB::table('kelas_mengajar')->insert($data_kls_mengajar);
                    } else {
                        DB::table('kelas_mengajar')->where('id',$kelas_check->id)->update($data_kls_mengajar);
                    }
                }
                // if ($value->status=='hadir') {
                //     $status_text = "Sudah Presensi";
                // } elseif ($value->status=='batal') {
                //     $status_text = "Kelas dibatalkan";
                // } else{
                //     $status_text = "Belum Presensi";
                // }

                array_push($array, [
                    "matakuliah" => $value->matakuliah,
                    "dosen" => $value->dosen,
                    "kelas" => $value->kelas,
                    "hari" => $value->hari,
                    "jam" => $value->jam,
                    "jml_mhs" => $value->jml_mhs,
                    "pertemuan" => ($value->pertemuan==null||$value->pertemuan=="")?1:$value->pertemuan,
                    // 'status' => $value->status,
                    // 'status_text' => $status_text,
                    'kuliah' => $value->kuliah
                ]);
            }

            $kelas_mengajar = DB::table('kelas_mengajar')
                            ->select('kelas_mengajar.*','matakuliah.matakuliah','kelas.kode')
                            ->join('kuliah','kuliah.nomor','=','kelas_mengajar.kuliah')
                            ->join('kelas','kelas.nomor','=','kuliah.kelas')
                            ->join('matakuliah','matakuliah.nomor','=','kuliah.matakuliah')
                            ->where(function($query) use ($id)
                            {
                                $query->where('kuliah.dosen',$id)
                                    ->orWhere('kuliah.dosen2',$id)
                                    ->orWhere('kuliah.dosen3',$id)
                                    ->orWhere('kuliah.dosen4',$id)
                                    ->orWhere('kuliah.dosen5',$id);
                            })
                            ->get();

            $this->data = [
                'data' => $array,
                'kelas' => $kelas_mengajar
            ];
            $this->status = "success";
        } catch (QueryException $e) {
            $this->status = "failed";
            $this->error = $e;
        }
        
        

        return response()->json([
            "status" =>$this->status,
            "data" => $this->data,
            "error" => $this->error,
        ]);
    }

    public function show_kelas_dosen(Request $request)
    {
        DB::enableQueryLog();
        $array=[];
        
        try {
            $mahasiswa = DB::table("mahasiswa as m")
                                ->select(
                                    "m.nomor as id_mahasiswa",
                                    "m.nama",
                                    "m.nrp as nim",
                                    "k.kode as kelas",
                                    "kl.nomor as kuliah",
                                    "kl.semester",
                                    "jam.jam",
                                    "kl.semester",
                                    "mk.matakuliah",
                                    DB::raw("CONCAT(p.program,' ',ps.program_studi) as prodi")
                                )
                                ->join("kelas as k", "k.nomor", "=", "m.kelas")
                                ->join("kuliah as kl", "kl.kelas", "=", "k.nomor")
                                ->join("jam", "kl.jam", "=", "jam.nomor")
                                ->join("matakuliah as mk", "kl.matakuliah", "=", "mk.nomor")
                                ->join("program_studi as ps","ps.nomor", "=", "m.program_studi")
                                ->join("program as p","p.nomor", "=", "ps.program")
                                ->join("absensi_mahasiswa as am", "am.kuliah", "=", "k.nomor",'left')
                                ->where('kl.tahun', 2021)
                                ->where('kl.nomor', $request->kuliah)
                                ->get();
            foreach ($mahasiswa as $key => $value) {

                $limit_absen = Carbon::parse($value->jam)->addMinutes(15)->format('H:i');
                $abs = DB::table("absensi_mahasiswa")
                            ->where('kuliah',$value->kuliah)
                            ->where('minggu',$request->pertemuan)
                            ->where('mahasiswa',$value->id_mahasiswa)
                            ->first();
                $arr = [
                    'prodi' => $value->prodi,
                    'matakuliah' => $value->matakuliah,
                    'semester' => $value->semester,
                    'kelas' => $value->kelas,
                ];
                array_push($array, [
                    "kuliah" => $value->kuliah,
                    "nim" => $value->nim,
                    "id_mahasiswa" => $value->id_mahasiswa,
                    "mahasiswa" => $value->nama,
                    "jam" => $value->jam,
                    "batas" => $limit_absen,
                    "status" => ($abs==null)?null:$abs->status
                ]);
            }
            $this->status = "success";
            $this->data = ['info'=>$arr,'mahasiswa'=>$array];
        } catch (QueryException $e) {
            $this->status = "failed";
            $this->error = $e;
        }
        
        return response()->json([
            "status" =>$this->status,
            "data" => $this->data,
            "error" => $this->error,
        ]);
        die();
        // Untuk mengambil hanya per mahasiswa.
        // $table = DB::table('mahasiswa');
        // date_default_timezone_set('Asia/Jakarta');
        // Carbon::setLocale('id');
        

        // $now = Carbon::now()->format('H:i');
        // $date = Carbon::now()->format('Y-m-d');
        // $int = (int) str_replace(':', '', $now);

        // $day = Carbon::now()->isoformat('dddd');
        // $year = Carbon::now()->isoformat('Y');
        // $array = [];
        
        // try {
        //     $data = $table->distinct()->select(
        //         'matakuliah.nomor as id_matakuliah',
        //         'matakuliah.matakuliah',
        //         'pegawai.nama as dosen',
        //         'kelas.kode as kelas',
        //         'kelas.nomor as id_kelas',
        //         'hari.hari',
        //         'jam.jam',
        //         'kuliah.nomor as kuliah')
        //     ->join("kuliah", "kuliah.kelas", "=", "mahasiswa.kelas")
        //     ->join("kelas", "kelas.nomor", "=", "kuliah.kelas")
        //     ->join("matakuliah", "matakuliah.nomor", "=", "kuliah.matakuliah")
        //     ->join("pegawai", "pegawai.nomor", "=", "kuliah.dosen")
        //     ->join("hari", "hari.nomor", "=", "kuliah.hari")
        //     ->join("jam", "jam.nomor", "=", "kuliah.jam")
        //     ->where('kuliah.dosen', '=', $request->dosen)
        //     ->where('kuliah.nomor', '=', $request->kuliah)
        //     ->where("hari.hari", $day)
        //     ->where("kuliah.tahun", $year)
        //     // ->whereBetween('jam.jam', [$now, $limit])
        //     ->orderBy('jam.jam', 'asc')
        //     ->get();
            
        //     $arr=[];
        //     foreach ($data as $key=>$value) {
        //         $awal_kelas = $value->jam;
        //         $limit_absen = Carbon::parse($awal_kelas)->addMinutes(15)->format('H:i');
        //         $akhir_kelas = Carbon::parse($awal_kelas)->addMinutes(180)->format('H:i');
        //         if ($now>=$awal_kelas && $now<=$akhir_kelas) {
        //             $status_kelas = true;
        //         }else{
        //             $status_kelas = false;
        //         }
                
        //         $mahasiswa = DB::table("mahasiswa as m")
        //                     ->select(
        //                         "m.nomor as id_mahasiswa",
        //                         "m.nama",
        //                         "m.nrp as nim",
        //                         "kl.nomor",
        //                         "kl.semester",
        //                         "mk.matakuliah",
        //                         DB::raw("CONCAT(p.program,' ',ps.program_studi) as prodi")
        //                     )
        //                     ->join("kelas as k", "k.nomor", "=", "m.kelas")
        //                     ->join("kuliah as kl", "kl.kelas", "=", "k.nomor")
        //                     ->join("matakuliah as mk", "kl.matakuliah", "=", "mk.nomor")
        //                     ->join("program_studi as ps","ps.nomor", "=", "m.program_studi")
        //                     ->join("program as p","p.nomor", "=", "ps.program")
        //                     ->where('kl.tahun', 2021)
        //                     ->where('kl.kelas', $value->id_kelas)
        //                     ->where('kl.matakuliah', $value->id_matakuliah)
        //                     ->get();
        //         $arr = [
        //             'prodi' => $mahasiswa[0]->prodi,
        //             'matakuliah' => $mahasiswa[0]->matakuliah,
        //             'semester' => $mahasiswa[0]->semester,
        //             'kelas' => $value->kelas,
        //         ];
        //         if ($status_kelas) {
        //             foreach ($mahasiswa as $key2 => $value2) {
        //                 $check[$key2] = Abs::whereDate('tanggal', $date)->where(['kuliah' => $value2->nomor,'mahasiswa' => $value2->id_mahasiswa])->first();
        //                 if ($check[$key2]) {
        //                     if ($check[$key2]->status=='H') {
        //                         $baru[$key2] = "Hadir";
        //                     } elseif ($check[$key2]->status=='I') {
        //                         $baru[$key2] = "Izin";
        //                     } elseif ($check[$key2]->status=='S') {
        //                         $baru[$key2] = "Sakit";
        //                     } else{
        //                         $baru[$key2] = "Unknown";
        //                     }
        //                     $status = $check[$key2]->status;
        //                 } else {
        //                     $status = null;
        //                     $baru[$key2] = "Belum Presensi";
        //                 };
        //                 array_push($array, [
        //                     "kuliah" => $value2->nomor,
        //                     "nim" => $value2->nim,
        //                     "id_mahasiswa" => $value2->id_mahasiswa,
        //                     "mahasiswa" => $value2->nama,
        //                     "jam" => $value->jam,
        //                     "batas" => $limit_absen,
        //                     'status' => $status,
        //                     'status_text' => $baru[$key2],
        //                 ]);
        //             }
        //         }
        //     }

        //     $this->data = $array;
        //     $this->status = "success";
        // } catch (QueryException $e) {
        //     $this->status = "failed";
        //     $this->error = $e;
        // }
        // return response()->json([
        //     "status" =>$this->status,
        //     "data" => ['info'=>$arr,'mahasiswa'=>$this->data],
        //     "error" => $this->error,
        // ]);
    }

    public function kelas_mengajar(Request $request)
    {
        $now = Carbon::now()->format('H:i');

        $data = [
            'tahun'=>$request->tahun,
            'kuliah'=>$request->kuliah,
            'pertemuan'=>$request->pertemuan,
            // 'status'=>'mengajar',
            // 'status_kelas'=>'open',
        ];
        try {
            $check = DB::table('kelas_mengajar')->where($data)->first();
            $data['status'] = $request->status;
            $data['jam_mulai'] = $now;
            $data['status_kelas'] = $request->status_kelas;
            if ($check==null) {
                $query = DB::table('kelas_mengajar')->insert($data);
            } else {
                $query = DB::table('kelas_mengajar')->where('id',$check->id)->update($data);
            }
            $this->data = $query;
            $this->status = 'success';
        } catch (QueryException $e) {
            $this->status = "failed";
            $this->error = $e;
        }
        return response()->json([
            "status" =>$this->status,
            "data" => $this->data,
            "error" => $this->error,
        ]);
    }

    public function one($id) {
        $table = DB::table('mahasiswa');
        date_default_timezone_set('Asia/Jakarta');
        Carbon::setLocale('id');
        

        $now = Carbon::now()->format('H:i');
        $date = Carbon::now()->format('Y-m-d');
        $int = (int) str_replace(':', '', $now);
        $day = Carbon::now()->isoformat('dddd');
        $array = [];

        if ($int >= 1000 && $int <= 1140 ) {
            $limit = Carbon::now()->addMinutes(50)->format('H:i');
        } else {
            $limit = Carbon::now()->addMinutes(90)->format('H:i');
        };
        try {
            $data = $table->distinct()->select(
                'mahasiswa.nomor',
                'matakuliah.matakuliah',
                'hari.hari',
                'pegawai.nama as dosen_pengampu',
                'jam.jam',
                'kuliah.nomor as kuliah')
            ->join("kuliah", "kuliah.kelas", "=", "mahasiswa.kelas")
            ->join("matakuliah", "matakuliah.nomor", "=", "kuliah.matakuliah")
            ->join("hari", "hari.nomor", "=", "kuliah.hari")
            ->join("jam", "jam.nomor", "=", "kuliah.jam")
            ->join('pegawai', 'pegawai.nomor', 'kuliah.dosen')
            ->where('mahasiswa.nomor', '=', $id)
            ->where("hari.hari", $day)
            ->whereBetween('jam.jam', [$now, $limit])
            ->orderBy('jam.jam', 'asc')
            ->take(1)
            ->get();

            if (!$data->isEmpty()) {
                $check = Abs::whereDate('tanggal', $date)->where('kuliah',  $data[0]->kuliah)->first();

                if ($check) {
                    $baru = "Sudah Presensi";
                } else {
                    $baru = "Belum Presensi";
                };
    
                foreach ($data as $key=>$value) {
                    array_push($array, [
                        "nomor_mahasiswa" => $data[$key]->nomor,
                        "matakuliah" => $data[$key]->matakuliah,
                        "hari" => $data[$key]->hari,
                        "jam" => $data[$key]->jam,
                        "dosen_pengampu" => $data[$key]->dosen_pengampu,
                        'kode_kuliah' => $data[$key]->kuliah,
                        'status' => $baru
                    ]);
                }
                $this->data = $array;
            } else {
                $this->status = 'success';
            }
            $this->status = "success";
        } catch (QueryException $e) {
            $this->status = "failed";
            $this->error = $e;
        }
        
        

        return response()->json([
            "status" =>$this->status,
            "data" => $this->data,
            "error" => $this->error,
        ]);
    }

    public function rekap_matkul(Request $request) {
        DB::enableQueryLog();
        // Rekap absensi per matakuliah
        DB::statement("SET SQL_MODE=''");
        try {
            $query = Abs::select(
                'absensi_mahasiswa.tanggal',
                'matakuliah.kode',
                'matakuliah.matakuliah',
                DB::raw('COUNT(CASE WHEN absensi_mahasiswa.status = "H" THEN 1 END) AS HADIR,COUNT(CASE WHEN absensi_mahasiswa.status = "S" OR absensi_mahasiswa.status = "A" THEN 1 END) AS TIDAK_HADIR')
            )->join('kuliah', 'absensi_mahasiswa.kuliah', '=', 'kuliah.nomor')
            ->join('matakuliah', 'kuliah.matakuliah', '=', 'matakuliah.nomor')
            ->join('kelas', 'kuliah.kelas', '=', 'kelas.nomor')
            ->join('mahasiswa', 'absensi_mahasiswa.mahasiswa', '=', 'mahasiswa.nomor')
            ->where('absensi_mahasiswa.mahasiswa', $request->mahasiswa)
            ->where('kuliah.semester', $request->semester)
            ->where('kuliah.tahun', $request->tahun);
    
            if ($request->tanggal) {
                $query = $query->whereDate('tanggal',$request->tanggal);
            }
    
            $this->data = $query->groupBy('matakuliah.matakuliah')->get(); 
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

    public function rekap_kelas(Request $request) {
        DB::enableQueryLog();
        // Rekap absensi per matakuliah
        DB::statement("SET SQL_MODE=''");
        try {
            $this->data = Abs::select(
                'mahasiswa.nomor as mahasiswa',
                'mahasiswa.nrp as nim',
                'mahasiswa.nama',
                'absensi_mahasiswa.tanggal',
                'matakuliah.kode',
                'matakuliah.matakuliah',
                DB::raw('COUNT(CASE WHEN absensi_mahasiswa.status = "H" THEN 1 END) AS HADIR,COUNT(CASE WHEN absensi_mahasiswa.status = "S" OR absensi_mahasiswa.status = "A" THEN 1 END) AS TIDAK_HADIR')
            )->join('kuliah', 'absensi_mahasiswa.kuliah', '=', 'kuliah.nomor')
            ->join('matakuliah', 'kuliah.matakuliah', '=', 'matakuliah.nomor')
            ->join('kelas', 'kuliah.kelas', '=', 'kelas.nomor')
            ->join('mahasiswa', 'absensi_mahasiswa.mahasiswa', '=', 'mahasiswa.nomor')
            ->where('kelas.nomor', $request->kelas)
            ->where('matakuliah.nomor', $request->matakuliah)
            ->where('kuliah.semester', $request->semester)
            ->where('kuliah.tahun', $request->tahun)
            ->groupBy('matakuliah.matakuliah')
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
    public function cetak_kelas(Request $request) {
        
        DB::enableQueryLog();
        // Rekap absensi per matakuliah
        DB::statement("SET SQL_MODE=''");
        
        $mhs = Abs::select(
            'mahasiswa.nomor as mahasiswa',
            'mahasiswa.nrp as nim',
            'mahasiswa.nama',
            DB::raw("GROUP_CONCAT(absensi_mahasiswa.minggu) as minggu"),
            DB::raw("GROUP_CONCAT(absensi_mahasiswa.status) as status"),
        )->join('kuliah', 'absensi_mahasiswa.kuliah', '=', 'kuliah.nomor')
        ->join('matakuliah', 'kuliah.matakuliah', '=', 'matakuliah.nomor')
        ->join('kelas', 'kuliah.kelas', '=', 'kelas.nomor')
        ->join('mahasiswa', 'absensi_mahasiswa.mahasiswa', '=', 'mahasiswa.nomor')
        ->where('kelas.nomor', $request->kelas)
        ->where('matakuliah.nomor', $request->matakuliah)
        ->where('kuliah.semester', $request->semester)
        ->where('kuliah.tahun', $request->tahun)
        ->groupBy('mahasiswa.nomor')
        ->orderBy('mahasiswa')
        ->orderBy('nama')
        ->orderBy('minggu')
        ->get();
        // die(json_encode(DB::getQueryLog()));
        $id_kuliah="";
        $id_mahasiswa="";
        $data = [];
        $arr_pertemuan = [];
        $arr_minggu = [];
        $arr_status = [];
        foreach ($mhs as $key => $value) {
            $arr_minggu = explode(",",$value->minggu);
            $arr_status = explode(',',$value->status);
            $data_minggu = [];
            $x = 0;
            $persentase = 0;
            for ($i=1; $i <= 16 ; $i++) { 
                $data_minggu[$i] = "";
                if (in_array($i,$arr_minggu)) {
                    $k = array_search($i,$arr_minggu); 
                    $data_minggu[$i] = $arr_status[$k];
                    if($arr_status[$k]=="H"){
                        $x++;
                    }
                }
            }

            $persentase = ($x/16)*100;

            $arr = [
                'nim' => $value->nim,
                'nama' => $value->nama,
                'pertemuan' => $data_minggu,
                'persentase' => round($persentase)."%"
            ];
                
            array_push($data,$arr);
        }
        $this->data = $data;
        $this->status = "success";

        return response()->json([
            "status" =>$this->status,
            "data" => $this->data,
            "error" => $this->error,
        ]);
    }

    public function detail_rekap_absensi(Request $request)
    {
        try {
            $mahasiswa = DB::table("mahasiswa as m")
                                ->select(
                                    "m.nomor as id_mahasiswa",
                                    "m.nama",
                                    "m.nrp as nim",
                                    "kl.nomor as kuliah",
                                    "kl.semester",
                                    "mk.matakuliah",
                                    "k.kode as kelas",
                                    "j.jam",
                                    DB::raw("CONCAT(p.program,' ',ps.program_studi) as prodi"),
                                    "am.nomor as absensi",
                                    "am.tanggal",
                                    "am.status",
                                    "am.minggu",
                                )
                                ->join("kelas as k", "k.nomor", "=", "m.kelas")
                                ->join("kuliah as kl", "kl.kelas", "=", "k.nomor")
                                ->join("jam as j", "kl.jam", "=", "j.nomor")
                                ->join("absensi_mahasiswa as am", "am.kuliah", "=", "kl.nomor")
                                ->join("matakuliah as mk", "kl.matakuliah", "=", "mk.nomor")
                                ->join("program_studi as ps","ps.nomor", "=", "m.program_studi")
                                ->join("program as p","p.nomor", "=", "ps.program")
                                ->where('m.nomor', $request->mahasiswa)
                                ->where('kl.tahun', $request->tahun)
                                ->where('kl.kelas', $request->kelas)
                                ->where('kl.matakuliah', $request->matakuliah)
                                ->get();
            
            if(count($mahasiswa)>0){
                foreach ($mahasiswa as $key => $value) {
                    $batas = Carbon::parse($value->jam)->addMinutes(15)->format('H:i');
                    $mahasiswa[$key]->batas = $batas;
                }
                $this->data = $mahasiswa;
            }else{
                $this->data = null;
            }
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
    public function update(Request $request, $id)
    {
        $check = Abs::where('nomor', $id);
        $data = $request->all();
        $validated = Validator::make($data, [
            'status' => 'required',
        ]);

        if ($validated->fails()) {
            $this->status = "error";
            $this->error = $validated->errors();
        } else if(!$check){
            $this->status = "failed";
            $this->error = "Data not found";
        }
        else {
            try {
                $check->update($data);
                $this->data = $check->get();
                $this->status = "success";
            } catch (QueryException $e) {
                $this->status = "failed";
                $this->error = $e;
            }
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
            $check = Abs::where('nomor', $id);
    
            if ($check) {
                $this->status = "success";
                $this->data = $check->get();
                $check->delete();
            } else {
                $this->status = "failed";
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