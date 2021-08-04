<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\DosenPengampu;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Validator;

class DosenPengampuController extends Controller
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
        
        $this->data = DosenPengampu::select(
            'pegawai.nama',
            'pegawai.nomor',
            DB::raw('count(DISTINCT dosen_pengampu.matakuliah) as jumlah_matkul'),
        )
        ->join("pegawai", "dosen_pengampu.dosen", "=", "pegawai.nomor",'right')
        ->join("staff", "pegawai.staff", "=", "staff.nomor")
        ->where("pegawai.staff", "=", 4)
        ->groupBy('pegawai.nomor', 'pegawai.nama')
        ->get();
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        
        /* Mengambil nilai 'NOMOR' awal dari request untuk di-increment. */
        $nomor = $data['nomor'];
        $finalArr = array();
        
        /* Validasi nilai yang didapat dari requests */
        $validated = Validator::make($data, [
            'nomor' => 'required|integer',
            'semester' => 'required|integer',
            'dosen' => 'required|integer',
            /* Tipe diubah menjadi 'string' agar bisa memiliki lebih dari satu nilai yang nantinya akan dipisah dengan koma. */
            'matakuliah' => 'required|string',
            
        ]);
        /* Mengambil data matkul yang dipilih menggunkan koma (,) untuk memisah. */
        $listMatkul = explode(',', $data['matakuliah']);
        /* Convert string array $listMatkul menjadi array integer agar dapat diproses di DB. */
        $intArray = array_map(function($value) { return (int)$value; },$listMatkul);

        $intHapus = null;
        if (isset($data['hapus'])) {
            $listHapus = explode(',', $data['hapus']);
            $intHapus = array_map(function($value) { return (int)$value; },$listHapus);
        }   
        /* Convert string array $listHapus menjadi array integer agar dapat diproses di DB. */
        
        
        /* Menghitung jumlah record yang perlu dimasukkan ke DB. */
        $count = count($listMatkul);
        
        /* Mengisi array finalArray dengan data yang didapat dari request. */
        for ($x = 0; $x < $count; $x++) {
            $finalArr[$x] = $request->except('hapus');
            /* Increment value untuk field 'NOMOR' karena di DB tidak AI */
            $finalArr[$x]['nomor'] = (int) $nomor++; 
            $finalArr[$x]['semester'] = $data['semester'];
            $finalArr[$x]['dosen'] = $data['dosen'];
            $finalArr[$x]['matakuliah'] = $intArray[$x];
        };

        /* Skenario jika sukses atau gagal validasi. */
        if ($validated->fails()) {
            $this->status = 'failed';
            $this->data = "Tidak ada data";
            $this->err = $validated->errors();
        } else {
            /* Mengecek proses input ke database dan melaporkan jika ada error. */
            try {
                for ($y = 0; $y < $count; $y++) {
                    $check = Kuliah::where('NOMOR','=',$finalArr[$y]['nomor']);
                    if(!$check->get()->isEmpty()) {
                        $check->update($finalArr[$y]);
                        $this->status = "success updating";
                        if ($intHapus) {
                            $model = Kuliah::whereIn('nomor', $intHapus)->delete();
                            $this->status = "success";
                            break;
                        } else {
                            $this->status = "Kosong";
                            break;
                        };
                    } else {
                        Kuliah::insert($finalArr);
                        $this->status = "success";
                        break;
                    }
                };
                $this->data = $finalArr;
            } catch(QueryException $e) {
                $this->status = 'failed';
                $this->data = "Tidak ada data";
                $this->err = $e;
            }
        }
        return response()->json([
            'status' => $this->status,
            'data' => $this->data,
            'error' => $this->err,
            'hapus' => $intHapus
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
        DB::statement("SET SQL_MODE=''");
        
        $data = DosenPengampu::select(
            'dosen_pengampu.*',
            'pegawai.nama'
        )
        ->join("pegawai", "dosen_pengampu.dosen", "=", "pegawai.nomor",'right')
        ->where("pegawai.staff", "=", 4)
        ->where("pegawai.nomor",$id)
        ->get();
        
        $this->data = [
            'nama' => $data[0]['nama'],
            'matkul' => $data
        ];

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
        $check = Kuliah::where('NOMOR', $id);
        $data = $request->all();
        
        $validated = Validator::make($data, [
            'tahun' => 'required|integer',
            'semester' => 'required|integer',
            'dosen' => 'required|integer',
            'matakuliah' => 'required|integer',
        ]);
        

        if ($validated->fails()) {
            $this->status = 'failed';
            $this->data = "Tidak ada data";
            $this->err = $validated->errors();
        } else if (!$check){
            $this->status = "failed";
            $this->err = "Data not found";
        } else {
            $check->update($data);
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
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $check = Kuliah::where('NOMOR', $id);

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