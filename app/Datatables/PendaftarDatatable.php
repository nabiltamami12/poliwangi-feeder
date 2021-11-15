<?php

namespace App\Datatables;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Lib\Datatable;

class PendaftarDatatable extends Datatable
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'pendaftar';
    protected $primaryKey = 'nomor';

    // datatable
    protected $table_datatables = 'pendaftar as p';
    protected $select = array('p.nomor','p.nodaftar', 'p.nama', 'jp.jalur_daftar as jalur_penerimaan', 'p.status');
    protected $column_order = array('p.nomor','p.nodaftar', 'p.nama', 'jp.jalur_daftar', 'p.status', null);
    protected $column_search = array('p.nodaftar', 'p.nama', 'jp.jalur_daftar');
    protected $order = array('p.nomor' => 'desc');
    function __construct($where = []){
        $this->where = $where;
        parent::__construct();
    }
    public function extra_datatables()
    {
        $this->dt->leftJoin('jalur_penerimaan as jp','jp.id','=','p.jalur_daftar')
            ->whereNotNull('jp.jalur_daftar')
            ->where($this->where);

        $this->dtc->leftJoin('jalur_penerimaan as jp','jp.id','=','p.jalur_daftar')
            ->whereNotNull('jp.jalur_daftar')
            ->where($this->where);

        foreach ($this->where as $val) {
            if ($val[0] === 'jpl.program_studi') {
                $this->dt->leftJoin('jurusan_pilihan as jpl','jpl.id_pendaftar','=','p.nomor');
                $this->dtc->leftJoin('jurusan_pilihan as jpl','jpl.id_pendaftar','=','p.nomor');
            }
        }
    }
    // end datatable
}