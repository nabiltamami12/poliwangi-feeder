<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RangeNilai;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\QueryException;
use DB;
use Illuminate\Support\Carbon;

class RangeNilaiController extends Controller
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
            $versi = RangeNilai::max('versi');
            $rangenilai = RangeNilai::where('versi',$versi)->orderBy('nh')->get();
            $this->data = $rangenilai;
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

    public function history()
    {
        try {
            $rangenilai = RangeNilai::orderBy('versi')->orderBy('nh')->get();
            $this->data = $rangenilai;
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
        DB::enableQueryLog();

        try {
            foreach ($request->data as $key => $value) {
                $value['tanggal_awal'] = Carbon::parse($value['tanggal_awal'])->format('Y-m-d');
                $value['tanggal_akhir'] = Carbon::parse($value['tanggal_akhir'])->format('Y-m-d');
                // echo json_encode($value);
                $data = RangeNilai::create($value);
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
}