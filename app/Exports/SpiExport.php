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
use Maatwebsite\Excel\Concerns\WithDrawings;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use PhpOffice\PhpSpreadsheet\Style\Alignment as ALG;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;
use PhpOffice\PhpSpreadsheet\Shared\Date;


use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class SpiExport implements WithHeadings, WithColumnWidths, WithStyles, WithDrawings, WithCustomStartCell, WithEvents, WithColumnFormatting, WithMapping, FromQuery

{
    /**
    * @return \Illuminate\Support\Collection
    */
    use Exportable;
    protected $tahun;

    public function __construct(int $tahun) {
        $this->tahun = $tahun;
    }

    

    public function query() {
        return Spi::query()->select(
            'spi.id',
            'spi.id_mahasiswa',
            'mahasiswa.nama',
            'spi.tarif',
            'spi.pembayaran',
            'spi.tanggal_pembayaran',
            'spi.piutang'
        )->where('tahun', '=', $this->tahun)
        ->join('mahasiswa', 'spi.id_mahasiswa', '=', 'mahasiswa.nrp');
    }

    public function map($spi): array{
        $date = Carbon::parse($spi->tanggal_pembayaran);
        return [
            $spi->id,
            $spi->id_mahasiswa,
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

    public function drawings()
    {
        $drawing = new Drawing();
        $drawing->setName('Logo');
        $drawing->setDescription('This is my logo');
        $drawing->setPath(public_path('/images/header-excel.png'));
        $drawing->setHeight(85);
        $drawing->setWidth(730);
        $drawing->setCoordinates('A1');

        return $drawing;
    }

    public function startCell(): string{
        return 'A5';
    }

    public function registerEvents(): array{
        return [
            AfterSheet::class => function(AfterSheet $event) {
                $event->sheet->getStyle('A5:G5')->applyFromArray([
                    'font' => [
                        'bold' => true,
                    ],
                    'alignment' => [
                        'horizontal' => ALG::HORIZONTAL_CENTER,
                    ]
                ]);

                $event->sheet->getStyle('A5:G50')->applyFromArray([
                    'borders' => [
                        'allBorders' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                            'color' => ['argb' => '00000000'],
                        ]
                    ] 
                ]);
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
