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

	public function index()
	{
		try {
			$obj = RiwayatPembayaran::select('id', 'nama', 'nrp', 'nominal', 'keterangan', 'kategori', 'updated_at', 'semester')
				->orderBy('updated_at', 'desc')
				->get();
			$this->data = $obj;
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
