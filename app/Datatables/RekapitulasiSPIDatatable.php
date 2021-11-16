<?php

namespace App\Datatables;

use App\Lib\Datatable;
use DB;

class RekapitulasiSPIDatatable extends Datatable
{
	public $timestamps = false;
	protected $table = 'spi';
	protected $primaryKey = 'id';
	protected $table_datatables = 'spi';
	protected $select = array('mahasiswa.nama', 'mahasiswa.nrp', 'spi.id', 'spi.tarif', 'spi.id_mahasiswa', 'spi.tanggal_pembayaran', 'SUM(spi.pembayaran) as nom_pembayaran', 'spi.tarif - SUM(spi.pembayaran) as piutang');
	protected $column_order = array(null, 'mahasiswa.nrp', 'mahasiswa.nama', 'spi.tanggal_pembayaran', 'spi.tarif', 'spi.pembayaran', 'spi.tarif', null);
	protected $column_search = array('mahasiswa.nama', 'mahasiswa.nrp', 'spi.tarif', 'spi.tanggal_pembayaran');
	protected $order = array('id' => 'asc');

	function __construct(){
		parent::__construct();
	}
	
	public function extra_datatables()
	{
		$this->dt->join('mahasiswa', 'mahasiswa.nomor', '=', 'spi.id_mahasiswa')->groupBy('spi.id_mahasiswa');
		$this->dtc->join('mahasiswa', 'mahasiswa.nomor', '=', 'spi.id_mahasiswa')->groupBy('spi.id_mahasiswa');
	}
}