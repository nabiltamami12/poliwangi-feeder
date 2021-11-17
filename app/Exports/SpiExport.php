<?php

namespace App\Exports;

use App\Models\Spi;
use Illuminate\Support\Carbon;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use PhpOffice\PhpSpreadsheet\Style\Alignment as ALG;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;
use PhpOffice\PhpSpreadsheet\Shared\Date;


use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class SpiExport implements WithHeadings, WithColumnWidths, WithStyles, WithCustomStartCell, WithEvents, WithColumnFormatting, WithMapping, FromQuery

{
    /**
    * @return \Illuminate\Support\Collection
    */
    use Exportable;
    protected $prodi;
    protected $program_studi;
    protected $number;

    public function __construct($prodi, $program_studi) {
        $this->prodi = $prodi;
        $this->program_studi = $program_studi;
        $this->number = 1;
    }

    

    public function query() {
        return Spi::query()->select(
            'spi.id',
            'mahasiswa.nrp',
            'mahasiswa.nama',
            'spi.tarif',
            'spi.pembayaran',
            'spi.tanggal_pembayaran',
            'spi.piutang'
        )
        ->where('mahasiswa.program_studi', 'like', $this->prodi)
        ->join('mahasiswa', 'spi.id_mahasiswa', '=', 'mahasiswa.nomor');
    }

    public function map($spi): array{
        $date = Carbon::parse($spi->tanggal_pembayaran);
        return [
            $this->number++,
            $spi->nrp,
            $spi->nama,
            $spi->tarif,
            $spi->pembayaran,
            Date::dateTimeToExcel($date),
            $spi->piutang
        ];
    }

    
    public function headings(): array{
        return [
            'NO',
            'NIM',
            'Nama',
            'Tarif SPI',
            'Pembayaran SPI',
            'Tgl Pembayaran',
            'Piutang'
        ];
    }

    public function columnWidths(): array
    {
        return [
            'B' => 15,
            'C' => 35,
            'D' => 15,
            'E' => 20,
            'F' => 20, 
            'G' => 15
        ];
    }

    public function styles(Worksheet $sheet)
    {
        $sheet->setCellValue('A1', 'REKAPITULASI SUMBANGAN PENGEMBANGAN INSTITUSI (SPI) JALUR MANDIRI');
        $sheet->setCellValue('A2', 'PROGRAM STUDI '.$this->program_studi);
        return [
            // Style the first row as bold text.
            5    => ['font' => ['bold' => true]],

            'A' => ['alignment' => ['horizontal' => ALG::HORIZONTAL_CENTER]],
            'B' => ['alignment' => ['horizontal' => ALG::HORIZONTAL_CENTER]],
            'D' => ['alignment' => ['horizontal' => ALG::HORIZONTAL_CENTER]],
            'E' => ['alignment' => ['horizontal' => ALG::HORIZONTAL_CENTER]],
            'F' => ['alignment' => ['horizontal' => ALG::HORIZONTAL_CENTER]],
            'G' => ['alignment' => ['horizontal' => ALG::HORIZONTAL_CENTER]]
        ];
    }

    public function startCell(): string{
        return 'A5';
    }

    public function registerEvents(): array{
        return [
            AfterSheet::class => function(AfterSheet $event) {
                $event->sheet->getStyle('A1:G5')->applyFromArray([
                    'font' => [
                        'bold' => true,
                    ],
                    'alignment' => [
                        'horizontal' => ALG::HORIZONTAL_CENTER,
                    ]
                ]);

                $event->sheet->getStyle('A5:G'.$event->sheet->getHighestDataRow())->applyFromArray([
                    'borders' => [
                        'allBorders' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                            'color' => ['argb' => '00000000'],
                        ]
                    ] 
                ]);

                $event->sheet->mergeCells('A1:G1');
                $event->sheet->mergeCells('A2:G2');
                $event->sheet->mergeCells('A3:G3');
                $event->sheet->getColumnDimension('G')->setWidth(0);
            }
        ];
    }

    public function columnFormats(): array
    {
        return [
            'B' => NumberFormat::FORMAT_NUMBER,
            'D' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1,
            'E' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1,
            'G' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1,
            'F' => NumberFormat::FORMAT_DATE_DMYSLASH
        ];
    }
}