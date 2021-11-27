<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ukt;
use Illuminate\Support\Facades\DB;
use App\Models\Prodi;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Validator;

class UktController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */

	protected $status = null;
	protected $error = null;
	protected $data = null;

	public function index()
	{
		$list = Prodi::pluck('nomor');
		$year = Carbon::now()->format('Y');
		$arr = $list->toArray();
		foreach ($list as $key=>$value) {
			$data = Ukt::where([['program_studi', '=',$list[$key]],
								['tahun', $year]])
			->first();
			if ($data == null) {
				$created = Ukt::insert([
					['program_studi' => $arr[$key], "tahun" => $year] 
				]);
				$this->status = "Data not found, creating entry.";
			}  else {
				$this->status = "Data found, skipping entry.";
			}
		}
		$this->data = Ukt::select(
			'tarif_kelompok.*',
			DB::raw("CONCAT(program.program, ' ', program_studi.program_studi) AS prodi"))
		->join('program_studi', 'tarif_kelompok.program_studi', '=', 'program_studi.nomor')
		->join('program', 'program_studi.program', '=', 'program.nomor')
		->get();

		$this->status = "success";

		return response()->json([
			"status" => $this->status,
			"data" => $this->data,
			"error" => $this->error,
		]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		//
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
		$validated = Validator::make($data, [
			'program_studi' => 'required'
		]);

		if ($validated->fails()) {
			$this->status = 'error';
			$this->error = $validated->errors();
		} else {
			$data = Ukt::create($data);
			$this->data = $data;
			$this->status = "success";
		}
		return response()->json([
			'status' => $this->status,
			'data' => $this->data,
			'error' => $this->error
		]);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		$this->data = Ukt::select(
			'tarif_kelompok.*',
			DB::raw("CONCAT(program.program, ' ', program_studi.program_studi) AS prodi")
		)
		->join('program_studi', 'tarif_kelompok.program_studi', '=', 'program_studi.nomor')
		->join('program', 'program_studi.program', '=', 'program.nomor')
		->where('tarif_kelompok.id', $id)
		->get();

		$this->status = "success";
		
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
	public function update(Request $request, $id)
	{
		$check = Ukt::where('id', $id);
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
			$check->update($data);
			$this->data = $check->get();
			$this->status = "success";
		}

		return response()->json([
			'status' => $this->status,
			'data' => $this->data,
			'error' => $this->error
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
		$check = Ukt::where('id', $id);

		if ($check) {
			$this->status = "success";
			$this->data = $check->get();
			$check->delete();
		} else {
			$this->status = "failed";
		}

		return response()->json([
			'status' => $this->status,
			'data' => $this->data,
			'error' => $this->error
		]);
	}

	public function details(Request $request)
	{
		$query = $request->query();
		$ukt = new Ukt();
		if (isset($query['program_studi'])) {
			$ukt = $ukt->where('program_studi', $query['program_studi']);
			$this->status = "success";
		}
		if (isset($query['jalur_seleksi'])) {
			$ukt = $ukt->where('jalur_seleksi', $query['jalur_seleksi']);
            $this->status = "success";
		}
		$this->data = $ukt->get();
		
		return response()->json([
			"status" => $this->status,
			"data" => $this->data,
			"error" => $this->error
		]);
	}

	public function set_ukt_mahasiswa(Request $request,$id_mahasiswa)
	{

		try {
			$kelompok_ukt = $request->kelompok_ukt;
			$ukt = $request->ukt;

			$this->data = DB::table('mahasiswa')->where('nomor',$id_mahasiswa)->update(['ukt_kelompok'=>$kelompok_ukt,'ukt'=>$ukt]);
            $this->status = "success";
        } catch (QueryException $e) {
            $this->status = "failed";
            $this->error = $e;
        }
		return response()->json([
			'status' => $this->status,
			'data' => $this->data,
			'error' => $this->error
		]);
	}

    public function atur_mahasiswa(Request $request)
    {
        try {
        	DB::enableQueryLog();
			$data = $request->all();
	        $where = [];
	        if ( $request->program_studi ) {
	            array_push($where,['m.program_studi','=',$request->program_studi]);
	        }
			if ( $request->angkatan ) {
				array_push($where,['m.angkatan','=',$request->angkatan]);
			}
			if ( $request->kelas ) {
				array_push($where,['m.kelas','=',$request->kelas]);
			}
			array_push($where,['m.status','=',$request->status]);

			$obj = new \App\Datatables\MahasiswaUktDatatable($where);
			$lists = $obj->get_datatables();
			$data = [];
			$no = $request->input("start");
			foreach ($lists as $list) {
				$no++;
				$row = [];
				$row[] = $no;
				$row[] = $list->nrp;
				$row[] = $list->nama;
				$row[] = $list->ukt;
				$row[] = $list->notelp;
				$row[] = $list->email;
				$row[] = '<span id="btn_'.$list->nomor.'" style="cursor:pointer" onclick="func_modal(\''.$list->program_studi.'\',\''.$list->nomor.'\',\''.$list->nrp.'\',\''.$list->nama.'\',\''.$list->prodi.'\',\''.$list->ukt_kelompok.'\')" data-id="'.$list->nomor.'" class="badge btn-info_transparent text-primary">
					<i class="iconify-inline" data-icon="ant-design:setting-outlined"></i>
					<span class="text-capitalize text-primary">Setting</span>
				</span>
				<span id="rangkuman_'.$list->nomor.'" style="cursor:pointer" onclick="rangkuman_modal(\''.$list->nomor.'\',\''.$list->nrp.'\',\''.$list->nama.'\',\''.$list->prodi.'\')" data-id="'.$list->nomor.'" class="badge btn-info_transparent text-primary">
					<i class="iconify-inline" data-icon="ant-design:eye-outlined"></i>
					<span class="text-capitalize text-primary">Rangkuman</span>
				</span>';
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

    public function rangkuman($id_mahasiswa)
    {
    	$this->data = DB::table('keuangan_pembayaran AS kpb')->select(
    		DB::raw('IFNULL(kpb.semester, (SELECT hitung_semester(CONCAT(kp.tahun, kp.semester), (SELECT YEAR(tglmasuk) FROM mahasiswa WHERE nomor = kpb.id_mahasiswa)))) semester'),
    		DB::raw('SUM(kpb.nominal) nominal'),
    		DB::raw('MAX(kpb.created_at) created_at')
    	)->leftJoin('keuangan_piutang AS kp', 'kp.id', '=', 'kpb.id_piutang')->where('kpb.id_mahasiswa', $id_mahasiswa)->where('kpb.status', '!=', null)->groupBy('kpb.semester')->orderByDesc('kpb.id')->get();
    	return response()->json([
            "status" => 'success',
            "data" => $this->data,
            "error" => $this->error
        ]);
    }
}
