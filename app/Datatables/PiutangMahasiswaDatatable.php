<?php

namespace App\Datatables;

use App\Lib\Datatable;
use DB;

class PiutangMahasiswaDatatable extends Datatable
{
	public $timestamps = false;
	protected $table = 'keuangan_piutang';
	protected $primaryKey = 'id';
	protected $table_datatables = 'keuangan_piutang';
	protected $select = array('keuangan_piutang.id', 'keuangan_piutang.id_mahasiswa', 'keuangan_piutang.path_perjanjian', 'mahasiswa.nrp as nim', 'mahasiswa.nama', 'mahasiswa.ukt', 'CASE WHEN jenis = "spi" THEN total ELSE 0 END as SPI', 'SUM(CASE WHEN id_mahasiswa = id_mahasiswa THEN `keuangan_piutang`.total END) as jumlah', 'keuangan_piutang.status as status_piutang');
	protected $column_order = array(null, 'mahasiswa.nrp', 'mahasiswa.nama', 'mahasiswa.ukt', 'total', 'keuangan_piutang.total', 'keuangan_piutang.status', null);
	protected $column_search = array('mahasiswa.nrp', 'mahasiswa.nama', 'mahasiswa.ukt', 'total', 'keuangan_piutang.total', 'keuangan_piutang.status');
	protected $order = array('id' => 'asc');

	function __construct(){
		$periode = DB::table('periode')->select('tahun', 'semester')->orderByDesc('status')->orderByDesc('tahun')->first();
		$this->where = [['tahun', '=', $periode->tahun], ['keuangan_piutang.semester', '=', $periode->semester]];
		parent::__construct();
	}
	
	public function extra_datatables()
	{
		$this->dt->join('mahasiswa', 'mahasiswa.nomor', '=', 'keuangan_piutang.id_mahasiswa')->groupBy('keuangan_piutang.id_mahasiswa')->where($this->where);
		$this->dtc->join('mahasiswa', 'mahasiswa.nomor', '=', 'keuangan_piutang.id_mahasiswa')->groupBy('keuangan_piutang.id_mahasiswa')->where($this->where);
	}
}