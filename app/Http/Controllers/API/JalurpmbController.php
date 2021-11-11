<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Jalurpmb;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\JalurpmbResource;
use Illuminate\Support\Carbon;
use App\Models\Jalursyarat;
use DB;
use GuzzleHttp\Promise\Create;
use App\Models\Jurusan;
use App\Models\Prodi;


class JalurpmbController extends Controller
{
    protected $status = null;
    protected $error = null;
    protected $data = null;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        try {
            $jalur_pmb = Jalurpmb::get();
            
            $this->data = $jalur_pmb;
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

    public function get_register()
    {
        try {
            $jalur_pmb = Jalurpmb::get();
            $politeknik = DB::table('politeknik')->get();
            $politeknik_jurusan = DB::table('politeknik_jurusan as pj')->select('pj.*','p.politeknik')->join('politeknik as p','p.id','=','pj.id_politeknik')->get();
            $jurusan = Jurusan::where('jurusan', '!=', '')->get();
            $prodi = Prodi::select(
                "program_studi.*",
                "program.program as nama_program",
                "jurusan.jurusan as nama_jurusan",
                "program_studi.alias",
            )
            ->join("program", "program_studi.program", "=", "program.NOMOR")
            ->join("jurusan", "program_studi.jurusan", "=", "jurusan.NOMOR")
            ->get();
            
            $this->data = [
                'jalur_pmb' => $jalur_pmb,
                'politeknik' => $politeknik,
                'politeknik_jurusan' => $politeknik_jurusan,
                'jurusan' => $jurusan,
                'prodi' => $prodi,
            ];
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
            $jalur = new Jalurpmb;
            $jalur->jalur_daftar = $request->jalur_daftar;
            $jalur->jml_seleksi = $request->jml_seleksi;
            $jalur->is_active = 0;
            $jalur->tahun = $request->tahun;
            $jalur->kuota = $request->kuota;
            $jalur->tanggal_buka = Carbon::parse($request->tanggal_buka)->format('Y-m-d');
            $jalur->tanggal_tutup = Carbon::parse($request->tanggal_tutup)->format('Y-m-d');
            $jalur->save();
            // foreach ($request->syarat as $key => $value) {
            //     $score = array(
            //         'id_jalur' => $jalur->id,
            //         'id_syarat' => $value['id_syarat']
            //     );
            //     $scores = Jalursyarat::Create($score);
            // }
            $this->data = $jalur;
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
    public function show($id)
    {
        //
        try {
            $jalur_syarat = Jalursyarat::where('id_jalur',$id)->get();
            $pmb = Jalurpmb::where('id', $id)->first();
            $this->data = ['data'=>$pmb,'syarat'=>$jalur_syarat];
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
    public function update(Request $request, $pmb)
    {
        $data = $request->data;
        $syarat = $request->syarat;
        try {
            $jalur = Jalurpmb::where('id', $pmb)->first();
            if ($syarat!=null) {
                Jalursyarat::where('id_jalur',$pmb)->delete();
                foreach ($syarat as $key => $value) {
                    $arr_syarat = [
                        'id_jalur'=>$pmb,
                        'id_syarat'=>$value
                    ];
                    Jalursyarat::insert($arr_syarat);
                }
            
            }
            $jalur->update([
                'jalur_daftar' => $data['jalur_daftar'],
                'jml_seleksi' => $data['jml_seleksi'],
                'is_active' => 0,
                'kuota' => $data['kuota'],
                'tanggal_buka' => Carbon::parse($data['tanggal_buka'])->format('Y-m-d'),
                'tanggal_tutup' => Carbon::parse($data['tanggal_tutup'])->format('Y-m-d'),
            ]);

            // Jalursyarat::where('id_jalur', $pmb)->delete();
            // foreach ($request->syarat as $key => $value) {
            //     $score = array(
            //         'id_jalur' => $jalur->id,
            //         'id_syarat' => $value['id_syarat']
            //     );
            //     $scores = Jalursyarat::Create($score);
            // }
            $this->data = $jalur;
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
            $pmb = Jalurpmb::where('id', $id);
            $pmb->delete();
            $this->data = "";
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
}
