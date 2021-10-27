<?php

namespace App\Models\Datatables;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Lib\Datatable;

class MahasiswaDatatable extends Datatable
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'mahasiswa';
    protected $primaryKey = 'nomor';

    // datatable
    protected $table_datatables = 'mahasiswa as m';
    protected $select = array('m.nomor','m.nrp','m.nama','m.tgllahir','m.notelp','m.email');
    protected $column_order = array('m.nomor','m.nrp','m.nama','m.tgllahir','m.notelp','m.email', null);
    protected $column_search = array('m.nrp','m.nama','m.tgllahir','m.notelp','m.email');
    protected $order = array('m.nomor' => 'desc');

    function __construct($where = []){
        $this->where = $where;
        parent::__construct();
    }
    public function extra_datatables()
    {
        $this->dt->join('kelas_old as k','m.kelas','=','k.nomor','left')
            ->join('program_old as p','k.program','=','p.nomor','left')
            ->join('jurusan_old as j','k.jurusan','=','j.nomor')
            ->where($this->where);

        $this->dtc->join('kelas_old as k','m.kelas','=','k.nomor','left')
            ->join('jurusan_old as j','k.jurusan','=','j.nomor')
            ->where($this->where);
    }
    // end datatable
}