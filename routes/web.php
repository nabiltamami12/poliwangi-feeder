<?php

use Illuminate\Support\Facades\Route;

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
    return view('login');
})->name('login');

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/register', function () {
    return view('register');
})->name('register');

Route::get('/pmbgenerateva', function () {
    return view('pmbGenerateVA');
})->name('generateVA-PMB');

Route::prefix('admin')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    });

    Route::get('/master-fakultas', function () {
        return view('admin.master.fakultas');
    });
});

// echo json_encode($response->json());
Route::prefix('mahasiswabaru')->group(function () {
    Route::get('/dashboard', function () {
        return view('mahasiswaBaru.dashboardMaba', [
            "title" => "maba-dashboard"
        ]);
    });
    Route::get('/verifikasidata', function () {
        return view('mahasiswaBaru.verifikasiData', [
            "title" => "maba-mahasiswa"
        ]);
    });
    Route::get('/pembayaranva', function () {
        return view('mahasiswaBaru.generatePembayaranVA', [
            "title" => "maba-mahasiswa"
        ]);
    });
    Route::get('/daftarulang', function () {
        return view('mahasiswaBaru.daftarUlang', [
            "title" => "maba-mahasiswa"
        ]);
    });
});

Route::prefix('mahasiswalama')->group(function () {
    Route::get('/dashboard', function () {
        return view('mahasiswaLama.dashboardMahasiswa', [
            "title" => "mala-dashboard"
        ]);
    });

    Route::get('/pembayaran', function () {
        return view('mahasiswaLama.pembayaran', [
            "title" => "mala-pembayaran"
        ]);
    });

    Route::get('/presensi', function () {
        return view('mahasiswaLama.presensi', [
            "title" => "mala-presensi"
        ]);
    });

    Route::prefix('penilaian')->group(function () {
        Route::get('/nilaisemester', function () {
            return view('mahasiswaLama.nilaisemester', [
                "title" => "mala-penilaian"
            ]);
        });

        Route::get('/khs', function () {
            return view('mahasiswaLama.khs', [
                "title" => "mala-penilaian"
            ]);
        });
    });

    Route::get('/formcuti', function () {
        return view('mahasiswaLama.formcuti', [
            "title" => "mala-formcuti"
        ]);
    });
});

Route::prefix('dosen')->group(function () {
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

    Route::get('/penilaian', function () {
        return view('dosen.inputNilai', [
            "title" => "dosen-penilaian"
        ]);
    });
});


Route::prefix('akademik')->group(function () {
    Route::get('/dashboard', function () {
        return view('akademik.dashboardAkademik', [
            "title" => "akademik-dashboard"
        ]);
    });

    Route::prefix('master')->group(function (){
        Route::get('/dataperiode', function () {
            return view('akademik.masterData/dataperiode', [
                "title" => "akademik-master"
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

        Route::get('/datahariaktif', function () {
            return view('akademik.masterData/datahariaktif', [
                "title" => "akademik-master"
            ]);
        });

        Route::get('/datamahasiswa', function () {
            return view('akademik.masterData.datamahasiswa', [
                "title" => "akademik-master"
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
                "title" => "akademik-master"
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

        Route::get('/datakuliah', function () {
            return view('akademik.masterData/datakuliah', [
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
            return view('akademik.masterData/curangenilai', [
                "id" => null,
                "title" => "akademik-master"
            ]);
        });
        Route::get('/datarangenilai/cu/{id}', function ($id) {
            return view('akademik.masterData/curangenilai', [
                "id" => $id,
                "title" => "akademik-master"
            ]);
        });
    });

    Route::prefix('report')->group(function (){
        Route::get('/cuti', function () {
            return view('akademik.report.reportcuti', [
                "title" => "akademik-report"
            ]);
        });
    
        Route::get('/dropout', function () {
            return view('akademik.report.reportdo', [
                "title" => "akademik-report"
            ]);
        });

        Route::get('/melebihisemester', function () {
            return view('akademik.report.reportmelebihisemester', [
                "title" => "akademik-report"
            ]);
        });

        Route::get('/lulus', function () {
            return view('akademik.report.reportlulus', [
                "title" => "akademik-report"
            ]);
        });

        Route::get('/judultugasakhir', function () {
            return view('akademik.report.reportjudulta', [
                "title" => "akademik-report"
            ]);
        });
    });

    Route::prefix('khs')->group(function (){
        Route::get('/khs', function () {
            return view('akademik.khs.khs', [
                "title" => "akademik-khs"
            ]);
        });
        Route::get('/khsmahasiswa', function () {
            return view('akademik.khs.khsmahasiswa', [
                "title" => "akademik-khs"
            ]);
        });
    });

    Route::prefix('kuliah')->group(function (){
        Route::get('/skmahasiswaaktif', function () {
            return view('akademik.kuliah.skmahasiswaaktif', [
                "title" => "akademik-kuliah"
            ]);
        });
        Route::get('/nilai', function () {
            return view('akademik.kuliah.nilai', [
                "title" => "akademik-kuliah"
            ]);
        });
        Route::get('/nilaimahasiswa', function () {
            return view('akademik.kuliah.detailnilaimahasiswa', [
                "title" => "akademik-kuliah"
            ]);
        });
        Route::get('/pelanggaran', function () {
            return view('akademik.kuliah.pelanggaran', [
                "title" => "akademik-kuliah"
            ]);
        });
    });
});

Route::prefix('prodi')->group(function () {
    Route::get('/dashboard', function () {
        return view('prodi.dashboardProdi', [
            "title" => "prodi-dashboard"
        ]);
    });
    
    Route::prefix('masterdata')->group(function () {
        Route::get('/datamahasiswa', function () {
            return view('prodi.masterData.masterdataMahasiswa', [
                "title" => "prodi-masterData"
            ]);
        });
        Route::get('/datamahasiswa/tambahdata', function () {
            return view('prodi.formMaster.mahasiswa.tambahdatamahasiswa', [
                "title" => "prodi-masterData"
            ]);
        });
        Route::get('/datamahasiswa/updatedata', function () {
            return view('prodi.formMaster.mahasiswa.updatedatamahasiswa', [
                "title" => "prodi-masterData"
            ]);
        });

        Route::get('/datamatakuliah', function () {
            return view('prodi.masterData.masterdataMatakuliah', [
                "title" => "prodi-masterData"
            ]);
        });
        Route::get('/datamatakuliah/tambahdata', function () {
            return view('prodi.formMaster.matakuliah.tambahdatamatakuliah', [
                "title" => "prodi-masterData"
            ]);
        });
        Route::get('/datamatakuliah/updatedata', function () {
            return view('prodi.formMaster.matakuliah.updatedatamatakuliah', [
                "title" => "prodi-masterData"
            ]);
        });

        Route::get('/datakelas', function () {
            return view('prodi.masterData.masterdataKelas', [
                "title" => "prodi-masterData"
            ]);
        });
        Route::get('/datakelas/tambahdata', function () {
            return view('prodi.formMaster.kelas.tambahdatakelas', [
                "title" => "prodi-masterData"
            ]);
        });
        Route::get('/datakelas/updatedata', function () {
            return view('prodi.formMaster.kelas.updatedatakelas', [
                "title" => "prodi-masterData"
            ]);
        });

        Route::get('/datadosen', function () {
            return view('prodi.masterData.masterdataDosen', [
                "title" => "prodi-masterData"
            ]);
        });
        Route::get('/datadosen/tambahdata', function () {
            return view('prodi.formMaster.dosen.tambahdatadosen', [
                "title" => "prodi-masterData"
            ]);
        });
        Route::get('/datadosen/updatedata', function () {
            return view('prodi.formMaster.dosen.updatedatadosen', [
                "title" => "prodi-masterData"
            ]);
        });

        Route::get('/dataruangan', function () {
            return view('prodi.masterData.masterdataRuangan', [
                "title" => "prodi-masterData"
            ]);
        });
        Route::get('/dataruangan/tambahdata', function () {
            return view('prodi.formMaster.ruangan.tambahdataruangan', [
                "title" => "prodi-masterData"
            ]);
        });
        Route::get('/dataruangan/updatedata', function () {
            return view('prodi.formMaster.ruangan.updatedataruangan', [
                "title" => "prodi-masterData"
            ]);
        });

        Route::get('/datajamkuliah', function () {
            return view('prodi.masterData.masterdataJamKuliah', [
                "title" => "prodi-masterData"
            ]);
        });
        Route::get('/datajamkuliah/tambahdata', function () {
            return view('prodi.formMaster.jamKuliah.tambahdatajamkuliah', [
                "title" => "prodi-masterData"
            ]);
        });
        Route::get('/datajamkuliah/updatedata', function () {
            return view('prodi.formMaster.jamKuliah.updatedatajamkuliah', [
                "title" => "prodi-masterData"
            ]);
        });


        Route::get('/datajurusan', function () {
            return view('prodi.masterData.masterdataJurusan', [
                "title" => "prodi-masterData"
            ]);
        });
        Route::get('/datajurusan/tambahdata', function () {
            return view('prodi.formMaster.jurusan.tambahdatajurusan', [
                "title" => "prodi-masterData"
            ]);
        });
        Route::get('/datajurusan/updatedata', function () {
            return view('prodi.formMaster.jurusan.updatedatajurusan', [
                "title" => "prodi-masterData"
            ]);
        });


        Route::get('/datafakultas', function () {
            return view('prodi.masterData.masterdataFakultas', [
                "title" => "prodi-masterData"
            ]);
        });
        Route::get('/datafakultas/tambahdata', function () {
            return view('prodi.formMaster.fakultas.tambahdatafakultas', [
                "title" => "prodi-masterData"
            ]);
        });
        Route::get('/datafakultas/updatedata', function () {
            return view('prodi.formMaster.fakultas.updatedatafakultas', [
                "title" => "prodi-masterData"
            ]);
        });

        Route::get('/dataprodi', function () {
            return view('prodi.masterData.masterdataProdi', [
                "title" => "prodi-masterData"
            ]);
        });
        Route::get('/dataprodi/tambahdata', function () {
            return view('prodi.formMaster.prodi.tambahdataprodi', [
                "title" => "prodi-masterData"
            ]);
        });
        Route::get('/dataprodi/updatedata', function () {
            return view('prodi.formMaster.prodi.updatedataprodi', [
                "title" => "prodi-masterData"
            ]);
        });
    });

    Route::prefix('kuliah')->group(function () {
        Route::get('/absensi', function () {
            return view('prodi.kuliah.absensi', [
                "title" => "prodi-kuliah"
            ]);
        });

        Route::get('/nilai', function () {
            return view('prodi.kuliah.nilai', [
                "title" => "prodi-kuliah"
            ]);
        });

        Route::get('/pelanggaran', function () {
            return view('prodi.kuliah.pelanggaran', [
                "title" => "prodi-kuliah"
            ]);
        });
    });
});

Route::prefix('keuangan')->group(function () {
    Route::get('/dashboard', function () {
        return view('keuangan.dashboardKeuangan', [
            "title" => "keuangan-dashboard"
        ]);
    });

    Route::get('/spimandiri', function () {
        return view('keuangan.spiMandiri', [
            "title" => "keuangan-dataSPI"
        ]);
    });

    Route::get('/databeasiswa', function () {
        return view('keuangan.dataBeasiswa', [
            "title" => "keuangan-dataBeasiswa"
        ]);
    });

    Route::get('/piutangmahasiswa', function () {
        return view('keuangan.piutangMahasiswa', [
            "title" => "keuangan-piutang"
        ]);
    });
});

Route::get('/component', function () {
    return view('testComponent');
});

Route::get('/loading', function () {
    return view('testloading');
});

Route::get('/loading2', function () {
    return view('testloading2');
});