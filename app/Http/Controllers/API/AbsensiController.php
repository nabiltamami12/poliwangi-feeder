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
        $table = DB::table('MAHASISWA');
        date_default_timezone_set('Europe/Moscow');
        Carbon::setLocale('id');
        DB::enableQueryLog();
        
        $array = [];
        $now = Carbon::now()->format('H:i');
        $int = (int) str_replace(':', '', $now);
        if ($int >= 1000 && $int <= 1140 ) {
            $limit = Carbon::now()->addMinutes(50)->format('H:i');
        } else {
            $limit = Carbon::now()->addMinutes(90)->format('H:i');
        }
        $day = Carbon::now()->isoformat('dddd');

        $jenjang = $req->jenjang;
        $prodi = $req->prodi;
        $matkul = $req->matkul;

        
        
        try {
            $data = $table->distinct()->select(
                'MAHASISWA.nomor',
                'MAHASISWA.nrp',
                'MAHASISWA.nama',
                'MATAKULIAH.matakuliah',
                'HARI.hari',
                'JAM.jam',
                'PROGRAM.program AS jenjang',
                'JURUSAN.jurusan')
            ->join("KULIAH", "KULIAH.kelas", "=", "MAHASISWA.kelas")
            ->join("MATAKULIAH", "MATAKULIAH.nomor", "=", "KULIAH.matakuliah")
            ->join("HARI", "HARI.nomor", "=", "KULIAH.hari")
            ->join("JAM", "JAM.nomor", "=", "KULIAH.jam")
            ->join("PROGRAM_STUDI", 'PROGRAM_STUDI.nomor', '=', 'MATAKULIAH.program')
            ->join("PROGRAM", "PROGRAM.nomor", "=", "PROGRAM_STUDI.program")
            ->join('JURUSAN', 'JURUSAN.nomor', '=', 'MATAKULIAH.jurusan')
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
            ->orderBy('JAM.jam', 'asc')
            ->get();

            foreach ($data as $key=>$value) {
                $batas[$key] = Carbon::parse($data[$key]->jam)->addMinutes(15)->format('H:i');
                array_push($array, [
                    "nomor" => $data[$key]->nomor,
                    "nrp" => $data[$key]->nrp,
                    "nama" => $data[$key]->nama,
                    "matakuliah" => $data[$key]->matakuliah,
                    "hari" => $data[$key]->hari,
                    "jam" => $data[$key]->jam,
                    "batas" => $batas[$key],
                    "jenjang" => $data[$key]->jenjang,
                    "jurusan" => $data[$key]->jurusan
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
            'query' => DB::getQueryLog()
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
        $validated = Validator::make($data, [
            'kuliah' => 'required',
            'mahasiswa' => 'required',
            'tanggal' => 'required',
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
        $int = (int) str_replace(':', '', $now);

        if ($int >= 1000 && $int <= 1140 ) {
            $limit = Carbon::now()->addMinutes(50)->format('H:i');
        } else {
            $limit = Carbon::now()->addMinutes(90)->format('H:i');
        }

        $day = Carbon::now()->isoformat('dddd');
        
        try {
            $this->data = $table->distinct()->select(
                'MAHASISWA.nomor',
                'MATAKULIAH.matakuliah',
                'HARI.hari',
                'JAM.jam')
            ->join("KULIAH", "KULIAH.kelas", "=", "MAHASISWA.kelas")
            ->join("MATAKULIAH", "MATAKULIAH.nomor", "=", "KULIAH.matakuliah")
            ->join("HARI", "HARI.nomor", "=", "KULIAH.hari")
            ->join("JAM", "JAM.nomor", "=", "KULIAH.jam")
            ->where('MAHASISWA.nomor', '=', $id)
            ->where("HARI.hari", $day)
            ->whereBetween('JAM.jam', [$now, $limit])
            ->orderBy('JAM.jam', 'asc')
            ->get();
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