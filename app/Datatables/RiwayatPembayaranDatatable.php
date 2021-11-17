<?php

namespace App\Datatables;

use App\Lib\Datatable;
use DB;

class RiwayatPembayaranDatatable extends Datatable
{
	public $timestamps = false;
	protected $table = 'v_riwayat_pembayaran';
	protected $primaryKey = 'id';
	protected $table_datatables = 'v_riwayat_pembayaran';
	protected $select = array('updated_at', 'nrp', 'nama', 'nominal', 'kategori', 'keterangan', 'semester');
	protected $column_order = array('updated_at', 'nrp', 'nama', 'nominal', 'kategori', 'keterangan');
	protected $column_search = array('updated_at', 'nrp', 'nama', 'nominal', 'kategori', 'keterangan');
	protected $order = array('updated_at' => 'desc');

	function __construct(){
		parent::__construct();
	}
}