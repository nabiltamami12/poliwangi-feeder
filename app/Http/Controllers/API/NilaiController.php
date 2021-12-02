<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Carbon;
use App\Http\Requests\ImportNilai;
use Illuminate\Database\QueryException;
use DB;
use App\Models\Nilai;
use App\Models\RangeNilai;
use App\Models\PersentaseNilai;
use App\Models\Mahasiswa;

class NilaiController extends Controller
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
		//
		$set_tahun = $request->get('tahun') ?? $this->tahun_aktif;
		try {
			$rangenilai = RangeNilai::last_version();
			$persentase_nilai = PersentaseNilai::select('*','id as id_persentase')->where('matakuliah',$request->matakuliah)->first();

			$input = DB::table("mahasiswa as m")
			->select(
				"m.nomor as id_mahasiswa",
				"m.nama",
				"m.nrp as nim",
				"kl.nomor as id_kuliah",
					// "n.*"
			)
			->join("kuliah as kl", "kl.kelas", "=", "m.kelas")
				// ->join("nilai as n", "n.kuliah", "=", "kl.nomor",'left')
			->where('kl.tahun', $set_tahun)
			->where('kl.kelas', $request->kelas)
			->where('kl.matakuliah', $request->matakuliah)
			->get();

			$data=[];
			foreach ($input as $key => $value) {
				$nilai = DB::table('nilai')->where([
					'kuliah' => $value->id_kuliah,
					'mahasiswa' => $value->id_mahasiswa,
				])->first();
				$arr = [
					'id_kuliah' => $value->id_kuliah,
					'id_mahasiswa' => $value->id_mahasiswa,
					'is_published' => $nilai->is_published ?? null,
					'publisher' => $nilai->publisher ?? null,
					'tgl_publish' => $nilai->tgl_publish ?? null,
					'nim' => $value->nim,
					'nama' => $value->nama,
					'nomor' => (!$nilai || !$nilai->nomor) ? 0 : $nilai->nomor,
					'quis1' => (!$nilai || !$nilai->quis1) ? 0 : $nilai->quis1,
					'quis2' => (!$nilai || !$nilai->quis2) ? 0 : $nilai->quis2,
					'tugas' => (!$nilai || !$nilai->tugas) ? 0 : $nilai->tugas,
					'ujian' => (!$nilai || !$nilai->ujian) ? 0 : $nilai->ujian,
					'na' => (!$nilai || !$nilai->na) ? 0 : $nilai->na,
					'her' => (!$nilai || !$nilai->her) ? 0 : $nilai->her,
					'nh' => (!$nilai || !$nilai->nh) ? "" : $nilai->nh,
					'keterangan' => (!$nilai || !$nilai->keterangan) ? "" : $nilai->keterangan,
					'nhu' => (!$nilai || !$nilai->nhu) ? "" : $nilai->nhu,
					'nsp' => (!$nilai || !$nilai->nsp) ? 0 : $nilai->nsp,
					'kuis' => (!$nilai || !$nilai->kuis) ? 0 : $nilai->kuis,
					'praktikum' => (!$nilai || !$nilai->praktikum) ? 0 : $nilai->praktikum,
				];
				array_push($data,$arr);
			}
			$this->data = ['persentase_nilai'=>$persentase_nilai,'range_nilai'=> $rangenilai,'data'=>$data];
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
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function rekap(Request $request)
	{
		try {
			$set_tahun = $request->get('tahun') ?? $this->tahun_aktif;
			$set_semester = $request->get('semester') ?? $this->semester_aktif;
			$data = [];
			if ($request->nomor) {
				$res = Nilai::
					with([
						'rKuliah' => function($query) {
							$query->with('rKelas:nomor,kode')
								->with('rMatkul:nomor,matakuliah,kode,sks')
						        ->select('nomor', 'kelas', 'matakuliah');
						},
					])
					->select('nomor', 'kuliah', 'mahasiswa', 'na', 'nh')
					->where('mahasiswa', '=', $request->nomor)
					->whereRelation('rKuliah', 'semester', '=', $set_semester)
					->whereRelation('rKuliah', 'tahun', '=', $set_tahun)
					->get();
				foreach ($res as $key => $value) {
					$data[] = [
						"nomor" => $value->nomor,
						"kode_matakuliah" => $value->rKuliah->rMatkul->kode,
						"kelas" => $value->rKuliah->rKelas->kode,
						"matakuliah" => $value->rKuliah->rMatkul->matakuliah,
						"na" => $value->na,
						"sks" => $value->rKuliah->rMatkul->sks,
						"nh" => $value->nh,
						"up" => $value->up
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

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		try {
			$data = $request->data;
			$result = [];
			foreach ($data as $d) {
				if ($d['nomor']==0) {
					$result[] = Nilai::create($d);
				}else{
					$query = Nilai::where('nomor',$d['nomor']);
					$nilai = $query->update($d);
					$result[] = $query->get();
				}
			}
			$this->data = $result;
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
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($tahun, $mk, $kls, $prodi)
	{
		try {
			$input = DB::table("nilai")
			->select(
				"matakuliah.matakuliah",
				"mahasiswa.nama",
				"kuliah.tahun",
				"kelas.kode",
				"nilai.nomor",
				"nilai.kuliah",
				"nilai.mahasiswa",
				"nilai.quis1",
				"nilai.quis2",
				"nilai.tugas",
				"nilai.ujian",
				"nilai.na",
				"nilai.her",
				"nilai.nh",
				"nilai.keterangan",
				"nilai.nhu",
				"nilai.nsp",
				"nilai.kuis",
				"nilai.praktikum"

			)
			->join("mahasiswa", "mahasiswa.nomor", "=", "nilai.mahasiswa")
			->join("kuliah", "kuliah.nomor", "=", "nilai.kuliah")
			->join("kelas", "kelas.nomor", "=", "mahasiswa.kelas")
			->join("matakuliah", "matakuliah.nomor", "=", "kuliah.matakuliah")
			->where('kuliah.tahun', $tahun)
			->where('kuliah.matakuliah', $mk)
			->where('mahasiswa.kelas', $kls)
			->where('matakuliah.program', $prodi)
			->get();
			$this->data = $input;
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
	public function publish(Request $request)
	{
		
		$data = $request->data;
		date_default_timezone_set('Asia/Jakarta');
		Carbon::setLocale('id');

		$date_now = Carbon::now();
		try {
			$result = [];
			foreach ($data as $d) {
				$d['tgl_publish'] = $date_now->toDateTimeString();
				$query = Nilai::where('nomor',$d['nomor']);
				$nilai = $query->update($d);
				$result[] = $query->get();
			}
			$this->data = $result;
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
			$check = Nilai::where('nomor', $id);

			if ($check) {
				$this->status = "success";
				$this->data = $check->get();
				$check->delete();
			} else {
				$this->status = "failed";
				$this->error = "data tidak ada";
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

	public function get_nim(Request $req)
	{
		try {
			$nomor_nilai = $req->nomor_nilai;
			$obj = Nilai::find($nomor_nilai);
			$prodi = null;
			$kelas = null;
			$matakuliah = null;
			$nilai = [];
			$persentase_nilai = null;
			$range = [];
			if ($obj) {
				$range = RangeNilai::last_version();
				$persentase_nilai = PersentaseNilai::where('matakuliah', '=', $obj->rKuliah->matakuliah)
				->orderBy('updated_at', 'desc')
				->first();

				$prodi = $obj->rMahasiswa->rProdi;
				$prodi = $prodi->rProgram->program.' '.$prodi->program_studi;

				$kelas = $obj->rKuliah->rKelas->kode;
				$matakuliah = $obj->rKuliah->rMatkul->matakuliah;
				
				$nilai[] = [
					'nim' => $obj->rMahasiswa->nrp,
					'nama' => $obj->rMahasiswa->nama,
					'nomor' => $obj->nomor,
					'id_kuliah' => $obj->kuliah,
					'id_mahasiswa' => $obj->mahasiswa,
					'quis1' => $obj->quis1 ?? '',
					'quis2' => $obj->quis2 ?? '',
					'tugas' => $obj->tugas ?? '',
					'ujian' => $obj->ujian ?? '',
					'na' => $obj->na ?? '',
					'her' => $obj->her ?? '',
					'nh' => $obj->nh ?? '',
					'keterangan' => $obj->keterangan ?? '',
					'nhu' => $obj->nhu ?? '',
					'nsp' => $obj->nsp ?? '',
					'kuis' => $obj->kuis ?? '',
					'praktikum' => $obj->praktikum ?? '',
					'up' => $obj->up ?? ''
				];
			}

			$this->status = "success";
			$this->data = [
				"program_studi" => $prodi,
				"kelas" => $kelas,
				"matakuliah" => $matakuliah,
				"nilai" => $nilai,
				"persentase" => $persentase_nilai,
				"range" => $range
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
