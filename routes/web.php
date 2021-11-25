<?php

use App\Models\Prodi;
use App\Models\Periode;
use App\Models\Kurikulum;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Admin\Kepegawaian\PegawaiController;
use App\Http\Controllers\Admin\Kepegawaian\PangkatController;
use App\Http\Controllers\Admin\Kepegawaian\JabatanStrukturalController;
use App\Http\Controllers\Admin\Kepegawaian\DataStrukturalController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Kepegawaian\UnitController;
use App\Http\Controllers\Admin\Kepegawaian\StaffController;
use App\Http\Controllers\Admin\Kepegawaian\ReportController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// use Illuminate\Support\Facades\Http;

// $accessToken = 'sss';
// $response = Http::withHeaders([
//     'Accept' => 'application/json',
//     'Authorization' => 'Bearer '.$accessToken,
// ])->get('http://127.0.0.1:8000/admin/master-fakultas');


Route::get('/', function () {
    return view('auth.login');
})->name('login');


// Route::get('/login', function () {
//     return view('halamanAwal.login');
// })->name('login');

Route::get('/register', function () {
    return view('halamanAwal.register');
})->name('register');

Route::get('/pmbgenerateva', function () {
    return view('halamanAwal.pmbGenerateVA');
})->name('generateVA-PMB');

// Route::middleware(['auth'])->group(function () {
    
    Route::prefix('mahasiswabaru')->middleware(['aksesuntuk:maba'])->group(function () {
        Route::get('/dashboard', function () {
            return view('mahasiswaBaru.dashboardMaba', [
                "title" => "Dashboard"
            ]);
        });
        Route::get('/verifikasidata', function () {
            return view('mahasiswaBaru.verifikasiData', [
                "title" => "Verifikasi Data"
            ]);
        });
        Route::get('/pembayaranva', function () {
            return view('mahasiswaBaru.generatePembayaranVA', [
                "title" => "Pembayaran VA"
            ]);
        });
        Route::get('/daftarulang', function () {
            return view('mahasiswaBaru.daftarUlang', [
                "title" => "Daftar Ulang"
            ]);
        });
        Route::get('/editdatamahasiswa', function () {
            return view('mahasiswaBaru.editDataMahasiswa', [
                "title" => "Edit Data Mahasiswa"
            ]);
        });
    });
    
    Route::prefix('mahasiswa')->middleware(['aksesuntuk:mahasiswa'])->group(function () {
        Route::get('/dashboard', function () {
            return view('mahasiswaLama.dashboardMahasiswa', [
                "title" => "absensi-mahasiswa"
            ]);
        });
        
        Route::get('/rekap', function () {
            return view('mahasiswaLama.presensi', [
                "title" => "rekap-absensi-mahasiswa"
            ]);
        });

        Route::get('/pembayaran', function () {
            return view('mahasiswaLama.pembayaran', [
                "title" => "Pembayaran"
            ]);
        });
        
        Route::get('/pengajuan/cicilan', function () {
            return view('mahasiswaLama.pengajuancicilan', [
                "title" => "pmb-pendaftar",
            ]);
        });
        
        Route::get('/presensi', function () {
            return view('mahasiswaLama.presensi', [
                "title" => "Presensi"
            ]);
        });

        // Route::get('/rekap-nilai', function () {
        //     return view('akademik.kuliah/datarekapnilai', [
            //         "title" => "rekap-nilai"
        //     ]);
        // });

        Route::get('/datarangenilai', function () {
            return view('akademik.masterData/datarangenilai', [
                "title" => "akademik-master"
            ]);
        });
        Route::get('/datarangenilai/cu/', function () {
            return view('akademik.masterData/editrangenilai', [
                "id" => null,
                "title" => "akademik-master"
            ]);
        });
        Route::get('/datarangenilai/history/', function () {
            return view('akademik.masterData/historyrangenilai', [
                "id" => null,
                "title" => "akademik-master"
            ]);
        });
        Route::get('/settingkuliah', function () {
            return view('akademik.masterData/fe_settingKuliah', [
                "title" => "akademik-master"
            ]);
        });
    });
    Route::prefix('admin')->middleware(['aksesuntuk:admin'])->group(function () {
        Route::prefix('kepegawaian')->group(function () {
            //route pegawai
            Route::resource('dataPegawai', PegawaiController::class);
            Route::get('/getPegawai', [PegawaiController::class, 'getPegawai'])->name('get-pegawai');
            //route unit
            Route::resource('dataUnit', UnitController::class);
            Route::get('/getUnit', [UnitController::class, 'getUnit'])->name('get-unit');

            Route::resource('reportPegawai', ReportController::class);
            Route::get('/dataReport', [ReportController::class, 'dataReport'])->name('data-report');
            //route staff
            Route::resource('dataStaff', StaffController::class);
            Route::get('/getStaff', [StaffController::class, 'getStaff'])->name('data-staff');
            //route data struktural
            Route::resource('/dataStruktural', DataStrukturalController::class);
            Route::get('/getData', [DataStrukturalController::class, 'getData'])->name('get-data');
            //route pangkat
            Route::resource('/dataPangkat', PangkatController::class);
            Route::get('/getPangkat', [PangkatController::class, 'getPangkat'])->name('get-pangkat');
        });
        Route::get('/dashboard', function () {
            return view('akademik.dashboardAkademik', [
                "title" => "akademik-dashboard",
            ]);
        });
    
        Route::get('/mahasiswa', function () {
            return view('akademik.masterData/datamahasiswalama', [
                "title" => "admin-mahasiswa",
            ]);
        });
        Route::get('/mahasiswa/cu/{id}', function ($id) {
            return view('akademik.masterData/cumahasiswa', [
                "id" => $id,
                "title" => "akademik-master"
            ]);
        });
    
        Route::prefix('master')->group(function () {
            Route::get('/dataperiode', function () {
                return view('akademik.masterData/dataperiode', [
                    "title" => "akademik-master",
                ]);
            });
            Route::get('/dataperiode/cu/', function () {
                return view('akademik.masterData/cuperiode', [
                    "id" => null,
                    "title" => "akademik-master"
                ]);
            });
            Route::get('/dataperiode/cu/{id}', function ($id) {
                return view('akademik.masterData/cuperiode', [
                    "id" => $id,
                    "title" => "akademik-master"
                ]);
            });
    
            Route::get('/datakurikulum', function () {
                return view('akademik.masterData/datakurikulum', [
                    "title" => "akademik-master",
                ]);
            });
            Route::get('/datakurikulum/cu/', function () {
                return view('akademik.masterData/tambahkurikulum', [
                    "id" => null,
                    "title" => "akademik-master",
                    "prodi" => Prodi::all(),
                    "periode" => Periode::where('tahun', '>=', date('Y'))->get()
                ]);
            });
            Route::get('/datakurikulum/cu/{id}', function ($id) {
                return view('akademik.masterData/updatekurikulum', [
                    "id" => $id,
                    "title" => "akademik-master",
                    "prodi" => Prodi::all(),
                    "periode" => Periode::where('tahun', '>=', date('Y'))->get()
                ]);
            });
            Route::get('/datakurikulum/{id}/matakuliah', function ($id) {
                return view('akademik.masterData/matakuliah-kurikulum', [
                    "id" => $id,
                    "kurikulum" => Kurikulum::where('id', $id)->first(),
                    "title" => "akademik-master"
                ]);
            });
            Route::get('/datakurikulum/{id}/matakuliah/cu', function ($id) {
                $kurikulum = Kurikulum::where('id', $id)->first();
                return view('akademik.masterData/tambahmatakuliah-kurikulum', [
                    "id" => $id,
                    "kurikulum" => $kurikulum,
                    "title" => "akademik-master",
                    "matkul" => DB::table('matakuliah')->where('program_studi', '=', $kurikulum->prodi_id)->get()
                ]);
            });
    
            Route::get('/datahariaktif', function () {
                return view('akademik.masterData/datahariaktif', [
                    "title" => "akademik-master"
                ]);
            });
    
            Route::get('/datamahasiswa', function () {
                return view('akademik.masterData.datamahasiswa', [
                    "title" => "akademik-master",
                ]);
            });
            Route::get('/datamahasiswa/cu/', function () {
                return view('akademik.masterData/cumahasiswa', [
                    "id" => null,
                    "title" => "akademik-master"
                ]);
            });
            Route::get('/datamahasiswa/cu/{id}', function ($id) {
                return view('akademik.masterData/cumahasiswa', [
                    "id" => $id,
                    "title" => "akademik-master"
                ]);
            });
    
            Route::get('/datadosenpengampu', function () {
                return view('akademik.masterData.datadosenpengampu', [
                    "title" => "akademik-master"
                ]);
            });
            Route::get('/datadosenpengampu/cu/', function () {
                return view('akademik.masterData/cudosenpengampu', [
                    "id" => null,
                    "title" => "akademik-master"
                ]);
            });
            Route::get('/datadosenpengampu/cu/{id}', function ($id) {
                return view('akademik.masterData/cudosenpengampu', [
                    "id" => $id,
                    "title" => "akademik-master"
                ]);
            });
    
            Route::get('/datamatakuliah', function () {
                return view('akademik.masterData/datamatakuliah', [
                    "title" => "akademik-master"
                ]);
            });
            Route::get('/datamatakuliah/cu/', function () {
                return view('akademik.masterData/cumatakuliah', [
                    "id" => null,
                    "title" => "akademik-master"
                ]);
            });
            Route::get('/datamatakuliah/cu/{id}', function ($id) {
                return view('akademik.masterData/cumatakuliah', [
                    "id" => $id,
                    "title" => "akademik-master"
                ]);
            });
    
            Route::get('/datakelas', function () {
                return view('akademik.masterData/datakelas', [
                    "title" => "akademik-master",
                ]);
            });
            Route::get('/datakelas/cu/', function () {
                return view('akademik.masterData/cukelas', [
                    "id" => null,
                    "title" => "akademik-master"
                ]);
            });
            Route::get('/datakelas/cu/{id}', function ($id) {
                return view('akademik.masterData/cukelas', [
                    "id" => $id,
                    "title" => "akademik-master"
                ]);
            });
            Route::get('/datakelas/dosen/{id}', function ($id) {
                return view('akademik.masterData/cukelasdosen', [
                    "id" => $id,
                    "title" => "akademik-master"
                ]);
            });
    
            Route::get('/datadosen', function () {
                return view('akademik.masterData/datadosen', [
                    "title" => "akademik-master",
                ]);
            });
    
            Route::get('/dataruangan', function () {
                return view('akademik.masterData/dataruangan', [
                    "title" => "akademik-master"
                ]);
            });
            Route::get('/dataruangan/cu/', function () {
                return view('akademik.masterData/curuang', [
                    "id" => null,
                    "title" => "akademik-master"
                ]);
            });
            Route::get('/dataruangan/cu/{id}', function ($id) {
                return view('akademik.masterData/curuang', [
                    "id" => $id,
                    "title" => "akademik-master"
                ]);
            });
    
            Route::get('/datajamkuliah', function () {
                return view('akademik.masterData/datajamkuliah', [
                    "title" => "akademik-master"
                ]);
            });
            Route::get('/datajamkuliah/cu/', function () {
                return view('akademik.masterData/cujamkuliah', [
                    "id" => null,
                    "title" => "akademik-master"
                ]);
            });
            Route::get('/datajamkuliah/cu/{id}', function ($id) {
                return view('akademik.masterData/cujamkuliah', [
                    "id" => $id,
                    "title" => "akademik-master"
                ]);
            });
    
            Route::get('/datajurusan', function () {
                return view('akademik.masterData/datajurusan', [
                    "title" => "akademik-master"
                ]);
            });
            Route::get('/datajurusan/cu/', function () {
                return view('akademik.masterData/cujurusan', [
                    "id" => null,
                    "title" => "akademik-master"
                ]);
            });
            Route::get('/datajurusan/cu/{id}', function ($id) {
                return view('akademik.masterData/cujurusan', [
                    "id" => $id,
                    "title" => "akademik-master"
                ]);
            });
    
            Route::get('/dataprodi', function () {
                return view('akademik.masterData/dataprodi', [
                    "title" => "akademik-master"
                ]);
            });
            Route::get('/dataprodi/cu/', function () {
                return view('akademik.masterData/cuprodi', [
                    "id" => null,
                    "title" => "akademik-master"
                ]);
            });
            Route::get('/dataprodi/cu/{id}', function ($id) {
                return view('akademik.masterData/cuprodi', [
                    "id" => $id,
                    "title" => "akademik-master"
                ]);
            });
    
            Route::get('/datarangenilai', function () {
                return view('akademik.masterData/datarangenilai', [
                    "title" => "akademik-master"
                ]);
            });
            Route::get('/datarangenilai/cu/', function () {
                return view('akademik.masterData/editrangenilai', [
                    "id" => null,
                    "title" => "akademik-master"
                ]);
            });
            Route::get('/datarangenilai/history/', function () {
                return view('akademik.masterData/historyrangenilai', [
                    "id" => null,
                    "title" => "akademik-master"
                ]);
            });
            Route::get('/settingkuliah', function () {
                return view('akademik.masterData/fe_settingKuliah', [
                    "title" => "akademik-master"
                ]);
            });
        });
    
    
        Route::prefix('kuliah')->group(function () {
    
            Route::get('/perwalian', function () {
                return view('admin.kuliah.perwalian', [
                    "page" => "admin",
                    "title" => "admin-perwalian"
                ]);
            });
            Route::get('/absensi/rekap', function () {
                return view('akademik.kuliah.rekapabsensimahasiswa', [
                    "page" => "admin",
                    "title" => "rekap-absensi-mahasiswa"
                ]);
            });
    
            Route::get('/absensi/dosen', function () {
                return view('admin.kuliah.absensidosen', [
                    "page" => "admin",
                    "title" => "rekap-absensi-dosen"
                ]);
            });

            Route::get('/absensi/pegawai', function () {
                return view('admin.kuliah.absensipegawai', [
                    "page" => "admin",
                    "title" => "rekap-absensi-pegawai"
                ]);
            });
    
            Route::get('/absensi/dosen/{id}/{tahun}/{semester}', function ($id, $tahun, $semester) {
                return view('admin.kuliah.rekapabsensidosen', [
                    "page" => "admin",
                    "dosen" => $id,
                    "tahun" => $tahun,
                    "semester" => $semester,
                    "title" => "rekap-absensi-dosen"
                ]);
            });
    
            Route::get('/rekap-nilai', function () {
                return view('admin.kuliah.datarekapnilai', [
                    "title" => "rekap-nilai"
                ]);
            });
    
            Route::get('/rekap-nilai/edit', function () {
                return view('admin.kuliah.nilai', [
                    "title" => "dosen-penilaian"
                ]);
            });
    
            Route::get('/absensi/rekap-mahasiswa/{kelas}/{matkul}', function ($kelas, $matkul) {
                return view('akademik.kuliah.rekapabsensikelasmahasiswa', [
                    "page" => "admin",
                    "kelas" => $kelas,
                    "matkul" => $matkul,
                    "title" => "rekap-absensi-mahasiswa"
                ]);
            });
    
    
            Route::get('/cetak-evaluasi-nilai', function () {
                return view('cetak.evaluasinilai', [
                    "title" => "dosen-penilaian"
                ]);
            });
            Route::get('/cetak-absensi-kelas', function () {
                return view('cetak.cetakabsensikelas', [
                    "title" => "dosen-penilaian"
                ]);
            });
        });
    
        Route::prefix('keuangan')->group(function () {
            Route::get('/piutangmahasiswa', function () {
                return view('keuangan.dataMahasiswa', [
                    "title" => "keuangan-rekapitulasi",
                ]);
            });
    
            Route::get('/datapendaftar', function () {
                return view('keuangan.dataPendaftar', [
                    "title" => "keuangan-rekapitulasi",
                ]);
            });
            Route::get('/tarif', function () {
                return view('keuangan.tarif_UKT_SPI', [
                    "title" => "keuangan-tarif",
                ]);
            });
            Route::get('/tarif/cu/', function () {
                return view('keuangan.cutarifspi', [
                    "id" => null,
                    "title" => "keuangan-tarif"
                ]);
            });
            Route::get('/tarif/cu/{id}', function ($id) {
                return view('keuangan.cutarifspi', [
                    "id" => $id,
                    "title" => "keuangan-tarif"
                ]);
            });
    
            Route::get('/spi', function () {
                return view('keuangan.spiMandiri', [
                    "title" => "keuangan-rekapitulasi",
                ]);
            });
    
            Route::get('/spi/detail/{id}/{nama}', function ($id, $nama) {
                return view('keuangan.detailSPI', [
                    "id" => $id,
                    'nama' => $nama,
                    "title" => "keuangan-rekapitulasi",
                ]);
            });
            Route::get('/riwayatpembayaran', function () {
                return view('keuangan.riwayatPembayaran', [
                    "title" => "keuangan-rekapitulasi",
                ]);
            });
        });
    
        Route::prefix('pmb')->group(function () {
            Route::get('/datapendaftar', function () {
                return view('admin.pmb.datapendaftar', [
                    "title" => "admin-pmb",
                ]);
            });
    
            Route::get('/datapendaftar/{id}', function ($id) {
                return view('admin.pmb.cuDataPendaftar', [
                    "id" => $id,
                    "title" => "admin-pmb",
                ]);
            });
    
            Route::get('/generatenim', function () {
                return view('admin.pmb.generatenim', [
                    "title" => "admin-pmb",
                ]);
            });
    
            Route::get('/settingjalurpenerimaan', function () {
                return view('admin.pmb.settingJalurPenerimaan', [
                    "title" => "admin-pmb"
                ]);
            });
            Route::get('/settingjalurpenerimaan/cu/', function () {
                return view('admin.pmb/cuJalurPenerimaan', [
                    "id" => null,
                    "title" => "admin-pmb"
                ]);
            });
            Route::get('/settingjalurpenerimaan/cu/{id}', function ($id) {
                return view('admin.pmb/cuJalurPenerimaan', [
                    "id" => $id,
                    "title" => "admin-pmb"
                ]);
            });
            Route::get('/settingjalursyarat', function () {
                return view('admin.pmb.settingJalurSyarat', [
                    "title" => "admin-pmb"
                ]);
            });
            Route::get('/settingjalursyarat/cu/', function () {
                return view('admin.pmb/cuJalurSyarat', [
                    "id" => null,
                    "title" => "admin-pmb"
                ]);
            });
            Route::get('/settingjalursyarat/cu/{id}', function ($id) {
                return view('admin.pmb/cuJalurSyarat', [
                    "id" => $id,
                    "title" => "admin-pmb"
                ]);
            });
            Route::get('/settingjurusanlinear', function () {
                return view('admin.pmb.settingjurusanlinear', [
                    "title" => "admin-pmb"
                ]);
            });
            Route::get('/settingjurusanlinear/{id}', function ($id) {
                return view('admin.pmb.jurusanlinear', [
                    "id" => $id,
                    "title" => "admin-pmb"
                ]);
            });
            Route::get('/settingjurusanlinear/cu/', function () {
                return view('admin.pmb/cujurusanlinear', [
                    "id" => null,
                    "title" => "admin-pmb"
                ]);
            });
            Route::get('/settingjurusanlinear/cu/{id}', function ($id) {
                return view('admin.pmb/cujurusanlinear', [
                    "id" => $id,
                    "title" => "admin-pmb"
                ]);
            });
            // Route::get('/settingjurusanpilihan', function () {
            //     return view('admin.pmb.settingJurusanPilihan', [
            //         "title" => "admin-pmb"
            //     ]);
            // });
            // Route::get('/editjurusanpilihan', function () {
            //     return view('admin.pmb.editJurusanPilihan', [
            //         "title" => "admin-pmb"
            //     ]);
            // });
    
            // Route::get('/settingjadwalseleksi', function () {
            //     return view('admin.pmb.settingJadwalSeleksi', [
            //         "title" => "admin-pmb"
            //     ]);
            // });
            // Route::get('/editjadwalseleksi', function () {
            //     return view('admin.pmb.editJadwalSeleksi', [
            //         "title" => "admin-pmb"
            //     ]);
            // });
    
            // Route::get('/settingjurusanasal', function () {
            //     return view('admin.pmb.settingJurusanAsalPendaftar', [
            //         "title" => "admin-pmb"
            //     ]);
            // });
            // Route::get('/editjurusanasal', function () {
            //     return view('admin.pmb.editJurusanAsalPendaftar', [
            //         "title" => "admin-pmb"
            //     ]);
            // });
    
            // Route::get('/settingjurusanlinear', function () {
            //     return view('admin.pmb.settingJurusanLinear', [
            //         "title" => "admin-pmb"
            //     ]);
            // });
        });
    
        Route::prefix('report')->group(function () {
            Route::get('/cuti', function () {
                return view('akademik.report.reportcuti', [
                    "title" => "akademik-report",
                ]);
            });
    
            Route::get('/dropout', function () {
                return view('akademik.report.reportdo', [
                    "title" => "akademik-report",
                ]);
            });
    
            Route::get('/melebihisemester', function () {
                return view('akademik.report.reportmelebihisemester', [
                    "title" => "akademik-report",
                ]);
            });
    
            Route::get('/lulus', function () {
                return view('akademik.report.reportlulus', [
                    "title" => "akademik-report",
                ]);
            });
    
            Route::get('/judultugasakhir', function () {
                return view('akademik.report.reportjudulta', [
                    "title" => "akademik-report",
                ]);
            });
        });
    
        Route::prefix('khs')->group(function () {
            Route::get('/khs', function () {
                return view('akademik.khs.khs', [
                    "title" => "akademik-khs",
                ]);
            });
            Route::get('/khsmahasiswa', function () {
                return view('akademik.khs.khsmahasiswa', [
                    "title" => "akademik-khs",
                ]);
            });
        });
    });
    
    Route::prefix('dosen')->middleware(['aksesuntuk:dosen'])->group(function () {
        Route::get('/dashboard', function () {
            return view('dosen.dashboardDosen', [
                "title" => "dosen-dashboard"
            ]);
        });

        Route::get('/presensi', function () {
            return view('dosen.presensiDosen', [
                "title" => "dosen-presensi"
            ]);
        });
        
        Route::get('/perwalian', function () {
            return view('dosen.perwalian', [
                "title" => "dosen-perwalian"
            ]);
        });

        Route::get('/absensi/pegawai', function () {
            return view('admin.kuliah.absensipegawai', [
                "page" => "admin",
                "title" => "rekap-absensi-pegawai"
            ]);
        });

        Route::get('/rekap-nilai', function () {
            return view('admin.kuliah.datarekapnilai', [
                "title" => "rekap-nilai"
            ]);
        });

        Route::get('/penilaian', function () {
            return view('dosen.inputNilai', [
                "title" => "dosen-penilaian"
            ]);
        });
        Route::get('/absensi/kelas-dosen/{id_kuliah}/{pertemuan}', function ($id_kuliah, $pertemuan) {
            return view('dosen.presensiDosen', [
                "id_kuliah" => $id_kuliah,
                "pertemuan" => $pertemuan,
                "title" => "absensi-dosen"
            ]);
        });
        Route::get('/cetak-evaluasi-nilai', function () {
            return view('cetak.evaluasinilai', [
                "title" => "dosen-penilaian"
            ]);
        });
        Route::get('/cetak-absensi-kelas', function () {
            return view('cetak.cetakabsensikelas', [
                "title" => "dosen-penilaian"
            ]);
        });
    });

    Route::prefix('keuangan')->group(function () {
        Route::get('/piutangmahasiswa', function () {
            return view('keuangan.dataMahasiswa', [
                "title" => "keuangan-rekapitulasi",
            ]);
        });

        Route::get('/datapendaftar', function () {
            return view('keuangan.dataPendaftar', [
                "title" => "keuangan-rekapitulasi",
            ]);
        });
        Route::get('/tarif', function () {
            return view('keuangan.tarif_UKT_SPI', [
                "title" => "keuangan-tarif",
            ]);
        });
        Route::get('/tarif/cu/', function () {
            return view('keuangan.cutarifspi', [
                "id" => null,
                "title" => "keuangan-tarif"
            ]);
        });
        Route::get('/tarif/cu/{id}', function ($id) {
            return view('keuangan.cutarifspi', [
                "id" => $id,
                "title" => "keuangan-tarif"
            ]);
        });

        Route::get('/spi', function () {
            return view('keuangan.spiMandiri', [
                "title" => "keuangan-rekapitulasi",
            ]);
        });

        Route::get('/spi/detail/{id}/{nama}', function ($id, $nama) {
            return view('keuangan.detailSPI', [
                "id" => $id,
                'nama' => $nama,
                "title" => "keuangan-rekapitulasi",
            ]);
        });
        Route::get('/riwayatpembayaran', function () {
            return view('keuangan.riwayatPembayaran', [
                "title" => "keuangan-rekapitulasi",
            ]);
        });
    });

    Route::prefix('pmb')->group(function () {
        Route::get('/datapendaftar', function () {
            return view('admin.pmb.datapendaftar', [
                "title" => "admin-pmb",
            ]);
        });

        Route::get('/datapendaftar/{id}', function ($id) {
            return view('admin.pmb.cuDataPendaftar', [
                "id" => $id,
                "title" => "admin-pmb",
            ]);
        });

        Route::get('/generatenim', function () {
            return view('admin.pmb.generatenim', [
                "title" => "admin-pmb",
            ]);
        });

        Route::get('/settingjalurpenerimaan', function () {
            return view('admin.pmb.settingJalurPenerimaan', [
                "title" => "admin-pmb"
            ]);
        });
        Route::get('/settingjalurpenerimaan/cu/', function () {
            return view('admin.pmb/cuJalurPenerimaan', [
                "id" => null,
                "title" => "admin-pmb"
            ]);
        });
        Route::get('/settingjalurpenerimaan/cu/{id}', function ($id) {
            return view('admin.pmb/cuJalurPenerimaan', [
                "id" => $id,
                "title" => "admin-pmb"
            ]);
        });
        Route::get('/settingjalursyarat', function () {
            return view('admin.pmb.settingJalurSyarat', [
                "title" => "admin-pmb"
            ]);
        });
        Route::get('/settingjalursyarat/cu/', function () {
            return view('admin.pmb/cuJalurSyarat', [
                "id" => null,
                "title" => "admin-pmb"
            ]);
        });
        Route::get('/settingjalursyarat/cu/{id}', function ($id) {
            return view('admin.pmb/cuJalurSyarat', [
                "id" => $id,
                "title" => "admin-pmb"
            ]);
        });
        Route::get('/settingjurusanlinear', function () {
            return view('admin.pmb.settingjurusanlinear', [
                "title" => "admin-pmb"
            ]);
        });
        Route::get('/settingjurusanlinear/{id}', function ($id) {
            return view('admin.pmb.jurusanlinear', [
                "id" => $id,
                "title" => "admin-pmb"
            ]);
        });
        Route::get('/settingjurusanlinear/cu/', function () {
            return view('admin.pmb/cujurusanlinear', [
                "id" => null,
                "title" => "admin-pmb"
            ]);
        });
        Route::get('/settingjurusanlinear/cu/{id}', function ($id) {
            return view('admin.pmb/cujurusanlinear', [
                "id" => $id,
                "title" => "admin-pmb"
            ]);
        });
        // Route::get('/settingjurusanpilihan', function () {
        //     return view('admin.pmb.settingJurusanPilihan', [
        //         "title" => "admin-pmb"
        //     ]);
        // });
        // Route::get('/editjurusanpilihan', function () {
        //     return view('admin.pmb.editJurusanPilihan', [
        //         "title" => "admin-pmb"
        //     ]);
        // });

        // Route::get('/settingjadwalseleksi', function () {
        //     return view('admin.pmb.settingJadwalSeleksi', [
        //         "title" => "admin-pmb"
        //     ]);
        // });
        // Route::get('/editjadwalseleksi', function () {
        //     return view('admin.pmb.editJadwalSeleksi', [
        //         "title" => "admin-pmb"
        //     ]);
        // });

        // Route::get('/settingjurusanasal', function () {
        //     return view('admin.pmb.settingJurusanAsalPendaftar', [
        //         "title" => "admin-pmb"
        //     ]);
        // });
        // Route::get('/editjurusanasal', function () {
        //     return view('admin.pmb.editJurusanAsalPendaftar', [
        //         "title" => "admin-pmb"
        //     ]);
        // });

        // Route::get('/settingjurusanlinear', function () {
        //     return view('admin.pmb.settingJurusanLinear', [
        //         "title" => "admin-pmb"
        //     ]);
        // });
    });

    Route::prefix('report')->group(function () {
        Route::get('/cuti', function () {
            return view('akademik.report.reportcuti', [
                "title" => "akademik-report",
            ]);
        });

        Route::get('/dropout', function () {
            return view('akademik.report.reportdo', [
                "title" => "akademik-report",
            ]);
        });

        Route::get('/melebihisemester', function () {
            return view('akademik.report.reportmelebihisemester', [
                "title" => "akademik-report",
            ]);
        });

        Route::get('/lulus', function () {
            return view('akademik.report.reportlulus', [
                "title" => "akademik-report",
            ]);
        });

        Route::get('/judultugasakhir', function () {
            return view('akademik.report.reportjudulta', [
                "title" => "akademik-report",
            ]);
        });
    });

    Route::prefix('khs')->group(function () {
        Route::get('/khs', function () {
            return view('akademik.khs.khs', [
                "title" => "akademik-khs",
            ]);
        });
        Route::get('/khsmahasiswa', function () {
            return view('akademik.khs.khsmahasiswa', [
                "title" => "akademik-khs",
            ]);
        });
    });
// });

    Route::prefix('keuangan')->middleware(['aksesuntuk:keuangan'])->group(function () {
        Route::get('/dashboard', function () {
            return view('keuangan.dashboardKeuangan', [
                "title" => "keuangan-dashboard",
            ]);
        });

        Route::prefix('tarif')->group(function () {
            Route::get('/', function () {
                return view('keuangan.tarif_UKT_SPI', [
                    "title" => "keuangan-tarif",
                ]);
            });
            Route::get('/cu', function () {
                return view('keuangan.cutarifspi', [
                    "id" => null,
                    "title" => "keuangan-tarif"
                ]);
            });
            Route::get('/cu/{id}', function ($id) {
                return view('keuangan.cutarifspi', [
                    "id" => $id,
                    "title" => "keuangan-tarif"
                ]);
            });
        });

        Route::prefix('rekapitulasi')->group(function () {
            Route::get('/datapendaftar', function () {
                return view('keuangan.dataPendaftar', [
                    "title" => "keuangan-rekapitulasi",
                ]);
            });

            Route::get('/datamahasiswa', function () {
                return view('keuangan.dataMahasiswa', [
                    "title" => "keuangan-rekapitulasi",
                ]);
            });

            Route::get('/spi', function () {
                return view('keuangan.spiMandiri', [
                    "title" => "keuangan-rekapitulasi",
                ]);
            });

            Route::get('/spi/detail/{id}', function ($id) {
                return view('keuangan.detailSPI', [
                    "id" => $id,
                    "title" => "keuangan-rekapitulasi",
                ]);
            });

            Route::get('/piutangmahasiswa', function () {
                return view('keuangan.dashboardKeuangan', [
                    "title" => "keuangan-dashboard",
                ]);
            });
            
            Route::prefix('tarif')->group(function() {
                Route::get('/', function () {
                    return view('keuangan.tarif_UKT_SPI', [
                        "title" => "keuangan-tarif",
                    ]);
                });
                Route::get('/cu', function () {
                    return view('keuangan.cutarifspi', [
                        "id" => null,
                        "title" => "keuangan-tarif"
                    ]);
                });
                Route::get('/cu/{id}', function ($id) {
                    return view('keuangan.cutarifspi', [
                        "id" => $id,
                        "title" => "keuangan-tarif"
                    ]);
                });
            });

            Route::prefix('rekapitulasi')->group(function () {
                Route::get('/datapendaftar', function () {
                    return view('keuangan.dataPendaftar', [
                        "title" => "keuangan-rekapitulasi",
                    ]);
                });

                Route::get('/datamahasiswa', function () {
                    return view('keuangan.dataMahasiswa', [
                        "title" => "keuangan-rekapitulasi",
                    ]);
                });
                
                Route::get('/spi', function () {
                    return view('keuangan.spiMandiri', [
                        "title" => "keuangan-rekapitulasi",
                    ]);
                });

                Route::get('/spi/detail/{id}/{nama}', function ($id, $nama) {
                    return view('keuangan.detailSPI', [
                        "id" => $id,
                        'nama' => $nama,
                        "title" => "keuangan-rekapitulasi",
                    ]);
                });

                Route::get('/piutangmahasiswa', function () { /*keuangan/dashboard*/
                    return view('keuangan.dashboardKeuangan', [
                        "title" => "keuangan-rekapitulasi",
                    ]);
                });

                Route::get('/piutangmahasiswa/detail/{id}', function ($id) {
                    return view('keuangan.detailPiutang', [
                        'id' => $id,
                        "title" => "Detail Piutang",
                    ]);
                });

                Route::get('/piutangmahasiswa/masukkan', function () {
                    return view('keuangan.masukkanPiutang', [
                        "title" => "Masukkan Mahasiswa pada Daftar Piutang",
                    ]);
                });

                Route::get('/penyisihanpiutang', function () {
                    return view('keuangan.penyisihanPiutang', [
                        "title" => "keuangan-rekapitulasi",
                    ]);
                });
                
                Route::get('/inputdatapembayaran', function () {
                    return view('keuangan.inputDataPembayaran', [
                        "title" => "keuangan-rekapitulasi",
                    ]);
                });
                
                Route::get('/riwayatpembayaran', function () {
                    return view('keuangan.riwayatPembayaran', [
                        "title" => "keuangan-rekapitulasi",
                    ]);
                });
            });

            Route::prefix('buktipembayaran')->group(function () {
                Route::get('/email', function () {
                    return view('keuangan.buktiPembayaran.email', [
                        "title" => "keuangan-buktipembayaran",
                    ]);
                });

                Route::get('/kwitansi', function () {
                    return view('keuangan.buktiPembayaran.kwitansi', [
                        "title" => "keuangan-buktipembayaran",
                    ]);
                });
            });
        });
    });
// });



    require __DIR__.'/auth.php';

    require_once(__DIR__.'/web_slicing.php');