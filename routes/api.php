<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API as Ctr;
use Illuminate\Support\Facades\Request;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Misc
Route::post('v1/register', [Ctr\AuthController::class, 'register']);
Route::post('v1/login', [Ctr\AuthController::class, 'login']);
Route::get('warning', [Ctr\AuthController::class, 'warning'])->name('warning');



Route::prefix('v1')->group(function () {
    // Global data
    Route::get('/globaldata/', [Ctr\GlobalController::class, 'index']);
    Route::get('/globaldata/{id}', [Ctr\GlobalController::class, 'index']);
    // Program
    Route::get('/program', [Ctr\ProgramController::class, 'index']);
    // Program
    // Matakuliah jenis
    Route::get('/matkul_jenis', [Ctr\MatakuliahJenisController::class, 'index']);
    // Range Nilai
    Route::get('/rangenilai', [Ctr\RangeNilaiController::class, 'index']);
    Route::get('/rangenilai/{id}', [Ctr\RangeNilaiController::class, 'show']);
    Route::post('/rangenilai', [Ctr\RangeNilaiController::class, 'store']);
    Route::put('/rangenilai/{id}', [Ctr\RangeNilaiController::class, 'update']);
    Route::delete('/rangenilai/{id}', [Ctr\RangeNilaiController::class, 'destroy']);
    // Jurusan
    Route::get('/jurusan', [Ctr\JurusanController::class, 'index']);
    Route::get('/jurusan/{id}', [Ctr\JurusanController::class, 'show']);
    Route::post('/jurusan', [Ctr\JurusanController::class, 'store']);
    Route::put('/jurusan/{id}', [Ctr\JurusanController::class, 'update']);
    Route::delete('/jurusan/{id}', [Ctr\JurusanController::class, 'destroy']);
    // Kelas
    Route::get('/kelas', [Ctr\KelasController::class, 'index']);
    Route::get('/kelas/dosen/{id}', [Ctr\KelasController::class, 'dosen']);
    Route::get('/kelas/{id}', [Ctr\KelasController::class, 'show']);
    Route::post('/kelas', [Ctr\KelasController::class, 'store']);
    Route::put('/kelas/{id}', [Ctr\KelasController::class, 'update']);
    Route::delete('/kelas/{id}', [Ctr\KelasController::class, 'destroy']);

    //Jamkuliah
    Route::get('/jamkuliah/', '\App\Http\Controllers\API\JamkuliahController@index');
    Route::get('/jamkuliah/{id}', '\App\Http\Controllers\API\JamkuliahController@show');
    Route::post('/jamkuliah', '\App\Http\Controllers\API\JamkuliahController@store');
    Route::put('/jamkuliah/{id}', '\App\Http\Controllers\API\JamkuliahController@update');
    Route::delete('/jamkuliah/{id}', '\App\Http\Controllers\API\JamkuliahController@destroy');

    //prodi
    Route::get('/prodi', '\App\Http\Controllers\API\ProdiController@index');
    Route::get('/prodi/{id}', '\App\Http\Controllers\API\ProdiController@show');
    Route::post('/prodi', '\App\Http\Controllers\API\ProdiController@store');
    Route::put('/prodi/{id}', '\App\Http\Controllers\API\ProdiController@update');
    Route::delete('/prodi/{id}', '\App\Http\Controllers\API\ProdiController@destroy');

    //ruangan
    Route::get('/ruangan', '\App\Http\Controllers\API\RuanganController@index');
    Route::get('/ruangan/{id}', '\App\Http\Controllers\API\RuanganController@show');
    Route::post('/ruangan', '\App\Http\Controllers\API\RuanganController@store');
    Route::put('/ruangan/{id}', '\App\Http\Controllers\API\RuanganController@update');
    Route::delete('/ruangan/{id}', '\App\Http\Controllers\API\RuanganController@destroy');

    // Dosen
    Route::get('dosen/filter/{id}/{semester}', [Ctr\DosenController::class, 'filter']);


    //matakuliah
    Route::get('/matakuliah/', '\App\Http\Controllers\API\MatakuliahController@index');
    Route::get('/matakuliah/{id}', '\App\Http\Controllers\API\MatakuliahController@show');
    Route::post('/matakuliah', '\App\Http\Controllers\API\MatakuliahController@store');
    Route::put('/matakuliah/{id}', '\App\Http\Controllers\API\MatakuliahController@update');
    Route::delete('/matakuliah/{id}', '\App\Http\Controllers\API\MatakuliahController@destroy');

    // Dosen Matkul
    Route::get('/dosenmk', [Ctr\DosenMatkulController::class, 'index']);
    Route::get('/dosenmk/{id}', [Ctr\DosenMatkulController::class, 'show']);
    Route::post('/dosenmk', [Ctr\DosenMatkulController::class, 'store']);
    Route::put('/dosenmk/{id}', [Ctr\DosenMatkulController::class, 'update']);
    Route::delete('dosenmk/{id}', [Ctr\DosenMatkulController::class, 'destroy']);

    //periode
    Route::get('/periode/', '\App\Http\Controllers\API\PeriodeController@index');
    Route::put('/periode/change_status/{id}', '\App\Http\Controllers\API\PeriodeController@change_status');
    Route::put('/periode/change_semester/{id}/{semester}', '\App\Http\Controllers\API\PeriodeController@change_semester');
    Route::get('/periode/{id}', '\App\Http\Controllers\API\PeriodeController@show');
    Route::post('/periode', '\App\Http\Controllers\API\PeriodeController@store');
    Route::put('/periode/{id}', '\App\Http\Controllers\API\PeriodeController@update');
    Route::delete('/periode/{id}', '\App\Http\Controllers\API\PeriodeController@destroy');

    //hariakitfkuliah
    Route::get('/hariaktifkuliah/', '\App\Http\Controllers\API\HariaktifkuliahController@index');
    Route::get('/hariaktifkuliah/{id}&{tahun}', '\App\Http\Controllers\API\HariaktifkuliahController@show');
    Route::post('/hariaktifkuliah', '\App\Http\Controllers\API\HariaktifkuliahController@store');
    Route::post('/hariaktifkuliah/upload', '\App\Http\Controllers\API\HariaktifkuliahController@upload');


    // Mahasiswa
    Route::get('/mahasiswa', [Ctr\MahasiswaController::class, 'index']);
    Route::get('/mahasiswa/{id}', [Ctr\MahasiswaController::class, 'show']);
    Route::post('/mahasiswa', [Ctr\MahasiswaController::class, 'store']);
    Route::put('/mahasiswa/{id}', [Ctr\MahasiswaController::class, 'update']);
    Route::delete('/mahasiswa/{id}', [Ctr\MahasiswaController::class, 'destroy']);


    // Dosen Pengampu
    Route::get('/dosenpengampu', [Ctr\DosenPengampuController::class, 'index']);
    Route::get('/dosenpengampu/{id}', [Ctr\DosenPengampuController::class, 'show']);
    Route::post('/dosenpengampu', [Ctr\DosenPengampuController::class, 'store']);
    Route::put('/dosenpengampu/{id}', [Ctr\DosenPengampuController::class, 'update']);
    Route::delete('dosenpengampu/{id}', [Ctr\DosenPengampuController::class, 'destroy']);

    //NILAIDOSEN
    Route::get('/nilai/', '\App\Http\Controllers\API\NilaiController@index');
    Route::get('/nilai/rekap', '\App\Http\Controllers\API\NilaiController@rekap');
    Route::get('/nilai/{tahun}&{mk}&{kls}&{prodi}', '\App\Http\Controllers\API\NilaiController@show');
    Route::post('/nilai', '\App\Http\Controllers\API\NilaiController@store');
    Route::put('/nilai/publish', '\App\Http\Controllers\API\NilaiController@publish');
    Route::delete('/nilai/{id}', '\App\Http\Controllers\API\NilaiController@destroy');

    // ABSENSI
    Route::get('/absensi', [Ctr\AbsensiController::class, 'index']);
    Route::get('/absensi/rekap-matkul', [Ctr\AbsensiController::class, 'rekap_matkul']);
    Route::get('/absensi/rekap-kelas', [Ctr\AbsensiController::class, 'rekap_kelas']);
    Route::get('/absensi/cetak-kelas', [Ctr\AbsensiController::class, 'cetak_kelas']);
    Route::get('/absensi/rekap/detail', [Ctr\AbsensiController::class, 'detail_rekap_absensi']);
    Route::get('/absensi/dosen/{id}', [Ctr\AbsensiController::class, 'show_dosen']);
    Route::get('/absensi/home/{id}', [Ctr\AbsensiController::class, 'one']);
    Route::get('/absensi/{id}', [Ctr\AbsensiController::class, 'show']);
    Route::post('/absensi', [Ctr\AbsensiController::class, 'store']);
    Route::post('/absensi/dosen', [Ctr\AbsensiController::class, 'absensi_dosen']);
    Route::put('/absensi/admin', [Ctr\AbsensiController::class, 'absensi_admin']);
    Route::put('/absensi/{id}', [Ctr\AbsensiController::class, 'update']);
    Route::delete('/absensi/{id}', [Ctr\AbsensiController::class, 'destroy']);

    //FILE UPLOAD HARI AKTIF 
    Route::get('/filehari/{nama}', '\App\Http\Controllers\API\HariAktifController@show');
    Route::post('/filehari', '\App\Http\Controllers\API\HariAktifController@store');
    Route::put('/filehari/{nama}', '\App\Http\Controllers\API\HariAktifController@update');
    Route::delete('/filehari/{nama}', '\App\Http\Controllers\API\HariAktifController@destroy');

    //Jalur Pmb
    Route::get('/jalurpmb/{id}', '\App\Http\Controllers\API\JalurpmbController@show');
    Route::post('/jalurpmb', '\App\Http\Controllers\API\JalurpmbController@store');
    Route::put('/jalurpmb/{pmb}', '\App\Http\Controllers\API\JalurpmbController@update');
    Route::delete('/jalurpmb/{id}', '\App\Http\Controllers\API\JalurpmbController@destroy');

    //JURUSAN PILIHAN
    Route::get('/jurusanpilihan/{id}', '\App\Http\Controllers\API\JurusanpilihanController@show');
    Route::get('/jurusanpilihan', '\App\Http\Controllers\API\JurusanpilihanController@index');
    Route::post('/jurusanpilihan', '\App\Http\Controllers\API\JurusanpilihanController@store');
    Route::put('/jurusanpilihan/{id}', '\App\Http\Controllers\API\JurusanpilihanController@update');
    Route::delete('/jurusanpilihan/{id}', '\App\Http\Controllers\API\JurusanpilihanController@destroy');

    //syarat
    Route::get('/syarat/{id}', '\App\Http\Controllers\API\SyaratController@show');
    Route::post('/syarat', '\App\Http\Controllers\API\SyaratController@store');
    Route::put('/syarat/{id}', '\App\Http\Controllers\API\SyaratController@update');
    Route::delete('/syarat/{id}', '\App\Http\Controllers\API\SyaratController@destroy');

    //jalur_pendaftar
    Route::get('/daftar/{id}', '\App\Http\Controllers\API\PendaftarController@show');
    Route::post('/daftar', '\App\Http\Controllers\API\PendaftarController@store');
    Route::post('/daftar/{id}', '\App\Http\Controllers\API\PendaftarController@update');
    Route::delete('/daftar/{id}', '\App\Http\Controllers\API\PendaftarController@destroy');
    
    // Rekap Tarif UKT
    Route::get('/keuangan/rekap_ukt', [Ctr\UktController::class, 'index']);
    Route::post('/keuangan/rekap_ukt', [Ctr\UktController::class, 'store']);
    Route::get('/keuangan/rekap_ukt/{id}', [Ctr\UktController::class, 'show']);
    Route::put('/keuangan/rekap_ukt/{id}', [Ctr\UktController::class, 'update']);
    Route::delete('/keuangan/rekap_ukt/{id}', [Ctr\UktController::class, 'destroy']);


    // SPI Mandiri
    Route::post('/keuangan/spi/import', [Ctr\SpiController::class, 'import']);
    Route::get('/keuangan/spi/export', [Ctr\SpiController::class, 'export']);
    Route::get('/keuangan/spi', [Ctr\SpiController::class, 'index']);
    Route::get('/keuangan/spi/{id}', [Ctr\SpiController::class, 'show']);

    //berkas
    Route::get('/berkas/{id}', '\App\Http\Controllers\API\BerkasController@show');
    Route::post('/berkas', '\App\Http\Controllers\API\BerkasController@store');
    Route::post('/berkas/{id}', '\App\Http\Controllers\API\BerkasController@update');
    Route::delete('/berkas/{id}', '\App\Http\Controllers\API\BerkasController@destroy');

    // Generate Nomor VA <!-- Gunakan route Post --!>
    Route::get('/nomor_va', [Ctr\NovaController::class, 'index']);
    Route::post('/nomor_va', [Ctr\NovaController::class, 'store']);

    // Setting Biaya
    Route::get('setting_biaya', [Ctr\SettingBiayaController::class, 'index']);
    Route::post('setting_biaya', [Ctr\SettingBiayaController::class, 'store']);


    // example use bni api
    Route::get('/test', [Ctr\MahasiswaController::class, 'create_va']);
});

Route::prefix('v1')->middleware('auth:api')->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
});
