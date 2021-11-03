<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use DB;

class Controller extends BaseController
{
    public $tahun_aktif;
    public $semester_aktif;
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct()
    {
        $data = DB::table('periode')->select('tahun','semester')->where('status',1)->first();
        $this->tahun_aktif = $data->tahun;
        $this->semester_aktif = $data->semester;
    }
}
