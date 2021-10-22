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
			$obj = KelasMengajar::with('rDosen:nomor,nip,nama')->get();
			$data = [];
			if ($obj) {
				foreach ($obj as $k => $v) {
					$data[] = [
						"id" => $v->id,
						"dosen" => $v->rDosen ? $v->rDosen->nama : '-',
						"jumlah_matakuliah" => 0,
						"kehadiran" => 0,
						"tidak_hadir" => 0
					];
				}
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