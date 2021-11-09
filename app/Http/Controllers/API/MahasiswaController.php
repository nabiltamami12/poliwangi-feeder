<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Mahasiswa;
use App\Datatables\MahasiswaDatatable;
use App\Models\Nilai;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;
use BNI;
use App\Events\LogMahasiswaStatus;
use Maatwebsite\Excel\Facades\Excel;

/** --Status Mahasiswa--
 * "A" = Aktif - temporary
 * "B" = Mahasiswa Baru - temporary
 * "C" = Cuti - permanent
 * "D" = DO - permanent
 * "H" = Punya SPTH - temporary
 * "K" = Mengundurkan Diri - permanent
 * "L" = Lulus - permanent
 * "M" = Meninggal - permanent
 * "P" = Pendaftar - temporary
 * "R" = Tugas Akhir - temporary
 * "T" = Tanpa Keterangan - temporary
*/
class MahasiswaController extends Controller
{

	protected $status = null;
	protected $error = null;
	protected $data = null;
	public function index(Request $request)
	{
		$where = [
			['m.status','=','A']
		];
		if ( $request->program_studi != null && $request->program_studi ) {
			array_push($where,['m.program_studi','=',$request->program_studi]);
		}
		if ($request->kelas) {
			array_push($where,['m.kelas','=',$request->kelas]);	
		}

		try {
			$obj = new \App\Datatables\MahasiswaMasterDatatable($where);
			$lists = $obj->get_datatables();
			$data = [];
			$no = $request->input("start");
			foreach ($lists as $list) {
				$no++;
				$row = [];
				$row[] = $no;
				$row[] = $list->nrp;
				$row[] = $list->nama;
				$row[] = $list->tgllahir;
				$row[] = $list->notelp;
				$row[] = $list->email;

				$btn_update = '<span class="iconify edit-icon text-primary" onclick="update_btn('.$list->nomor.')" data-icon="bx:bx-edit-alt" ></span>';
				$btn_delete = '<span class="iconify delete-icon text-primary" data-icon="bx:bx-trash"  onclick="delete_btn('.$list->nomor.',"mahasiswa","mahasiswa",\''.$list->nama.'\')"></span>';
				$row[] = $btn_update.$btn_delete;
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

	public function index_lama(Request $request)
	{
		try {
			DB::enableQueryLog();
			$data = $request->all();
			$where = [];
			if ( isset($request->program) && $request->program ) {
				array_push($where,['ps.program','=',$request->program]);
			}
			if ( isset($request->jurusan) && $request->jurusan ) {
				array_push($where,['ps.jurusan','=',$request->jurusan]);
			}
			if ( isset($request->angkatan) && $request->angkatan ) {
				array_push($where,['m.angkatan','=',$request->angkatan]);
			}
			array_push($where,['m.status','=',$request->status]);

			$obj = new MahasiswaDatatable($where);
			$lists = $obj->get_datatables();
			$data = [];
			$no = $request->input("start");
			foreach ($lists as $list) {
				$no++;
				$row = [];
				$row[] = $no;
				$row[] = $list->nrp;
				$row[] = $list->nama;
				$row[] = $list->tgllahir;
				$row[] = $list->notelp;
				$row[] = $list->email;
				$row[] = '<span class="iconify edit-icon text-primary" onclick="update_btn('.$list->nomor.')" data-icon="bx:bx-edit-alt" ></span> <span class="iconify delete-icon text-primary" data-icon="bx:bx-trash"  onclick="delete_btn('.$list->nomor.',\'mahasiswa\',\'mahasiswa\',\''.$list->nama.'\')"></span>';
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

	// select `m`.`nomor`, `m`.`nrp`, `m`.`nama`, `m`.`tgllahir`, `m`.`notelp`, `m`.`email` 
	// from `mahasiswa` as `m` 
	// left join `kelas_old` as `k` on `m`.`kelas` = `k`.`nomor` 
	// left join `program_old` as `p` on `k`.`program` = `p`.`nomor` 
	// inner join `jurusan_old` as `j` on `k`.`jurusan` = `j`.`nomor` 
	// where (`k`.`program` = ? and `k`.`jurusan` = ? and `m`.`kelas` is null and `m`.`status` = ? and `m`.`program_studi` = ?)"

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
				$data = Mahasiswa::create($data);
				LogMahasiswaStatus::dispatch([
					"mahasiswa" => $data['nomor'],
					"status" => $data['status'],
					"tahun" => $this->tahun_aktif,
					"semester" => $this->semester_aktif
				]);
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
			$data = Mahasiswa::where("nomor", $id)->get();
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
		$check = Mahasiswa::where('nomor', $id);
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
				LogMahasiswaStatus::dispatch([
					"mahasiswa" => $this->data[0]->nomor,
					"status" => $this->data[0]->status,
					"tahun" => $this->tahun_aktif,
					"semester" => $this->semester_aktif
				]);
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
			$check = Mahasiswa::where('NOMOR', $id);

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

	public function by_nim($nim)
	{
		try {
			$data = Mahasiswa::where("nrp", $nim)->first();
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

	public function select_option(Request $req)
	{
		try {
			$q = $req->input('q');
			$page = $req->input('page') ?? 1;
			$limit = 15;
			$offset = ($page - 1) * $limit;
			$obj = Mahasiswa::select(DB::raw('nomor as id, CONCAT( nrp," (",nama,")" ) as text'))
			->where('nrp', 'like', '%'.$q.'%')
			->offset($offset)
			->limit($limit)
			->get();
			$obj_count = Mahasiswa::where('nrp', 'like', '%'.$q.'%')->count();
			$this->data = array('items' => $obj, 'total_count' => $obj_count);
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

	public function mahasiswa_angkatan(Request $req)
	{
		try {
			$where = [];
			if ($req->status) {
				$where[] = ['mahasiswa.status', '=', $req->status];
			}
			if ($req->program) {
				$where[] = ['ps.program', '=', $req->program];
			}
			if ($req->jurusan) {
				$where[] = ['ps.jurusan', '=', $req->jurusan];
			}
			if ($req->program_studi) {
				$where[] = ['mahasiswa.program_studi', '=', $req->program_studi];
			}

			$this->data = Mahasiswa::select('mahasiswa.angkatan')
				->leftJoin('program_studi as ps', 'mahasiswa.program_studi', '=', 'ps.nomor')
				->where($where)
				->groupBy('mahasiswa.angkatan')
				->get();
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

	public function mahasiswa_kelas(Request $req)
	{
		try {
			$where = [];
			if ($req->status) {
				$where[] = ['mahasiswa.status', '=', $req->status];
			}
			if ($req->program_studi) {
				$where[] = ['mahasiswa.program_studi', '=', $req->program_studi];
			}
			if ($req->angkatan) {
				$where[] = ['mahasiswa.angkatan', '=', $req->angkatan];
			}

			$this->data = Mahasiswa::select('mahasiswa.kelas', 'k.kode')
				->leftJoin('kelas as k', 'mahasiswa.kelas', '=', 'k.nomor')
				->where($where)
				->groupBy('mahasiswa.kelas')
				->get();
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

	public function mahasiswa_export(Request $request)
	{
		ini_set('memory_limit', '-1');
    ini_set('max_execution_time', '-1');
    $where = [];
    if ( $request->program ) {
			array_push($where,['ps.program','=',$request->program]);
		}
		if ( $request->jurusan ) {
			array_push($where,['ps.jurusan','=',$request->jurusan]);
		}
		if ( $request->angkatan ) {
			array_push($where,['mahasiswa.angkatan','=',$request->angkatan]);
		}
		array_push($where,['mahasiswa.status','=',$request->status]);

    return Excel::download(new \App\Exports\MahasiswaExport($where), 'Rekap Mahasiswa.xlsx');
	}
}