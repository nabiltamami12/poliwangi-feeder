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
    protected $err = null;
    protected $data = null;

    public function index(Request $req)
    {
        // Untuk mengambil seluruh data (Admin)
        set_time_limit(0);

        $table = DB::table('MAHASISWA');
        date_default_timezone_set('Asia/Jakarta');
        Carbon::setLocale('id');
        DB::enableQueryLog();
        
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
                'MAHASISWA.nomor',
                'MAHASISWA.nrp',
                'MAHASISWA.nama',
                'MATAKULIAH.matakuliah',
                'HARI.hari',
                'JAM.jam',
                'PROGRAM.program AS jenjang',
                'JURUSAN.jurusan',
                'KULIAH.nomor as kuliah'
                )
            ->join("KULIAH", "KULIAH.kelas", "=", "MAHASISWA.kelas")
            ->join("MATAKULIAH", "MATAKULIAH.nomor", "=", "KULIAH.matakuliah")
            ->join("HARI", "HARI.nomor", "=", "KULIAH.hari")
            ->join("JAM", "JAM.nomor", "=", "KULIAH.jam")
            ->join("PROGRAM_STUDI", 'PROGRAM_STUDI.nomor', '=', 'MATAKULIAH.program_studi')
            ->join("PROGRAM", "PROGRAM.nomor", "=", "PROGRAM_STUDI.program")
            ->join('JURUSAN', 'JURUSAN.nomor', '=', 'PROGRAM_STUDI.jurusan')
            ->where("HARI.hari", $day)
            ->when($matkul, function($query, $matkul) {
                return $query->where('MATAKULIAH.nomor', $matkul);
            })
            ->when($jenjang, function ($query, $jenjang) {
                return $query->where('PROGRAM.program', $jenjang);
            })
            ->when($prodi, function($query, $prodi) {
                return $query->where('JURUSAN.jurusan', $prodi);
            })
            ->whereBetween('JAM.jam', [$now, $limit])
            ->orderBy('MAHASISWA.nama', 'asc')
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
            $this->err = $e;
        }
        
        

        return response()->json([
            "status" =>$this->status,
            "data" => $this->data,
            "error" => $this->err,
            'now' => $now,
            'limit' => $limit,
            'query' => DB::getQueryLog(),
            'day' => $day
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
        $date = Carbon::now()->format('Y-m-d h:i:s');
        $request->merge(["tanggal" => $date]);
        $data = $request->all();
        
        $validated = Validator::make($data, [
            'kuliah' => 'required',
            'mahasiswa' => 'required',
            'status' => 'required',
            'minggu' => 'required'
        ]);

        if ($validated->fails()) {
            $this->status = 'error';
            $this->err = $validated->errors();
        } else {
            $data = Abs::create($data);
            $this->data = $data;
            $this->status = "success";
        }
        return response()->json([
            'status' => $this->status,
            'data' => $this->data,
            'error' => $this->err
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
        // Untuk mengambil hanya per mahasiswa.
        $table = DB::table('MAHASISWA');
        date_default_timezone_set('Asia/Jakarta');
        Carbon::setLocale('id');
        

        $now = Carbon::now()->format('H:i');
        $date = Carbon::now()->format('Y-m-d');
        $int = (int) str_replace(':', '', $now);

        if ($int >= 1000 && $int <= 1140 ) {
            $limit = Carbon::now()->addMinutes(50)->format('H:i');
        } else {
            $limit = Carbon::now()->addMinutes(90)->format('H:i');
        }

        $day = Carbon::now()->isoformat('dddd');
        $array = [];
        
        try {
            $data = $table->distinct()->select(
                'MAHASISWA.nomor',
                'MATAKULIAH.matakuliah',
                'HARI.hari',
                'JAM.jam',
                'KULIAH.nomor as kuliah')
            ->join("KULIAH", "KULIAH.kelas", "=", "MAHASISWA.kelas")
            ->join("MATAKULIAH", "MATAKULIAH.nomor", "=", "KULIAH.matakuliah")
            ->join("HARI", "HARI.nomor", "=", "KULIAH.hari")
            ->join("JAM", "JAM.nomor", "=", "KULIAH.jam")
            ->where('MAHASISWA.nomor', '=', $id)
            ->where("HARI.hari", $day)
            ->whereBetween('JAM.jam', [$now, $limit])
            ->orderBy('JAM.jam', 'asc')
            ->get();

            

            foreach ($data as $key=>$value) {
                $check[$key] = Abs::whereDate('tanggal', $date)->where('kuliah',  $data[$key]->kuliah)->first();

                if ($check[$key]) {
                    $baru[$key] = $check[$key]->status;
                } else {
                    $baru[$key] = "Belum Presensi";
                };
                array_push($array, [
                    "nomor_mahasiswa" => $data[$key]->nomor,
                    "matakuliah" => $data[$key]->matakuliah,
                    "hari" => $data[$key]->hari,
                    "jam" => $data[$key]->jam,
                    'status' => $baru[$key],
                    'kuliah' => $data[$key]->kuliah
                ]);
            }

            $this->data = $array;
            $this->status = "success";
        } catch (QueryException $e) {
            $this->status = "failed";
            $this->err = $e;
        }
        
        

        return response()->json([
            "status" =>$this->status,
            "data" => $this->data,
            "error" => $this->err,
        ]);
    }

    public function one($id) {
        $table = DB::table('MAHASISWA');
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
                'MAHASISWA.nomor',
                'MATAKULIAH.matakuliah',
                'HARI.hari',
                'PEGAWAI.nama as dosen_pengampu',
                'JAM.jam',
                'KULIAH.nomor as kuliah')
            ->join("KULIAH", "KULIAH.kelas", "=", "MAHASISWA.kelas")
            ->join("MATAKULIAH", "MATAKULIAH.nomor", "=", "KULIAH.matakuliah")
            ->join("HARI", "HARI.nomor", "=", "KULIAH.hari")
            ->join("JAM", "JAM.nomor", "=", "KULIAH.jam")
            ->join('PEGAWAI', 'PEGAWAI.nomor', 'KULIAH.dosen')
            ->where('MAHASISWA.nomor', '=', $id)
            ->where("HARI.hari", $day)
            ->whereBetween('JAM.jam', [$now, $limit])
            ->orderBy('JAM.jam', 'asc')
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
            $this->err = $e;
        }
        
        

        return response()->json([
            "status" =>$this->status,
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
        
    }

    public function rekap($id) {

        // Rekap absensi per matakuliah
        DB::statement("SET SQL_MODE=''");
        
        $this->data = Abs::select(
            'ABSENSI_MAHASISWA.tanggal',
            'MATAKULIAH.kode',
            'MATAKULIAH.matakuliah',
            DB::raw('COUNT(CASE WHEN ABSENSI_MAHASISWA.STATUS = "H" THEN 1 END) AS HADIR,COUNT(CASE WHEN ABSENSI_MAHASISWA.STATUS = "S" OR ABSENSI_MAHASISWA.STATUS = "A" THEN 1 END) AS TIDAK_HADIR')
        )->join('KULIAH', 'ABSENSI_MAHASISWA.kuliah', '=', 'KULIAH.nomor')
        ->join('MATAKULIAH', 'KULIAH.matakuliah', '=', 'MATAKULIAH.nomor')
        ->join('KELAS', 'KULIAH.kelas', '=', 'KELAS.nomor')
        ->join('MAHASISWA', 'ABSENSI_MAHASISWA.mahasiswa', '=', 'MAHASISWA.nomor')
        ->where('ABSENSI_MAHASISWA.mahasiswa', $id)
        ->groupBy('MATAKULIAH.matakuliah')
        ->get();

        $this->status = "success";

        return response()->json([
            "status" =>$this->status,
            "data" => $this->data,
            "error" => $this->err,
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
        $check = Abs::where('NOMOR', $id);
        $data = $request->all();
        $validated = Validator::make($data, [
            'status' => 'required',
        ]);

        if ($validated->fails()) {
            $this->status = "error";
            $this->err = $validated->errors();
        } else if(!$check){
            $this->status = "failed";
            $this->err = "Data not found";
        }
        else {
            $check->update($data);
            $this->data = $check->get();
            $this->status = "success";
        }

        return response()->json([
            'status' => $this->status,
            'data' => $this->data,
            'error' => $this->err
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
        $check = Abs::where('NOMOR', $id);

        if ($check) {
            $this->status = "success";
            $this->data = $check->get();
            $check->delete();
        } else {
            $this->status = "failed";
        }

        return response()->json([
            'status' => $this->status,
            'data' => $this->data,
            'error' => $this->err
        ]);
    }
}