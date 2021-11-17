<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RiwayatPembayaran;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\QueryException;

class RiwayatPembayaranController extends Controller
{
	protected $status = null;
	protected $error = null;
	protected $data = null;

	public function index(Request $request)
	{
		try {
			$data = $request->all();
			$obj = new \App\Datatables\RiwayatPembayaranDatatable();
			$lists = $obj->get_datatables();
			$data = [];
			foreach ($lists as $list) {
				$kategori = '';
				if ($list->kategori === 'UKT') {
					if ($list->semester) {
						$kategori = $list->kategori.' semester '.$list->semester;
					}else{
						$kategori = $list->kategori;
					}
				} else {
					$kategori = $list->kategori;
				}
				$row = [];
				$row[] = $list->updated_at;
				$row[] = $list->nrp;
				$row[] = $list->nama;
				$row[] = $list->nominal;
				$row[] = $kategori;
				$row[] = $list->keterangan;
				$data[] = $row;
			}
			return [
				"draw" => $request->input('draw'),
				"recordsTotal" => $obj->count_all_datatables(),
				"recordsFiltered" => $obj->count_filtered_datatables(),
				"data" => $data,
				"status" => "success",
				"error" => $this->error
			];
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
