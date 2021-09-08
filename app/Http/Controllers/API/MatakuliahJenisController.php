<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MatakuliahJenis;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\QueryException;

class MatakuliahJenisController extends Controller
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
        try {
            $this->data = MatakuliahJenis::get();
            $this->status = "success";
        } catch (QueryException $e) {
            $this->status = "failed";
            $this->error = $e;
        }
        return response()->json([
            "status" => $this->status,
            "data" => $this->data,
            "error" => $this->error->errorInfo
        ]);
    }
}