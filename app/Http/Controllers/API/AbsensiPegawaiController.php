<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use App\Models\Kepegawaian\AbsensiKaryawan;
use App\Models\Kepegawaian\Pegawai;

class AbsensiPegawaiController extends Controller
{

    protected $status = null;
	protected $error = null;
	protected $data = null;

    public function index()
    {
        //
    }

    public function list_data(Request $request)
	{

        $year = $request->get('tahun');
        $bulan = $request->get('bulan');
        $role = $request->get('role');
        
		try {
            // switch($role) {
            //     case 'all':
            //         break;
            //     default:
            //         break;
            // }
			if($bulan != 'all') {
				$query = Pegawai::withCount(['hadir' => function($q) use ($year, $bulan) {
							$q->whereYear('tanggal', $year)->whereMonth('tanggal', $bulan);
						}, 'totalpresensi' => function($k) use ($year, $bulan) {
							$k->whereYear('tanggal', $year)->whereMonth('tanggal', $bulan);
						}])->where('id_staf', '!=', 4)->get();
			} else {
				$query = Pegawai::withCount(['hadir' => function($q) use ($year) {
							$q->whereYear('tanggal', $year);
						}, 'totalpresensi' => function($k) use ($year) {
							$k->whereYear('tanggal', $year);
						}])->where('id_staf', '!=', 4)->get();
			}

			$this->data = $query;
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

   public function detail_presensi(Request $request)
   {
       try {
		   	if($request->bulan != 'all') {
				$query = AbsensiKaryawan::where('pegawai', $request->id_pegawai)
										->whereYear('tanggal', $request->tahun)
										->whereMonth('tanggal', $request->bulan)
										->orderBy('tanggal', 'asc')
										->get();
		   	}else {
				$query = AbsensiKaryawan::where('pegawai', $request->id_pegawai)
										->whereYear('tanggal', $request->tahun)
										->orderBy('tanggal', 'asc')
										->get();
		   	}

			$this->data = $query;
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
