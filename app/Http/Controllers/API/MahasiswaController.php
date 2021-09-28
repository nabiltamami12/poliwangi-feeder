<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Mahasiswa as Mhs;
use App\Models\Nilai;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;
use BNI;

class MahasiswaController extends Controller
{

	protected $status = null;
	protected $error = null;
	protected $data = null;
	public function index(Request $request)
	{
		$data = $request->all();
		$where = [];
		if ( $request->program_studi != null ||  !isset($request->program_studi) ) {
			array_push($where,['m.program_studi','=',$request->program_studi]);
		}
		array_push($where,['m.status','=',$request->status]);
		
		try {
		 
			$data = DB::table('mahasiswa as m')
			->select('m.nomor','m.nrp','m.nama','m.tgllahir','m.notelp','m.email',)
			->join('kelas as k','m.kelas','=','k.nomor','left')
			->join('program_studi as ps','ps.nomor','=','m.program_studi')
			->where($where)
			->get();
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

	public function store(Request $request)
	{
		$data = $request->all();
		$validated = Validator::make($data, [
		]);

		if ($validated->fails()) {
			$this->status = 'error';
			$this->error = $validated->errors();
		} else {
			try {
				$data = Mhs::create($data);
				$this->data = $data;
				$this->status = "success";
			} catch (QueryException $e) {
				$this->status = "failed";
				$this->error = $e;
			}
		}
		return response()->json([
			"status" => $this->status,
			"data" => $this->data,
			"error" => $this->error
		]);
		
	}

	public function show($id)
	{
		try {
			$data = Mhs::where("nomor", $id)->get();
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

	public function update(Request $request, $id)
	{
		$check = Mhs::where('nomor', $id);
		$data = $request->all();

		$validate = Validator::make($data, [
		 
		]);

		if ($validate->fails()) {
			$this->status = "error";
			$this->error = $validate->errors();
		} else if(!$check){
			$this->status = "failed";
			$this->error = "Data not found";
		}
		else {
			try {
				$check->update($data);
				$this->data = $check->get();
				$this->status = "success";
			} catch (QueryException $e) {
				$this->status = "failed";
				$this->error = $e;
			}
		}
		return response()->json([
			"status" => $this->status,
			"data" => $this->data,
			"error" => $this->error
		]);
	}

	public function destroy($id)
	{
		try {
			$check = Mhs::where('NOMOR', $id);

			if ($check) {
				$this->status = "success";
				$this->data = $check->get();
				$check->delete();
			} else {
				$this->status = "failed";
			}
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

	public function create_va()
	{
		$BniEnc = new BNI();
		$raw = array(
			'type' => 'createbilling',
			'trx_id' => mt_rand(), // fill with Billing ID
			'trx_amount' => 10000,
			'billing_type' => 'c',
			'datetime_expired' => date('c', time() + 2 * 3600), // billing will be expired in 2 hours
			'virtual_account' => '',
			'customer_name' => 'Mr. X',
			'customer_email' => '',
			'customer_phone' => '',
		);

		$response = $BniEnc->getContent($raw);
		$response_json = json_decode($response, true);

		if ($response_json['status'] !== '000') {
			// handling jika gagal
			var_dump($response_json);
		}
		else {
			$data_response = $BniEnc->decrypt($response_json['data'], $client_id, $secret_key);
			// $data_response will contains something like this: 
			// array(
			//  'virtual_account' => 'xxxxx',
			//  'trx_id' => 'xxx',
			// );
			var_dump($data_response);
		}
	}
}