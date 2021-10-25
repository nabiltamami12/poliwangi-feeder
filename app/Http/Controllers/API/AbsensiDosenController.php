<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use App\Models\KelasMengajar;
// use Illuminate\Support\Facades\DB;

class AbsensiDosenController extends Controller
{
	protected $status = null;
  protected $error = null;
  protected $data = null;

	public function tahun_kelas_mengajar()
	{
		try {
			$this->status = "success";
			$this->data = KelasMengajar::groupBy('tahun')->orderBy('tahun', 'desc')->pluck('tahun');
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

	public function list_data(Request $req)
	{
		try {
			$this->data = (new KelasMengajar)->absensi_dosen([
				'tahun' => $req->get('tahun'),
				'semester' => $req->get('semester')
			]);
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