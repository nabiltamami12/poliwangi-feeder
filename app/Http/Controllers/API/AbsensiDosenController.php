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

	public function pertemuan_dosen(Request $req, $id_dosen)
	{
		try {
			$this->data = (new KelasMengajar)->absensi_pertemuan_dosen([
				'tahun' => $req->get('tahun'),
				'semester' => $req->get('semester'),
				'dosen' => $id_dosen
			]);
			if ($this->data) {
				foreach ($this->data as $key => $value) {
					$detail = explode(",", $value->detail);
					$detail_pertemuan = [];
					foreach ($detail as $v) {
						$pertemuan = explode("=", $v);
						$detail_pertemuan[ $pertemuan[0] ] = [ 
							"nomor" => $pertemuan[1],
							"pertemuan" => $pertemuan[2]
						];
					}
					$this->data[$key]->detail = $detail_pertemuan;
				}
			}
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

	public function simpan(Request $req)
	{
		try {
			$arr = $req->get('arr_data') ?? [];
			foreach ($arr as $key => $value) {
				if ($value['nomor']) {
					KelasMengajar::where('id', $value['nomor'])->update([ 'status' => $value['status'] ]);
				} else {
					$where = [
						'tahun' => $req->get('tahun'), 
						'dosen' => $req->get('dosen'), 
						'kuliah' => $value['kuliah'], 
						'pertemuan' => $value['pertemuan']
					];
					$obj_data = $where;
					// $obj_data['jam_mulai'] = Carbon::now()->format('H:i');
					$obj_data['status'] = $value['status'];
					$obj_data['status_kelas'] = 'close';
					KelasMengajar::updateOrCreate($where, $obj_data);
				}
			}
			$this->data = true;
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