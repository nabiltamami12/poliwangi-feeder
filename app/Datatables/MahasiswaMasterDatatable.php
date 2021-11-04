<?php

namespace App\Datatables;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Lib\Datatable;
use DB;

class MahasiswaMasterDatatable extends Datatable
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'mahasiswa';
    protected $primaryKey = 'nomor';

    // datatable
    protected $table_datatables = 'mahasiswa as m';
    protected $select = array('m.nomor','m.nrp','m.nama','DATE_FORMAT(m.tgllahir, "%Y-%m-%d") as tgllahir','m.notelp','m.email');
    protected $column_order = array('m.nomor','m.nrp','m.nama', 'm.tgllahir','m.notelp','m.email', null);
    protected $column_search = array('m.nrp','m.nama','m.tgllahir','m.notelp','m.email');
    protected $order = array('m.nomor' => 'desc');

    function __construct($where = []){
        $this->where = $where;
        parent::__construct();
    }
    public function extra_datatables()
    {
        $this->dt->where($this->where);

        $this->dtc->where($this->where);
    }
    // end datatable
}