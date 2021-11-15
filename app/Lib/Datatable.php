<?php namespace App\Lib;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class Datatable extends Model {
  protected $request;
	protected $dt;
	protected $table_datatables;
	protected $dtc;
	protected $column_order = array();
	protected $column_search = array();
	protected $order = array();
	protected $select = array();
	protected $req_datatable;

  function __construct($req = []){
		parent::__construct();
		$this->req_datatable = $req;
		$this->request = Request();
		$this->dtc = DB::table($this->table_datatables);
	}

  protected function _get_datatables_query(){
		$this->extra_datatables();
		$val_search = $this->request->input('search')['value'];
		if($val_search && $this->column_search){ 
			$this->dt->where(function ($q) use ($val_search){
				foreach ($this->column_search as $item){
					$q->orWhere(DB::raw($item), 'like', '%'.$val_search.'%');
				}
			});
		}

		$order_post = $this->request->input('order');
		if($order_post && $this->column_order[$order_post['0']['column']]){
			$this->dt->orderBy($this->column_order[$order_post['0']['column']], $order_post['0']['dir']);
		}
		if(isset($this->order)){
			$order = $this->order;
			$this->dt->orderBy(key($order), $order[key($order)]);
		}
	}

	public function get_datatables(){
		$this->dt = DB::table($this->table_datatables);
		$this->_get_datatables_query();
		if($this->select) $this->dt->selectRaw(implode(", ",$this->select));
		if($this->request->input('length') != -1)
			$this->dt->limit($this->request->input('length'))->offset($this->request->input('start'));
		return $this->dt->get();
	}

	public function count_filtered_datatables(){
		$this->dt = DB::table($this->table_datatables);
		$this->_get_datatables_query();
		return $this->dt->count();
	}

	public function count_all_datatables(){
		return $this->dtc->count();
	}

	public function extra_datatables(){}
}