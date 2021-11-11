<?php

namespace App\Datatables;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Lib\Datatable;

class MahasiswaUktDatatable extends Datatable
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'mahasiswa';
    protected $primaryKey = 'nomor';

    // datatable
    protected $table_datatables = 'mahasiswa as m';
    protected $select = array('m.nomor','m.nrp','m.nama','m.ukt','m.notelp','m.email','m.program_studi','m.ukt_kelompok','CONCAT(p.program," ",ps.program_studi) as prodi');
    protected $column_order = array('m.nomor','m.nrp','m.nama','m.ukt','m.notelp','m.email', null);
    protected $column_search = array('m.nrp','m.nama','m.ukt','m.notelp','m.email');
    protected $order = array('m.nomor' => 'desc');

    function __construct($where = []){
        $this->where = $where;
        parent::__construct();
    }
    public function extra_datatables()
    {
        $this->dt->join('program_studi as ps','m.program_studi','=','ps.nomor','left')
            ->join('program as p','ps.program','=','p.nomor','left')
            ->where($this->where);

        $this->dtc->where($this->where);
    }
    // end datatable
}