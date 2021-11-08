<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithCustomValueBinder;
use Maatwebsite\Excel\Concerns\FromCollection;
use App\Models\Mahasiswa;
use Maatwebsite\Excel\Concerns\WithHeadings;

class MahasiswaExport extends \PhpOffice\PhpSpreadsheet\Cell\StringValueBinder implements FromCollection, WithHeadings, ShouldAutoSize, WithCustomValueBinder
{
	protected $where;

	public function __construct(array $where) {
		$this->where = $where;
	}

	public function collection() {
		return Mahasiswa::where($this->where)
			->join('program_studi as ps','mahasiswa.program_studi','=','ps.nomor','left')
			->get();
	}

	public function headings(): array
    {
    	$obj = $this->collection()->first();
    	if ( $obj ) {
	    	$head = array_change_key_case($obj->toArray(), CASE_UPPER);
	    	return array_keys($head);
    	}
    }
}
