<?php

namespace App\Imports;

use App\Models\Spi;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithCalculatedFormulas;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;

class SpiImport implements ToModel, WithHeadingRow, WithCalculatedFormulas, SkipsEmptyRows
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Spi([
            'id_mahasiswa' => $row["nim"],
            'tarif' => $row["tarif_spi"],
            'pembayaran' => $row["pembayaran_spi"],
            'tanggal_pembayaran' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['tgl_pembayaran']),
            'piutang' => $row["piutang"]
        ]);
    }

    public function headingRow(): int
    {
        return 5;
    }

}
