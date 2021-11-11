<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SettingBiaya as SB;
use Illuminate\Support\Facades\Validator;

class SettingBiayaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected $status = null;
    protected $error = null;
    protected $data = null;

    public function index(Request $request)
    {
        try {
            if(isset($request->pendaftaran) && $request->pendaftaran == 1){
                $data = SB::where('nama', 'biaya-pendaftaran')->first();
                $this->data = $data->nilai;
                $this->status = "success";
            }else{
                $data = SB::where('nama', 'biaya_admin')->first();
                $this->data = $data->nilai;
                $this->status = "success";
            }
        
        } catch (QueryException $e) {
            $this->status = "failed";
            $this->error = $e;
        }

        return response()->json([
            'status' => $this->status,
            'data' => $this->data,
            'error' => $this->error
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
        // 
        $data = $request->all();
        $data['nama'] = "biaya_admin";
        if(isset($request->pendaftaran) && $request->pendaftaran == 1){
            $data['nama'] = "biaya-pendaftaran";
        }
        $data['keterangan'] = "tambahan tagihan semua pembayaran";
        $validator = Validator::make($data, [
           'nilai' => "required"
        ]);

        if ($validator->fails()) {
            return response(
                [
                    'status' => "failed",
                    'data' => ["message" => "tolong isi field dengan benar"],
                    'error' => $validator->errors(),
                ]
            );
        }

        try {
            
            $this->data = SB::updateOrCreate([
                'nama' => $data['nama']
            ],[
                'nilai' => $data['nilai'], 'keterangan' => $data['keterangan']
            ]);
    
            $this->data = $data['nilai'];
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

}
