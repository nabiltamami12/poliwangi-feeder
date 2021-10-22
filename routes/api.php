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
// Route::post('v1/login', [Ctr\AuthController::class, 'login']);
Route::get('warning', [Ctr\AuthController::class, 'warning'])->name('warning');



Route::prefix('v1')->group(function () {
    // Global data
    Route::get('/globaldataregister/', [Ctr\GlobalController::class, 'pendaftar']);
    Route::get('/globaldata/', [Ctr\GlobalController::class, 'index']);
    Route::get('/globaldata/{id}', [Ctr\GlobalController::class, 'index']);
    Route::get('/list-provinsi', [Ctr\GlobalController::class, 'get_provinsi']);
    Route::get('/list-kabupaten/{id_provinsi}', [Ctr\GlobalController::class, 'get_kabupaten']);
    Route::get('/list-kecamatan/{id_kabupaten}', [Ctr\GlobalController::class, 'get_kecamatan']);
    Route::get('/list-kelurahan/{id_kecamatan}', [Ctr\GlobalController::class, 'get_kelurahan']);
    // Program
    Route::get('/program', [Ctr\ProgramController::class, 'index']);
    // Program
    // Matakuliah jenis
    Route::get('/matkul_jenis', [Ctr\MatakuliahJenisController::class, 'index']);
    // Range Nilai
    Route::get('/rangenilai', [Ctr\RangeNilaiController::class, 'index']);
    Route::get('/rangenilai/history', [Ctr\RangeNilaiController::class, 'history']);
    Route::post('/rangenilai', [Ctr\RangeNilaiController::class, 'store']);
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
    Route::get('/prodi-lama', '\App\Http\Controllers\API\ProdiController@index_lama');
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
    Route::get('/matakuliah/select-option', [Ctr\MatakuliahController::class, 'select_option']);

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
    Route::get('/periode/aktif', '\App\Http\Controllers\API\PeriodeController@aktif');
    Route::put('/periode/change_status/{id}', '\App\Http\Controllers\API\PeriodeController@change_status');
    Route::put('/periode/change_semester/{id}/{semester}', '\App\Http\Controllers\API\PeriodeController@change_semester');
    Route::get('/periode/{id}', '\App\Http\Controllers\API\PeriodeController@show');
    Route::post('/periode', '\App\Http\Controllers\API\PeriodeController@store');
    Route::put('/periode/{id}', '\App\Http\Controllers\API\PeriodeController@update');
    Route::delete('/periode/{id}', '\App\Http\Controllers\API\PeriodeController@destroy');

    //periode
    Route::get('/kurikulum/', '\App\Http\Controllers\API\KurikulumController@index');
    Route::put('/kurikulum/change_status/{id}', '\App\Http\Controllers\API\KurikulumController@change_status');
    Route::get('/kurikulum/{id}', '\App\Http\Controllers\API\KurikulumController@show');
    Route::post('/kurikulum', '\App\Http\Controllers\API\KurikulumController@store');
    Route::put('/kurikulum/{id}', '\App\Http\Controllers\API\KurikulumController@update');
    Route::delete('/kurikulum/{id}', '\App\Http\Controllers\API\KurikulumController@destroy');

    //hariakitfkuliah
    Route::get('/hariaktifkuliah/', '\App\Http\Controllers\API\HariaktifkuliahController@index');
    Route::get('/hariaktifkuliah/{id}&{tahun}', '\App\Http\Controllers\API\HariaktifkuliahController@show');
    Route::post('/hariaktifkuliah', '\App\Http\Controllers\API\HariaktifkuliahController@store');
    Route::post('/hariaktifkuliah/upload', '\App\Http\Controllers\API\HariaktifkuliahController@upload');


    // Mahasiswa
    Route::get('/mahasiswa', [Ctr\MahasiswaController::class, 'index']);
    Route::get('/mahasiswa/select-option', [Ctr\MahasiswaController::class, 'select_option']);
    Route::get('/mahasiswa-lama', [Ctr\MahasiswaController::class, 'index_lama']);
    Route::get('/mahasiswa/{id}', [Ctr\MahasiswaController::class, 'show']);
    Route::get('/mahasiswa/nim/{nim}', [Ctr\MahasiswaController::class, 'by_nim']);
    Route::post('/mahasiswa', [Ctr\MahasiswaController::class, 'store']);
    Route::put('/mahasiswa/{id}', [Ctr\MahasiswaController::class, 'update']);
    Route::delete('/mahasiswa/{id}', [Ctr\MahasiswaController::class, 'destroy']);


    // Dosen Pengampu
    Route::get('/dosenpengampu', [Ctr\DosenPengampuController::class, 'index']);
    Route::get('/dosenpengampu/{id}', [Ctr\DosenPengampuController::class, 'show']);
    Route::post('/dosenpengampu', [Ctr\DosenPengampuController::class, 'store']);
    Route::put('/dosenpengampu/{id}', [Ctr\DosenPengampuController::class, 'update']);
    Route::delete('dosenpengampu/{id}', [Ctr\DosenPengampuController::class, 'destroy']);

    //PERSENTASE NILAI
    Route::get('/persentase-nilai/{id}', '\App\Http\Controllers\API\PersentaseNilaiController@show');
    Route::post('/persentase-nilai', '\App\Http\Controllers\API\PersentaseNilaiController@store');


    //NILAIDOSEN
    Route::get('/nilai/', '\App\Http\Controllers\API\NilaiController@index');
    Route::get('/nilai/rekap', '\App\Http\Controllers\API\NilaiController@rekap');
    Route::get('/nilai/{tahun}&{mk}&{kls}&{prodi}', '\App\Http\Controllers\API\NilaiController@show');
    Route::post('/nilai', '\App\Http\Controllers\API\NilaiController@store');
    Route::put('/nilai/publish', '\App\Http\Controllers\API\NilaiController@publish');
    Route::get('/nilai/get-nim', [Ctr\NilaiController::class, 'get_nim']);
    Route::delete('/nilai/{id}', '\App\Http\Controllers\API\NilaiController@destroy');

    // ABSENSI
    Route::get('/absensi', [Ctr\AbsensiController::class, 'index']);
    Route::get('/absensi/kelas-batal', [Ctr\AbsensiController::class, 'get_batal_kelas']);
    Route::get('/absensi/rekap-matkul', [Ctr\AbsensiController::class, 'rekap_matkul']);
    Route::get('/absensi/rekap-kelas', [Ctr\AbsensiController::class, 'rekap_kelas']);
    Route::get('/absensi/rekap-kelas-mahasiswa', [Ctr\AbsensiController::class, 'rekap_kelas_mahasiswa']);
    Route::get('/absensi/rekap/detail', [Ctr\AbsensiController::class, 'detail_rekap_absensi']);
    Route::get('/absensi/dosen/kelas', [Ctr\AbsensiController::class, 'show_kelas_dosen']);
    Route::get('/absensi/dosen/{id}', [Ctr\AbsensiController::class, 'show_dosen']);
    Route::get('/absensi/home/{id}', [Ctr\AbsensiController::class, 'one']);
    Route::get('/absensi/{id}', [Ctr\AbsensiController::class, 'show']);
    Route::post('/absensi-admin', [Ctr\AbsensiController::class, 'absensi_admin_kelas']);
    Route::post('/absensi', [Ctr\AbsensiController::class, 'store']);
    Route::post('/absensi/dosen', [Ctr\AbsensiController::class, 'absensi_dosen']);
    Route::put('/absensi/admin', [Ctr\AbsensiController::class, 'absensi_admin']);
    Route::put('/absensi/{id}', [Ctr\AbsensiController::class, 'update']);
    Route::delete('/absensi/{id}', [Ctr\AbsensiController::class, 'destroy']);

    // KELAS MENGAJAR
    Route::post('/kelas-mengajar', [Ctr\AbsensiController::class, 'kelas_mengajar']);

    //FILE UPLOAD HARI AKTIF 
    Route::get('/filehari/{nama}', '\App\Http\Controllers\API\HariAktifController@show');
    Route::post('/filehari', '\App\Http\Controllers\API\HariAktifController@store');
    Route::put('/filehari/{nama}', '\App\Http\Controllers\API\HariAktifController@update');
    Route::delete('/filehari/{nama}', '\App\Http\Controllers\API\HariAktifController@destroy');

    //Jalur Pmb
    Route::get('/jalurpmb', '\App\Http\Controllers\API\JalurpmbController@index');
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
    Route::get('/syarat', '\App\Http\Controllers\API\SyaratController@index');
    Route::get('/syarat/{id}', '\App\Http\Controllers\API\SyaratController@show');
    Route::post('/syarat', '\App\Http\Controllers\API\SyaratController@store');
    Route::put('/syarat/{id}', '\App\Http\Controllers\API\SyaratController@update');
    Route::delete('/syarat/{id}', '\App\Http\Controllers\API\SyaratController@destroy');

    Route::get('admin/pendaftar', '\App\Http\Controllers\API\PendaftarController@index');
    Route::put('admin/pendaftar/verifikasi/{id}', '\App\Http\Controllers\API\PendaftarController@verifikasi_pendaftar');
    Route::get('/pendaftar/va', '\App\Http\Controllers\API\PendaftarController@va');
    Route::get('/pendaftar', '\App\Http\Controllers\API\PendaftarController@show');
    Route::post('/pendaftar', '\App\Http\Controllers\API\PendaftarController@store');
    Route::post('/pendaftar/update', '\App\Http\Controllers\API\PendaftarController@update');
    Route::post('/login', [Ctr\PendaftarController::class, 'login']);
    Route::post('/pendaftar/check', [Ctr\PendaftarController::class, 'is_lunas']);
    Route::get('/pendaftar/keuangan', [Ctr\PendaftarController::class, 'keuangan']);
    Route::get('/pendaftar/mahasiswa', [Ctr\PendaftarController::class, 'mahasiswa']);
    // Route::post('/daftar/{id}', '\App\Http\Controllers\API\PendaftarController@update');
    // Route::delete('/daftar/{id}', '\App\Http\Controllers\API\PendaftarController@destroy');

    //jalur_pendaftar
    Route::get('/daftar/{id}', '\App\Http\Controllers\API\JalurpendaftarController@show');
    Route::post('/daftar', '\App\Http\Controllers\API\JalurpendaftarController@store');
    Route::put('/daftar/{id}', '\App\Http\Controllers\API\JalurpendaftarController@update');
    Route::delete('/daftar/{id}', '\App\Http\Controllers\API\JalurpendaftarController@destroy');

    // Rekap Tarif UKT
    Route::get('/keuangan/rekap_ukt', [Ctr\UktController::class, 'index']);
    Route::post('/keuangan/rekap_ukt', [Ctr\UktController::class, 'store']);
    Route::get('/keuangan/rekap_ukt/{id}', [Ctr\UktController::class, 'show']);
    Route::put('/keuangan/rekap_ukt/{id}', [Ctr\UktController::class, 'update']);
    Route::delete('/keuangan/rekap_ukt/{id}', [Ctr\UktController::class, 'destroy']);
    Route::get('/keuangan/detail', [Ctr\UktController::class, 'details']);


    // SPI Mandiri
    Route::post('/keuangan/spi/import', [Ctr\SpiController::class, 'import']);
    Route::get('/keuangan/spi/export/{tahun}/{prodi}', [Ctr\SpiController::class, 'export']);
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

    // Berkas Keuangan
    Route::get('keuangan/list_cicilan', [Ctr\BerkasKeuanganController::class, 'index']);
    Route::get('keuangan/stats', [Ctr\BerkasKeuanganController::class, 'statistik']);
    Route::get('keuangan/detail-piutang/{id}', [Ctr\BerkasKeuanganController::class, 'detail_piutang']);
    Route::post('keuangan/pengajuan-cicilan', [Ctr\BerkasKeuanganController::class, 'store']);
    Route::get('keuangan/approve/{id}', [Ctr\BerkasKeuanganController::class, 'approve']);
    Route::post('keuangan/perjanjian', [Ctr\BerkasKeuanganController::class, 'perjanjian']);
    Route::post('keuangan/cicilan/{id}', [Ctr\BerkasKeuanganController::class, 'detail_cicilan']);
    Route::post('keuangan/template-perjanjian', [Ctr\BerkasKeuanganController::class, 'template_perjanjian']);
    Route::get('keuangan/template-perjanjian', [Ctr\BerkasKeuanganController::class, 'check_template_perjanjian']);
    Route::get('download/template-perjanjian', [Ctr\BerkasKeuanganController::class, 'download_template_perjanjian']);

    Route::get('/keuangan/rekapitulasi/penyisihanpiutang', [Ctr\BerkasKeuanganController::class, 'penyisihanpiutang']);
    Route::get('/keuangan/export/rekap-piutang', [Ctr\BerkasKeuanganController::class, 'export_piutang']);

    // Riwayat Pembayaran
    Route::post('/keuangan/upload-buku-besar', [Ctr\BerkasKeuanganController::class, 'upload_buku_besar']);
    Route::get('/keuangan/riwayat-pembayaran', [Ctr\RiwayatPembayaranController::class, 'index']);
    

    // example use bni api
    Route::get('/test', [Ctr\MahasiswaController::class, 'create_va']);
    Route::post('/test/{id}', [Ctr\BerkasKeuanganController::class, 'detail_cicilan']);



});

Route::prefix('v1')->middleware('auth:api')->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
});