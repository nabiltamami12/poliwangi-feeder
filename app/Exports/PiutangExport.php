<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithCustomValueBinder;
use App\Models\BerkasKeuangan;

class PiutangExport extends \PhpOffice\PhpSpreadsheet\Cell\StringValueBinder implements FromView, ShouldAutoSize, WithCustomValueBinder
{
   public function view(): View {
      $obj = BerkasKeuangan::select(
            'keuangan_piutang.id', 
            'keuangan_piutang.id_mahasiswa', 
            'keuangan_piutang.path_perjanjian', 
            'mahasiswa.nrp as nim',
            'mahasiswa.nama',
            DB::raw('CASE WHEN jenis = "spi" THEN total ELSE 0 END as SPI'),
            DB::raw('CASE WHEN jenis = "ukt" THEN total ELSE 0 END as UKT'),
            DB::raw('SUM(CASE WHEN id_mahasiswa = id_mahasiswa THEN `keuangan_piutang`.total END) as jumlah'),
            'keuangan_piutang.status as status_piutang')
            ->join('mahasiswa', 'mahasiswa.nomor', '=', 'keuangan_piutang.id_mahasiswa')
            ->groupBy('keuangan_piutang.id_mahasiswa')
            ->get();
      return view('export.piutang', compact('obj'));
   }
}
