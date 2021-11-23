<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use PDF;

class LaporanMahasiswaController extends Controller
{

    const mahasiswaStats = [
        '' => '',
        'A' => 'Aktif',
        'X' => 'Tidak Aktif',
        'D' => 'DO',
        'C' => 'Cuti',
        'B' => 'Mahasiswa Baru',
        'R' => 'Tugas Akhir',
        'T' => 'Tanpa Keterangan',
        'P' => 'Pendaftar',
        'M' => 'Meninggal',
        'L' => 'Lulus',
        'K' => 'Mengundurkan Diri',
        'H' => 'Punya SPTH',
    ];

    const inactiveStats = ['K', 'M', 'D'];

    public function getReport(Request $request)
    {

        if ($request->status == '') {
            $mahasiswa = Mahasiswa::all();
        } else if ($request->status == 'X') {
            $mahasiswa = Mahasiswa::whereIn('status', self::inactiveStats)->get();
        } else {
            $mahasiswa = Mahasiswa::where('status', $request->status)->get();
        }

        return PDF::loadView('admin.export.laporan.mahasiswa', [
            'mahasiswa' => $mahasiswa,
            'status' => self::mahasiswaStats[$request->status],
        ])->setPaper('A4', 'portrait')->download('laporan-mahasiswa.pdf');
    }
}
