<?php

namespace App\Datatables;

use App\Lib\Datatable;
use DB;

class PendaftarDatatable extends Datatable
{
	public $timestamps = false;
	protected $table = 'pendaftar';
	protected $primaryKey = 'nomor';
	protected $table_datatables = 'pendaftar';
	protected $select = array('nomor_va', 'trx_amount', 'nama', 'is_lunas', 'nomor');
	protected $column_order = array('nomor_va', 'trx_amount', 'nama', 'is_lunas', 'nomor');
	protected $column_search = array('nomor_va', 'trx_amount', 'nama', 'nomor');
	protected $order = array('is_lunas' => 'desc');

	function __construct(){
		$tahun_aktif = DB::table('periode')->select('tahun')->where('status', '1')->get()->first()->tahun;
		$this->where = [['tahun_ajaran', '=', $tahun_aktif]];
		parent::__construct();
	}
	
	public function extra_datatables()
	{
		$this->dt->where($this->where);
		$this->dtc->where($this->where);
	}
}