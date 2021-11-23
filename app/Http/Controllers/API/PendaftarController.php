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
use App\Events\LogMahasiswaStatus;
use App\Models\Mahasiswa;
use Illuminate\Support\Carbon;
use App\Datatables\PendaftarDatatable;

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
		try {
			$where = [];
			if ( $request->program_studi ) {
				array_push($where,['jpl.program_studi','=',$request->program_studi]);
			}
			if ( $request->jalur ) {
				array_push($where,['p.jalur_daftar','=',$request->jalur]);
			}

			$obj = new PendaftarDatatable($where);
			$lists = $obj->get_datatables();
			$data = [];
			$no = $request->input("start");
			foreach ($lists as $list) {
				$no++;
				$row = [];
				$row[] = $no;
				$row[] = $list->nodaftar;
				$row[] = $list->nama;
				$row[] = $list->jalur_penerimaan;
				$row[] = ($list->status === "Y") ? "<span class='text-success'>LOLOS</span>" : ( ($list->status === "T") ? "<span class='text-danger'>TIDAK LOLOS</span>" : "<span class='text-warning'>MENUNGGU</span>" );
				
				$btn_konfirmasi = '<span id="btn_'.$list->nomor.'" onclick="func_modal('.$list->nomor.')" data-id="'.$list->nomor.'" class="badge btn-info_transparent text-primary">
						<i class="iconify-inline mr-1 text-primary" data-icon="akar-icons:circle-check-fill"></i>
						<span class="text-capitalize text-primary">Konfirmasi</span>
					</span>';
				$btn_edit = '<a href="'.url('admin/pmb/datapendaftar/'.$list->nomor).'" class="badge btn-info_transparent text-primary">
						<i class="iconify-inline mr-1 text-primary" data-icon="bx:bx-edit-alt"></i>
						<span class="text-capitalize text-primary">Edit</span>
					</a>';
				$row[] = $btn_konfirmasi.' &nbsp; '.$btn_edit;

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

	public function dashboard(Request $request)
	{
		DB::enableQueryLog();
		$token = $request->header('token');
		try {
			$id = Crypt::decrypt($token);
			$jurusan_pilihan = DB::table('jurusan_pilihan')->where('id_pendaftar',$id)->orderBy('urutan')->get();
			$arr_poliwangi = [];
			$poltek_lain = null;
			$arr_info=[];
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

			$info = DB::table('pendaftar')->select('status','program_studi','program_studi_luar')->where('nomor',$id)->first();
			array_push($arr_info,$info);
			if ($info->program_studi != null) {
				$poltek = "Politeknik Negeri Banyuwangi";
				$prodi = DB::table('program_studi as ps')
				->select(DB::raw('CONCAT(p.program," ",ps.program_studi) as prodi'))
				->join('program as p','p.nomor','=','ps.program')
				->where('ps.nomor',$info->program_studi)
				->first();
				$tanggungan = DB::table('mahasiswa as m')
								->select('m.ukt_kelompok','m.ukt','tk.spi')
								->join('tarif_kelompok as tk','tk.program_studi','=','m.program_studi')
								->where('m.id_pendaftar',$id)
								->first();
				$info->ukt_kelompok = $tanggungan->ukt_kelompok;
				$info->ukt = $tanggungan->ukt;
				$info->spi = $tanggungan->spi;
				$info->politeknik = $poltek;
				$info->prodi = $prodi->prodi;
				// $arr = [
				// 	'politeknik' => $poltek,
				// 	'prodi' => $prodi->prodi
				// ];
			}else{
				if ($info->program_studi_luar!=null) {
					$arr = DB::table('politeknik as p')
					->select('p.politeknik',DB::raw('CONCAT(pj.jenjang," ",pj.jurusan) as prodi'))
					->join('politeknik_jurusan as pj','p.id','=','pj.id_politeknik')
					->where('pj.id',$info->program_studi_luar)
					->first();
					$info->politeknik = $arr->politeknik;
					$info->prodi = $arr->prodi;
				}
			}

			$this->data = ['info'=>$info,'poliwangi'=>$arr_poliwangi,'poltek_lain'=>$poltek_lain];
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

	public function konfirmasi_pendaftar($id)
	{
		try {
			$pendaftar = DB::table('pendaftar as p')->select('p.nomor as id','p.nama','p.nodaftar','p.status','p.program_studi','p.program_studi_luar','jp.jalur_daftar')->join('jalur_penerimaan as jp','jp.id','=','p.jalur_daftar')->where('p.nomor',$id)->first();
			$jurusan_pilihan = DB::table('jurusan_pilihan')->where('id_pendaftar',$id)->orderBy('urutan')->get();
			$arr_poliwangi = [];
			$poltek_lain = null;
			foreach ($jurusan_pilihan as $key => $value) {
				if ($value->jenis=="poliwangi") {
					$prodi = DB::table('program_studi as ps')
					->select('ps.nomor as id',DB::raw('CONCAT(p.program," ",ps.program_studi) as prodi'))
					->join('program as p','p.nomor','=','ps.program')
					->where('ps.nomor',$value->program_studi)
					->first();
					array_push($arr_poliwangi,$prodi);
				} else {
					$poltek_lain = DB::table('politeknik as p')
					->select('pj.id as id','p.politeknik',DB::raw('CONCAT(pj.jenjang," ",pj.jurusan) as prodi'))
					->join('politeknik_jurusan as pj','p.id','=','pj.id_politeknik')
					->where('pj.id',$value->program_studi)
					->first();
				}	
			}
			$this->data = ['pendaftar'=>$pendaftar,'poliwangi'=>$arr_poliwangi,'poltek_lain'=>$poltek_lain];
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

	public function verifikasi_pendaftar(Request $request,$id)
	{
		DB::enableQueryLog();

		$year = Carbon::now()->isoformat('Y');
		try {
			$pendaftar = DB::table('pendaftar');
			$data = $pendaftar->where('nomor',$id)->first();
			if ($data->status=="Y") {
				if ($request->program_studi==0) {
					$data_update = [
						'program_studi' => null,
						'program_studi_luar' => null,
						'status' => 'T'
					];
					$status = null;
					$delete = DB::table('mahasiswa')->where('id_pendaftar',$id)->delete();
				}else{
					if ($request->poltek=="poliwangi") {
						$data_update = [
							'program_studi' => $request->program_studi,
							'program_studi_luar' => null,
							'status' => 'Y'
						];
						$cek = DB::table('mahasiswa')->where('id_pendaftar',$id)->get();
						if (count($cek)>0) {
							DB::table('mahasiswa')->where('id_pendaftar',$id)->update(['program_studi'=>$request->program_studi]);
						}else{
							$arr = [
								'id_pendaftar' => $id,
								'nama' => $data->nama,
								'nik' => $data->nik,
								'nisn' => $data->nisn,
								'tmplahir' => $data->tempat_lahir,
								'tgllahir' => $data->tgllahir,
								'anak_ke' => $data->anak_ke,
								'jenis_kelamin' => $data->sex,
								'program_studi' => $request->program_studi,
								'jumlah_anak' => $data->jumlah_anak,
								'lulussmu' => $data->tahun_lulus_smu,
								'angkatan' => $year,
								'semester_masuk' => 1,
								'smu' => $data->smu,
								'alamat' => $data->alamat,
								'status' => "B",
								'jalur_daftar' => $data->jalur_daftar,
							];
							$insert = Mahasiswa::create($arr);
							LogMahasiswaStatus::dispatch([
								"mahasiswa" => $insert['nomor'],
								"status" => $insert['status'],
								"tahun" => $this->tahun_aktif,
								"semester" => $this->semester_aktif
							]);
						}
					}else{
						$data_update = [
							'program_studi' => null,
							'program_studi_luar' => $request->program_studi,
							'status' => 'Y'
						];
						$status = null;
						$delete = DB::table('mahasiswa')->where('id_pendaftar',$id)->delete();
					}
				}
			}else{
				if ($request->program_studi==0) {
					$data_update = [
						'status' => 'T'
					];
				} else {
					if ($request->poltek=="poliwangi") {
						$data_update = [
							'program_studi' => $request->program_studi,
							'status' => 'Y'
						];
					}else{
						$data_update = [
							'program_studi_luar' => $request->program_studi,
							'status' => 'Y'
						];
					}	
					$arr = [
						'id_pendaftar' => $id,
						'nama' => $data->nama,
						'nik' => $data->nik,
						'nisn' => $data->nisn,
						'tmplahir' => $data->tempat_lahir,
						'tgllahir' => $data->tgllahir,
						'anak_ke' => $data->anak_ke,
						'jenis_kelamin' => $data->sex,
						'program_studi' => $request->program_studi,
						'jumlah_anak' => $data->jumlah_anak,
						'lulussmu' => $data->tahun_lulus_smu,
						'angkatan' => $year,
						'semester_masuk' => 1,
						'smu' => $data->smu,
						'alamat' => $data->alamat,
						'status' => "B",
						'jalur_daftar' => $data->jalur_daftar,
					];
					
					
					$insert = Mahasiswa::create($arr);
					LogMahasiswaStatus::dispatch([
						"mahasiswa" => $insert['nomor'],
						"status" => $insert['status'],
						"tahun" => $this->tahun_aktif,
						"semester" => $this->semester_aktif
					]);
				}
			}
			$update = $pendaftar->where('nomor',$id)->update($data_update);

			
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
		
		$urutan = DB::table('pendaftar')->where('tahun_ajaran',date('Y'))->count()+1;
		if (strlen($urutan)==1) {
			$urutan = "0000".$urutan;
		}elseif (strlen($urutan)==2) {
			$urutan = "000".$urutan;
		}elseif (strlen($urutan)==3) {
			$urutan = "00".$urutan;
		}elseif (strlen($urutan)==4) {
			$urutan = "0".$urutan;
		}
		$nodaftar = "63".date('y').$request->jalur_daftar.$urutan;
		$password = Hash::make("63".date('y').$request->jalur_daftar.$urutan);

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
		$document->nodaftar = $nodaftar;
		$document->password = $password;
		
		if ($request->jalur_daftar == 1) {
			$document->trx_amount = \App\Models\SettingBiaya::where('nama', 'biaya-pendaftaran-smpbn')->first()->nilai;
		}else{
			$document->trx_amount = \App\Models\SettingBiaya::where('nama', 'biaya-pendaftaran-umpn')->first()->nilai;
		}		
		$document->tahun_ajaran = DB::table('periode')->select('tahun')->where('status', '1')->get()->first()->tahun;
		$document->save();

		if ($fotos = $request->file('foto')) {
			$update_data = [];
			$namafile = md5($document->nomor.'f0to').'.'.$fotos->getClientOriginalExtension();
			$update_data['foto'] = $namafile;
			$fotos->move(public_path() . '/pendaftar', $namafile);
			$check = Pendaftar::where('nomor', $document->nomor);
			$check->update($update_data);
		}

		for ($i=0; $i < $data['jml_seleksi'] ; $i++) { 
			$arr = [
				'id_pendaftar' => $document->nomor,
				'politeknik' => 1,
				'program_studi' => $data["program_studi_$i"],
				'urutan' => $i+1,
				'jenis' => 'poliwangi',
			];
			DB::table('jurusan_pilihan')->insert($arr);
		}
		if ($data['politeknik_lain']) {
			$arr = [
				'id_pendaftar' => $document->nomor,
				'politeknik' => $data['politeknik_lain'],
				'program_studi' => $data["program_studi_luar"],
				'urutan' => $i+1,
				'jenis' => 'poltek_lain',
			];
			DB::table('jurusan_pilihan')->insert($arr);
		}
		

		return response()->json([
			"status" => 'success',
			"data" => Crypt::encrypt($document->nomor),
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
			$id = $request->id ?? Crypt::decrypt($token);
			$arr_berkas = [ 'foto', 'ijasah', 'foto_peraturan', 'rapor_smtr1', 'rapor_smtr2', 'rapor_smtr3', 'rapor_smtr4', 'rapor_smtr5', 'rapor_smtr6' ];
			if (isset($request->berkas)) {
				$document = Pendaftar::select($arr_berkas)->where('nomor', $id)->get()->first();
			} else {
				$document = Pendaftar::where('nomor', $id)->get()->first();
			}
			unset($document->nodaftar, $document->nomor, $document->password);
			foreach ($arr_berkas as $v) {
				$berkas = $document->$v;
				if ( !$berkas || !file_exists(public_path('pendaftar/'.$berkas)) ) {
					$document->$v = null;
				}
			}
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
		$id = $request->id ?? Crypt::decrypt($token);
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
			// $check = Pendaftar::where('nomor', $document->nomor);
			// $check->update($update_data);
		}
		if ($foto_peraturan = $request->file('foto_peraturan')) {
			$namafile = md5($id.'f0to_p3raturan').'.'.$foto_peraturan->getClientOriginalExtension();
			$update_data['foto_peraturan'] = $namafile;
			$foto_peraturan->move(public_path() . '/pendaftar', $namafile);
			// $check = Pendaftar::where('nomor', $document->nomor);
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

	public function update_berkas(Request $request)
	{
		try {
			$validator = Validator::make($request->all(), [
				'nama' => 'required',
				'file' => 'nullable|mimes:jpg,jpeg,png|max:2048'
			]);

			if ($validator->fails()) {
				$error = $validator->errors()->all()[0];
				return response()->json([
					'status' => 'failed',
					'message' => $error,
					'data' => []
				]);
			} else {
				$token = $request->header('token');
				$id = $request->id ?? Crypt::decrypt($token);

				$pendaftar = Pendaftar::where('nomor', $id);
				$files = $request->file('file');
				if ($files && $request->file->isValid()) {
					$nama_field = $request->nama;
					$file_db = $pendaftar->first()->$nama_field;
					$file_lama = $file_db ? public_path('pendaftar/'.$file_db) : null;
					if ($file_lama && file_exists($file_lama)) unlink($file_lama);
					$file_name = 'f0t0_pdftr_'.$request->nama.'_'.\App\Helpers\CoreHelper::base64url_encode($id).'_'.time().'.'.$files->getClientOriginalExtension();
					$files->move(public_path('pendaftar'), $file_name);
					$pendaftar->update([
						$request->nama => $file_name
					]);
				}
				return response()->json([
					'status' => 'success',
					'data' => [$request->nama => 'uploaded'],
					'messagge' => 'berkas berhasil di update'
				]);
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

	public function keuangan(Request $request)
	{
		try {
			$data = $request->all();
			$obj = new \App\Datatables\PendaftarKeuanganDatatable();
			$lists = $obj->get_datatables();
			$data = [];
			$no = $request->input("start");
			foreach ($lists as $list) {
				$no++;
				$row = [];
				$row[] = $no;
				$row[] = $list->nomor_va;
				$row[] = $list->nama;
				$row[] = $list->trx_amount;
				$row[] = $list->is_lunas;
				$row[] = $list->nomor;
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
			->select('m.nomor','m.nrp','m.nama','m.tgllahir','m.notelp','m.email','m.program_studi','m.ukt_kelompok',DB::raw('CONCAT(p.program," ",ps.program_studi) as prodi'))
			->join('kelas as k','m.kelas','=','k.nomor','left')
			->join('program_studi as ps','ps.nomor','=','m.program_studi')
			->join('program as p','p.nomor','=','ps.program')
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

	public function get_prodi_nim(Request $request)
	{
		$year_now = Carbon::now()->isoformat('Y');

		try {
			$table = DB::table('program_studi as ps')
				->select(
					'ps.nomor',
					DB::raw('CONCAT(p.program," ",ps.program_studi) as prodi'),
					'ps.kode_epsbed',
					DB::raw('(select count(*) from mahasiswa where program_studi = ps.nomor and angkatan='.$year_now.') as jml_pendaftar'))
				->join('program as p','p.nomor','=','ps.program')
				->orderBy(DB::raw('(select count(*) from pendaftar where program_studi = ps.nomor)'),"desc")
				->get();
			$this->data = $table;
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

	public function generate_nim(Request $request)
	{
		try {
			$year_now = Carbon::now()->isoformat('Y');
			$sk_poltek = '36';
			$year = Carbon::now()->isoformat('YY');
			$kode_prodi = DB::table('program_studi')->where('nomor',$request->program_studi)->first()->kode_epsbed;
			$list_pendaftar = DB::table('mahasiswa')
									->where('program_studi',$request->program_studi)
									->where('angkatan',$year_now)
									->get();

			$i = 1;
			foreach ($list_pendaftar as $key => $value) {
				if (strlen($i)==1) {
					$urutan_mhs = "000".$i;
				}elseif (strlen($i)==2) {
					$urutan_mhs = "00".$i;
				}elseif (strlen($i)==3) {
					$urutan_mhs = "0".$i;
				}else{
					$urutan_mhs = $i;
				}
				$nim = $sk_poltek.$year.$kode_prodi.$urutan_mhs;
				$i++;
				$update = DB::table('mahasiswa')->where('nomor',$value->nomor)->update(['nrp'=>$nim,'status'=>"A"]);
				if ($update) {
					$i++;
				}
			}
			$this->data = $i;
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
	public function list_generate_nim(Request $request)
	{
		try {
			$year_now = Carbon::now()->isoformat('Y');
			$list_pendaftar = DB::table('mahasiswa')
									->where('program_studi',$request->program_studi)
									->where('angkatan',$year_now)
									->get();

			$this->data = $list_pendaftar;
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