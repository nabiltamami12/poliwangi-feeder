<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pendaftar;
use App\Models\Jalurpmb;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\JalurpendaftarResource;
use Illuminate\Database\QueryException;
// use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;
use BNI;
use DB;

class PendaftarController extends Controller
{
	protected $status = null;
	protected $error = null;
	protected $data = null;

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index(Request $request)
	{
		DB::enableQueryLog();
		$table = DB::table('pendaftar');
		$table->select('pendaftar.*','jalur_penerimaan.jalur_daftar as jalur_penerimaan');
		$table->join('jalur_penerimaan','jalur_penerimaan.id','=','pendaftar.jalur_daftar');
		if ($request->program_studi) {
			$query = $table->where('program_studi',$request->program_studi); 
		}
		if ($request->jalur) {
			$query = $table->where('mahasiswa_jalur_penerimaan',$request->jalur);
		}
		try {
			$this->data = $table->get();
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

	public function dashboard(Request $request)
	{
		$token = $request->header('token');
		try {
			$id = Crypt::decrypt($token);
			$jurusan_pilihan = DB::table('jurusan_pilihan')->where('id_pendaftar',$id)->orderBy('urutan')->get();
			$arr_poliwangi = [];
			$poltek_lain = null;
			foreach ($jurusan_pilihan as $key => $value) {
				if ($value->jenis=="poliwangi") {
					$prodi = DB::table('program_studi as ps')
					->select(DB::raw('CONCAT(p.program," ",ps.program_studi) as prodi'))
					->join('program as p','p.nomor','=','ps.program')
					->where('ps.nomor',$value->program_studi)
					->first();
					array_push($arr_poliwangi,$prodi->prodi);
				} else {
					$poltek_lain = DB::table('politeknik as p')
					->select('p.politeknik',DB::raw('CONCAT(pj.jenjang," ",pj.jurusan) as prodi'))
					->join('politeknik_jurusan as pj','p.id','=','pj.id_politeknik')
					->where('pj.id',$value->program_studi)
					->first();
				}	
			}
			$this->data = ['poliwangi'=>$arr_poliwangi,'poltek_lain'=>$poltek_lain];
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

	public function verifikasi_pendaftar($id)
	{
		DB::enableQueryLog();
		try {
			$pendaftar = DB::table('pendaftar');
			$data = $pendaftar->where('nomor',$id)->first();
			if ($data->status=="Y") {
				$status = null;
				$delete = DB::table('mahasiswa')->where('no_pendaftaran',$data->nodaftar)->delete();
			}else{
				$status = "Y";

				$arr = [
					'no_pendaftaran' => $data->nodaftar,
					'nama' => $data->nama,
					'nik' => $data->nik,
					'nisn' => $data->nisn,
					'tmplahir' => $data->tempat_lahir,
					'tgllahir' => $data->tgllahir,
					'anak_ke' => $data->anak_ke,
					'jenis_kelamin' => $data->sex,
					'program_studi' => $data->program_studi,
					'jumlah_anak' => $data->jumlah_anak,
					'lulussmu' => $data->tahun_lulus_smu,
					'smu' => $data->smu,
					'alamat' => $data->alamat,
					'status' => "B",
					'jalur_daftar' => $data->jalur_daftar,
				];
				$insert = DB::table('mahasiswa')->insert($arr);
			}
			$update = $pendaftar->where('nomor',$id)->update(['status'=> $status]);

			
			$this->data = null;
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

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		$data = $request->all();

		$validator = Validator::make($data, [
			'jalur_daftar' => 'required|exists:jalur_penerimaan,id',
			// 'program_studi' => 'required|exists:program_studi,nomor',
			'nama' => 'required|string|max:100',
			'tgllahir' => 'required|date',
			'smu' => 'required|string|max:50',
			'foto' => 'required|mimes:jpg,png,jpeg|max:2048',
			'ayah' => 'required|string|max:60',
			'ibu' => 'required|string|max:60',
			'notelp_ortu' => 'required|string|max:20',
			'email' => 'required|email',
			// 'password' => ['required', 'confirmed', Password::min(8)],
		]);
		
		if ($validator->fails()) {
			return response(
				[
					'status' => "failed",
					'data' => ["message" => "data salah"],
					'error' => $validator->errors(),
				]
			);
		}

		$document = new Pendaftar();
		$document->jalur_daftar = $request->jalur_daftar;
		$document->program_studi = $request->program_studi;
		$document->nama = $request->nama;
		$document->tgllahir = date('Y-m-d', strtotime($request->tgllahir));
		$document->smu = $request->smu;
		$document->ayah = $request->ayah;
		$document->ibu = $request->ibu;
		$document->notelp_ortu = $request->notelp_ortu;
		$document->email = $request->email;
		// $document->password = Hash::make($request->password);
		$document->trx_amount = Jalurpmb::select('biaya')->where('id', $request->jalur_daftar)->get()->first()->biaya;
		$document->save();

		if ($fotos = $request->file('foto')) {
			$update_data = [];
			$namafile = md5($document->id.'f0to').'.'.$fotos->getClientOriginalExtension();
			$update_data['foto'] = $namafile;
			$update_data['nodaftar'] = date('Y').$document->id;
			$fotos->move(public_path() . '/pendaftar', $namafile);
			$check = Pendaftar::where('nomor', $document->id);
			$check->update($update_data);
		}

		for ($i=0; $i < $data['jml_seleksi'] ; $i++) { 
			$arr = [
				'id_pendaftar' => $document->id,
				'politeknik' => 1,
				'program_studi' => $data["program_studi_$i"],
				'urutan' => $i+1,
				'jenis' => 'poliwangi',
			];
			DB::table('jurusan_pilihan')->insert($arr);
		}
		if ($data['politeknik_lain']) {
			$arr = [
				'id_pendaftar' => $document->id,
				'politeknik' => $data['politeknik_lain'],
				'program_studi' => $data["program_studi_lain"],
				'urutan' => $i+1,
				'jenis' => 'poltek_lain',
			];
			DB::table('jurusan_pilihan')->insert($arr);
		}
		

		return response()->json([
			"status" => 'success',
			"data" => Crypt::encrypt($document->id),
			"message" => "Sukses"
		]);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show(Request $request)
	{
		$token = $request->header('token');
		try {
			$id = Crypt::decrypt($token);
			$document = Pendaftar::where('nomor', $id)->get()->first();
			unset($document->nodaftar, $document->nomor, $document->password);
			$this->data = $document;
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

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request)
	{
		$token = $request->header('token');
		$id = Crypt::decrypt($token);
		$update_data = [];
		foreach ($request->all() as $key => $value) {
			$update_data[$key] = $value;
			if ($key == 'tgllahir') {
				$update_data['tgllahir'] = date('Y-m-d', strtotime($value));
			}
			
		}
		unset($update_data['id'], $update_data['nodaftar']);
		if ($ijasah = $request->file('ijasah')) {
			$namafile = md5($id.'ijas4h').'.'.$ijasah->getClientOriginalExtension();
			$update_data['ijasah'] = $namafile;
			$ijasah->move(public_path() . '/pendaftar', $namafile);
			// $check = Pendaftar::where('nomor', $document->id);
			// $check->update($update_data);
		}
		if ($foto_peraturan = $request->file('foto_peraturan')) {
			$namafile = md5($id.'f0to_p3raturan').'.'.$foto_peraturan->getClientOriginalExtension();
			$update_data['foto_peraturan'] = $namafile;
			$foto_peraturan->move(public_path() . '/pendaftar', $namafile);
			// $check = Pendaftar::where('nomor', $document->id);
			// $check->update($update_data);
		}
		if (count($update_data) > 0) {
			$document = Pendaftar::where('nomor', $id);
			$document->update($update_data);
		}

		return response()->json([
			'status' => 'success',
			'data' => $update_data,
			'messagge' => 'data berhasil di update'
		]);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		try {
			$jalurpendaftar = Pendaftar::where('nomor', $id);
			$jalurpendaftar->delete();
			$this->data = $jalurpendaftar;
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

	public function va(Request $request)
	{
		$token = $request->header('token');
		try{
			$id = Crypt::decrypt($token);
			$document = Pendaftar::select('is_lunas', 'trx_amount')->where('nomor', $id)->get()->first();
			if ($document->is_lunas == 1) {
				return response()->json([
					"status" => 'success',
					"data" => [
						'is_lunas' => 1
					],
					"error" => $this->error
				]);
			}
			/*
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
			}*/

			$this->data = [
				'is_lunas' => 0,
				'trx_amount' => $document->trx_amount,
				'virtual_account' => '80010000'.$id.'000',
				'datetime_expired_iso8601' => date('c', time() + 2 * 3600 * 24), // 2 days
				'document' => $document
			];
			$this->status = 'success';
		}catch(DecryptException $e){
			$this->status = 'failed';
			$this->error = $e;
		}
		return response()->json([
			"status" => $this->status,
			"data" => $this->data,
			"error" => $this->error
		]);
	}

	public function is_lunas(Request $request)
	{
		$token = $request->header('token');
		try{
			$id = Crypt::decrypt($token);
			$document = Pendaftar::select('is_lunas')->where('nomor', $id)->get()->first();
			$this->data = [
				'is_lunas' => 0
			];
			if ($document->is_lunas == 1) {
				$this->data = [
					'is_lunas' => 1
				];
			}
			$this->status = 'success';
		}catch(DecryptException $e){
			$this->status = 'failed';
			$this->error = $e;
		}
		return response()->json([
			"status" => $this->status,
			"data" => $this->data,
			"error" => $this->error
		]);
	}

	public function login(Request $request)
	{
		$data = $request->all();

		$validator = Validator::make($data, [
			'nodaftar' => 'required',
			'password' => 'required',
		]);

		if ($validator->fails()) {
			return response(
				[
					'status' => "failed",
					'data' => null,
					'error' => $validator->errors(),
				]
			);
		}
		$document = Pendaftar::select('password', 'nomor')->where('nodaftar', $data['nodaftar'])->get()->first();
		$hashedPassword = $document->password;
		if (Hash::check($request->password, $hashedPassword)) {
			return response()->json([
				"status" => 'success',
				"data" => Crypt::encrypt($document->nomor),
				"message" => "Sukses"
			]);
		}
		return response()->json([
			"status" => 'failed',
			"data" => null,
			"message" => "Gagal"
		]);
	}

	public function keuangan()
	{
		try {
			$tahun_aktif = DB::table('periode')->select('tahun')->where('status', '1')->get()->first()->tahun;
			$data = Pendaftar::select('nomor_va', 'trx_amount', 'nama', 'is_lunas', 'pendaftar.nomor')->where('tahun_ajaran', $tahun_aktif)->orderBy('is_lunas', 'desc')->get();
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

	public function mahasiswa(Request $request)
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
}