<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Program;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\QueryException;
use App\Models\Mahasiswa;

class ProgramController extends Controller
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
            $this->data = Program::get();
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

    public function program_mahasiswa(Request $req)
    {
        try {
            $where = [];
            if ($req->status) {
                $where[] = ['mahasiswa.status', '=', $req->status];
            }

            $this->data = Mahasiswa::select('p.nomor', 'p.program')
                ->leftJoin('program_studi as ps', 'mahasiswa.program_studi', '=', 'ps.nomor')
                ->leftJoin('program as p', 'ps.program', '=', 'p.nomor')
                ->where($where)
                ->groupBy('ps.program')
                ->get();
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