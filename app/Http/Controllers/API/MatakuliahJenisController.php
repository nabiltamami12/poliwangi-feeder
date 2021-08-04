<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MatakuliahJenis;
use Illuminate\Support\Facades\Validator;

class MatakuliahJenisController extends Controller
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
        $this->data = MatakuliahJenis::get();
        $this->status = "success";

       
        return response()->json([
            "status" => $this->status,
            "data" => $this->data,
            "error" => $this->err
        ]);
    }
}