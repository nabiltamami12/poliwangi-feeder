<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ukt;
use Illuminate\Support\Facades\DB;
use App\Models\Prodi;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Validator;

class UktController extends Controller
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
        $list = Prodi::pluck('nomor');
        $year = Carbon::now()->format('Y');
        $arr = $list->toArray();
        foreach ($list as $key=>$value) {
            $data = Ukt::where([['program_studi', '=',$list[$key]],
                                ['tahun', $year]])
            ->first();
            if ($data == null) {
                $created = Ukt::insert([
                    ['program_studi' => $arr[$key], "tahun" => $year] 
                ]);
                $this->status = "Data not found, creating entry.";
            }  else {
                $this->status = "Data found, skipping entry.";
            }
        }
        $this->data = Ukt::select(
            'tarif_kelompok.*',
            DB::raw("CONCAT(program.program, ' ', program_studi.program_studi) AS prodi"))
        ->join('program_studi', 'tarif_kelompok.program_studi', '=', 'program_studi.nomor')
        ->join('program', 'program_studi.program', '=', 'program.nomor')
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
        $validated = Validator::make($data, [
            'program_studi' => 'required'
        ]);

        if ($validated->fails()) {
            $this->status = 'error';
            $this->error = $validated->errors();
        } else {
            $data = Ukt::create($data);
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
        $this->data = Ukt::select(
            'tarif_kelompok.*',
            DB::raw("CONCAT(program.program, ' ', program_studi.program_studi) AS prodi")
        )
        ->join('program_studi', 'tarif_kelompok.program_studi', '=', 'program_studi.nomor')
        ->join('program', 'program_studi.program', '=', 'program.nomor')
        ->where('tarif_kelompok.id', $id)
        ->get();

        $this->status = "success";
        
        return response()->json([
            "status" => $this->status,
            "data" => $this->data,
            "error" => $this->err
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
        $check = Ukt::where('id', $id);
        $data = $request->all();

        $validate = Validator::make($data, [
            
        ]);

        if ($validate->fails()) {
            $this->status = "error";
            $this->error = $validate->errors();
        } else if(!$check){
            $this->status = "failed";
            $this->error = "Data not found";
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
        $check = Ukt::where('id', $id);

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
