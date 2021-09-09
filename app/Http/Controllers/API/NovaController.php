<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\Va;
use Illuminate\Support\Facades\DB;

class NovaController extends Controller
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
        //
        $this->data = Va::all();
        $this->status = "success";
        
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
        $now = Carbon::now()->format('ym');
        $x = 1;
        do {
            $number = mt_rand(0000, 9999);
            $check = Va::whereRaw("RIGHT(nomor_va, 4) = $number")->first();
            if ($check != null) {
                $this->status = "record exist, generating another number.";
            } else {
                $this->status = "no records found, creating record.";
                $res = (int) $now.$number;
                $newData = $data + ['nomor_va' => $res];
                $this->data = Va::create($newData);
                $x = 2;
                break;
            }
        } while ($x == 1);

        return response()->json([
            "status" => $this->status,
            'data' => $this->data, 
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
}
