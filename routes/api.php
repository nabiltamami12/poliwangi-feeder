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
    Route::get('/program-mahasiswa', [Ctr\ProgramController::class, 'program_mahasiswa']);
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
    Route::get('/jurusan-mahasiswa', [Ctr\JurusanController::class, 'jurusan_mahasiswa']);
    // Jurusan Asal
    Route::get('/jurusan-asal', [Ctr\JurusanAsalController::class, 'index']);
    Route::get('/jurusan-asal/{id}', [Ctr\JurusanAsalController::class, 'show']);
    Route::post('/jurusan-asal', [Ctr\JurusanAsalController::class, 'store']);
    Route::put('/jurusan-asal/{id}', [Ctr\JurusanAsalController::class, 'update']);
    Route::delete('/jurusan-asal/{id}', [Ctr\JurusanAsalController::class, 'destroy']);

    // Jurusan Linear
    Route::get('/jurusan-linear/{id}', [Ctr\JurusanAsalController::class, 'jurusan_linear']);
    Route::post('/jurusan-linear/{id}', [Ctr\JurusanAsalController::class, 'update_jurusan_linear']);

    // Kelas
    Route::get('/kelas', [Ctr\KelasController::class, 'index']);
    Route::get('/kelas/dosen/{id}', [Ctr\KelasController::class, 'dosen']);
    Route::get('/kelas/{id}', [Ctr\KelasController::class, 'show']);
    Route::post('/kelas', [Ctr\KelasController::class, 'store']);
    Route::put('/kelas/{id}', [Ctr\KelasController::class, 'update']);
    Route::delete('/kelas/{id}', [Ctr\KelasController::class, 'destroy']);

    //Jamkuliah
    Route::get('/jamkuliah/', [Ctr\JamkuliahController::class, 'index']);
    Route::get('/jamkuliah/{id}', [Ctr\JamkuliahController::class, 'show']);
    Route::post('/jamkuliah', [Ctr\JamkuliahController::class, 'store']);
    Route::put('/jamkuliah/{id}', [Ctr\JamkuliahController::class, 'update']);
    Route::delete('/jamkuliah/{id}', [Ctr\JamkuliahController::class, 'destroy']);

    //prodi
    Route::get('/prodi', [Ctr\ProdiController::class, 'index']);
    Route::get('/prodi-lama', [Ctr\ProdiController::class, 'index_lama']);
    Route::get('/prodi/{id}', [Ctr\ProdiController::class, 'show']);
    Route::post('/prodi', [Ctr\ProdiController::class, 'store']);
    Route::put('/prodi/{id}', [Ctr\ProdiController::class, 'update']);
    Route::delete('/prodi/{id}', [Ctr\ProdiController::class, 'destroy']);
    Route::get('/prodi-mahasiswa', [Ctr\ProdiController::class, 'prodi_mahasiswa']);

    //ruangan
    Route::get('/ruangan', [Ctr\RuanganController::class, 'index']);
    Route::get('/ruangan/{id}', [Ctr\RuanganController::class, 'show']);
    Route::post('/ruangan', [Ctr\RuanganController::class, 'store']);
    Route::put('/ruangan/{id}', [Ctr\RuanganController::class, 'update']);
    Route::delete('/ruangan/{id}', [Ctr\RuanganController::class, 'destroy']);

    // Dosen
    Route::get('dosen/filter/{id}/{semester}', [Ctr\DosenController::class, 'filter']);


    //matakuliah
    Route::get('/matakuliah/select-option', [Ctr\MatakuliahController::class, 'select_option']);

    Route::get('/matakuliah/', [Ctr\MatakuliahController::class, 'index']);
    Route::get('/matakuliah/{id}', [Ctr\MatakuliahController::class, 'show']);
    Route::post('/matakuliah', [Ctr\MatakuliahController::class, 'store']);
    Route::put('/matakuliah/{id}', [Ctr\MatakuliahController::class, 'update']);
    Route::delete('/matakuliah/{id}', [Ctr\MatakuliahController::class, 'destroy']);

    // Dosen Matkul
    Route::get('/dosenmk', [Ctr\DosenMatkulController::class, 'index']);
    Route::get('/dosenmk/{id}', [Ctr\DosenMatkulController::class, 'show']);
    Route::post('/dosenmk', [Ctr\DosenMatkulController::class, 'store']);
    Route::put('/dosenmk/{id}', [Ctr\DosenMatkulController::class, 'update']);
    Route::delete('dosenmk/{id}', [Ctr\DosenMatkulController::class, 'destroy']);

    //periode
    Route::get('/periode/', [Ctr\PeriodeController::class, 'index']);
    Route::get('/periode/aktif', [Ctr\PeriodeController::class, 'aktif']);
    Route::put('/periode/change_status/{id}', [Ctr\PeriodeController::class, 'change_status']);
    Route::put('/periode/change_semester/{id}/{semester}', [Ctr\PeriodeController::class, 'change_semester']);
    Route::get('/periode/{id}', [Ctr\PeriodeController::class, 'show']);
    Route::post('/periode', [Ctr\PeriodeController::class, 'store']);
    Route::put('/periode/{id}', [Ctr\PeriodeController::class, 'update']);
    Route::delete('/periode/{id}', [Ctr\PeriodeController::class, 'destroy']);

    //periode
    Route::get('/kurikulum/', '\App\Http\Controllers\API\KurikulumController@index');
    Route::put('/kurikulum/change_status/{id}', '\App\Http\Controllers\API\KurikulumController@change_status');
    Route::get('/kurikulum/{id}', '\App\Http\Controllers\API\KurikulumController@show');
    Route::get('/kurikulum/{id}/matakuliah', '\App\Http\Controllers\API\KurikulumController@matakuliah');
    Route::post('/kurikulum/{id}/matakuliah', '\App\Http\Controllers\API\KurikulumController@tambahMatkul');
    Route::post('/kurikulum', '\App\Http\Controllers\API\KurikulumController@store');
    Route::put('/kurikulum/{id}', '\App\Http\Controllers\API\KurikulumController@update');
    Route::delete('/kurikulum/{id}', '\App\Http\Controllers\API\KurikulumController@destroy');
    Route::delete('/kurikulum/matakuliah/{id}', '\App\Http\Controllers\API\KurikulumController@deleteMatkul');

    //hariakitfkuliah
    Route::get('/hariaktifkuliah/', [Ctr\HariaktifkuliahController::class, 'index']);
    Route::get('/hariaktifkuliah/{id}&{tahun}', [Ctr\HariaktifkuliahController::class, 'show']);
    Route::post('/hariaktifkuliah', [Ctr\HariaktifkuliahController::class, 'store']);
    Route::post('/hariaktifkuliah/upload', [Ctr\HariaktifkuliahController::class, 'upload']);


    // Mahasiswa
    Route::get('/mahasiswa', [Ctr\MahasiswaController::class, 'index']);
    Route::get('/mahasiswa/select-option', [Ctr\MahasiswaController::class, 'select_option']);
    Route::get('/mahasiswa-lama', [Ctr\MahasiswaController::class, 'index_lama']);
    Route::get('/mahasiswa/{id}', [Ctr\MahasiswaController::class, 'show']);
    Route::get('/mahasiswa/nim/{nim}', [Ctr\MahasiswaController::class, 'by_nim']);
    Route::post('/mahasiswa', [Ctr\MahasiswaController::class, 'store']);
    Route::put('/mahasiswa/{id}', [Ctr\MahasiswaController::class, 'update']);
    Route::delete('/mahasiswa/{id}', [Ctr\MahasiswaController::class, 'destroy']);
    Route::get('/mahasiswa-angkatan', [Ctr\MahasiswaController::class, 'mahasiswa_angkatan']);
    Route::get('/mahasiswa-kelas', [Ctr\MahasiswaController::class, 'mahasiswa_kelas']);
    Route::get('/mahasiswa-export', [Ctr\MahasiswaController::class, 'mahasiswa_export']);


    // Dosen Pengampu
    Route::get('/dosenpengampu', [Ctr\DosenPengampuController::class, 'index']);
    Route::get('/dosenpengampu/{id}', [Ctr\DosenPengampuController::class, 'show']);
    Route::post('/dosenpengampu', [Ctr\DosenPengampuController::class, 'store']);
    Route::put('/dosenpengampu/{id}', [Ctr\DosenPengampuController::class, 'update']);
    Route::delete('dosenpengampu/{id}', [Ctr\DosenPengampuController::class, 'destroy']);

    //PERSENTASE NILAI
    Route::get('/persentase-nilai/{id}', [Ctr\PersentaseNilaiController::class, 'show']);
    Route::post('/persentase-nilai', [Ctr\PersentaseNilaiController::class, 'store']);


    //NILAIDOSEN
    Route::get('/nilai/', [Ctr\NilaiController::class, 'index']);
    Route::get('/nilai/rekap', [Ctr\NilaiController::class, 'rekap']);
    Route::get('/nilai/{tahun}&{mk}&{kls}&{prodi}', [Ctr\NilaiController::class, 'show']);
    Route::post('/nilai', [Ctr\NilaiController::class, 'store']);
    Route::put('/nilai/publish', [Ctr\NilaiController::class, 'publish']);
    Route::get('/nilai/get-nim', [Ctr\NilaiController::class, 'get_nim']);
    Route::delete('/nilai/{id}', [Ctr\NilaiController::class, 'destroy']);

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

    // ABSENSI DOSEN
    Route::get('/absensi-dosen/rekap', [Ctr\AbsensiDosenController::class, 'list_data']);
    Route::get('/absensi-dosen/list-tahun', [Ctr\AbsensiDosenController::class, 'tahun_kelas_mengajar']);
    Route::get('/absensi-dosen/rekap-presensi/{id_dosen}', [Ctr\AbsensiDosenController::class, 'pertemuan_dosen']);
    Route::post('/absensi-dosen/simpan', [Ctr\AbsensiDosenController::class, 'simpan']);

    // ABSENSI PEGAWAI
    Route::get('/absensi-pegawai/rekap', [Ctr\AbsensiPegawaiController::class, 'list_data']);
    Route::get('/absensi-pegawai/rekap/{id_pegawai}/{tahun}/{bulan}', [Ctr\AbsensiPegawaiController::class, 'detail_presensi']);
    Route::get('/absensi-pegawai/rekap/keamanan/{id_pegawai}/{tahun}/{bulan}', [Ctr\AbsensiPegawaiController::class, 'detail_presensi_keamanan']);

    // KELAS MENGAJAR
    Route::post('/kelas-mengajar', [Ctr\AbsensiController::class, 'kelas_mengajar']);

    //FILE UPLOAD HARI AKTIF
    Route::get('/filehari/{nama}', [Ctr\HariAktifController::class, 'show']);
    Route::post('/filehari', [Ctr\HariAktifController::class, 'store']);
    Route::put('/filehari/{nama}', [Ctr\HariAktifController::class, 'update']);
    Route::delete('/filehari/{nama}', [Ctr\HariAktifController::class, 'destroy']);

    //Jalur Pmb
    Route::get('/jalurpmb', [Ctr\JalurpmbController::class, 'index']);
    Route::get('/jalurpmb-register', [Ctr\JalurpmbController::class, 'get_register']);
    Route::get('/jalurpmb/{id}', [Ctr\JalurpmbController::class, 'show']);
    Route::post('/jalurpmb', [Ctr\JalurpmbController::class, 'store']);
    Route::put('/jalurpmb/{pmb}', [Ctr\JalurpmbController::class, 'update']);
    Route::delete('/jalurpmb/{id}', [Ctr\JalurpmbController::class, 'destroy']);

    //JURUSAN PILIHAN
    Route::get('/jurusanpilihan/{id}', [Ctr\JurusanpilihanController::class, 'show']);
    Route::get('/jurusanpilihan', [Ctr\JurusanpilihanController::class, 'index']);
    Route::post('/jurusanpilihan', [Ctr\JurusanpilihanController::class, 'store']);
    Route::put('/jurusanpilihan/{id}', [Ctr\JurusanpilihanController::class, 'update']);
    Route::delete('/jurusanpilihan/{id}', [Ctr\JurusanpilihanController::class, 'destroy']);
    //syarat
    Route::get('/syarat', [Ctr\SyaratController::class, 'index']);
    Route::get('/syarat-pendaftar', [Ctr\SyaratController::class,'get_syarat_pendaftar']);
    Route::get('/syarat/{id}', [Ctr\SyaratController::class, 'show']);
    Route::post('/syarat', [Ctr\SyaratController::class, 'store']);
    Route::put('/syarat/{id}', [Ctr\SyaratController::class, 'update']);
    Route::delete('/syarat/{id}', [Ctr\SyaratController::class, 'destroy']);

    // DASHBOARD
    Route::get('admin/dashboard/', [Ctr\DashboardController::class, 'index_admin']);
    Route::get('akademik/dashboard/', [Ctr\DashboardController::class, 'index_akademik']);


    // PENDAFTAR
    Route::get('pendaftar/dashboard', [Ctr\PendaftarController::class, 'dashboard']);
    Route::get('admin/pendaftar-konfirmasi/{id}', [Ctr\PendaftarController::class, 'konfirmasi_pendaftar']);

    Route::get('admin/pendaftar', [Ctr\PendaftarController::class, 'index']);
    Route::get('admin/pendaftar/generate-nim', [Ctr\PendaftarController::class, 'get_prodi_nim']);
    Route::get('admin/pendaftar/list-generate-nim', [Ctr\PendaftarController::class, 'list_generate_nim']);
    Route::put('admin/pendaftar/verifikasi/{id}', [Ctr\PendaftarController::class, 'verifikasi_pendaftar']);
    Route::get('/pendaftar/va', [Ctr\PendaftarController::class, 'va']);
    Route::get('/pendaftar', [Ctr\PendaftarController::class, 'show']);
    Route::post('/pendaftar', [Ctr\PendaftarController::class, 'store']);
    Route::post('/pendaftar/update', [Ctr\PendaftarController::class, 'update']);
    Route::post('/pendaftar/update-berkas', [Ctr\PendaftarController::class, 'update_berkas']);
    Route::post('/login', [Ctr\PendaftarController::class, 'login']);
    Route::post('/pendaftar/check', [Ctr\PendaftarController::class, 'is_lunas']);
    Route::post('/pendaftar/keuangan', [Ctr\PendaftarController::class, 'keuangan']);
    Route::get('/pendaftar/mahasiswa', [Ctr\PendaftarController::class, 'mahasiswa']);
    Route::post('admin/pendaftar/generate-nim', [Ctr\PendaftarController::class, 'generate_nim']);
    // Route::post('/daftar/{id}', [Ctr\PendaftarController::class, 'update']);
    // Route::delete('/daftar/{id}', [Ctr\PendaftarController::class, 'destroy']);

    //jalur_pendaftar
    Route::get('/daftar/{id}', [Ctr\JalurpendaftarController::class, 'show']);
    Route::post('/daftar', [Ctr\JalurpendaftarController::class, 'store']);
    Route::put('/daftar/{id}', [Ctr\JalurpendaftarController::class, 'update']);
    Route::delete('/daftar/{id}', [Ctr\JalurpendaftarController::class, 'destroy']);

    // Rekap Tarif UKT
    Route::get('/keuangan/rekap_ukt', [Ctr\UktController::class, 'index']);
    Route::post('/keuangan/rekap_ukt', [Ctr\UktController::class, 'store']);
    Route::get('/keuangan/rekap_ukt/{id}', [Ctr\UktController::class, 'show']);
    Route::put('/keuangan/rekap_ukt/{id}', [Ctr\UktController::class, 'update']);
    Route::delete('/keuangan/rekap_ukt/{id}', [Ctr\UktController::class, 'destroy']);
    Route::get('/keuangan/detail', [Ctr\UktController::class, 'details']);
    Route::put('/keuangan/set-ukt/{id}', [Ctr\UktController::class, 'set_ukt_mahasiswa']);
    Route::post('keuangan/atur-mahasiswa', [Ctr\UktController::class, 'atur_mahasiswa']); //keuangan/rekapitulasi/datamahasiswa
    Route::get('/keuangan/rangkuman/{id}', [Ctr\UktController::class, 'rangkuman']);


    // SPI Mandiri
    Route::post('/keuangan/spi/import', [Ctr\SpiController::class, 'import']);
    Route::get('/keuangan/spi/export/{prodi}', [Ctr\SpiController::class, 'export']);
    Route::post('/keuangan/spi', [Ctr\SpiController::class, 'index']);
    Route::get('/keuangan/spi/{id}', [Ctr\SpiController::class, 'show']);

    //berkas
    Route::get('/berkas/{id}', [Ctr\BerkasController::class, 'show']);
    Route::post('/berkas', [Ctr\BerkasController::class, 'store']);
    Route::post('/berkas_update', [Ctr\BerkasController::class, 'update']);
    Route::delete('/berkas/{id}', [Ctr\BerkasController::class, 'destroy']);

    // Generate Nomor VA <!-- Gunakan route Post --!>
    Route::get('/nomor_va', [Ctr\NovaController::class, 'index']);
    Route::post('/nomor_va', [Ctr\NovaController::class, 'store']);

    // Setting Biaya
    Route::get('setting_biaya', [Ctr\SettingBiayaController::class, 'index']);
    Route::post('setting_biaya', [Ctr\SettingBiayaController::class, 'store']);

    // Berkas Keuangan
    Route::post('keuangan/list-cicilan', [Ctr\BerkasKeuanganController::class, 'index']);
    Route::get('keuangan/stats', [Ctr\BerkasKeuanganController::class, 'statistik']);
    Route::get('keuangan/detail-piutang/{id}', [Ctr\BerkasKeuanganController::class, 'detail_piutang']);
    Route::post('keuangan/pengajuan-cicilan', [Ctr\BerkasKeuanganController::class, 'store']);
    Route::get('keuangan/approve/{id}', [Ctr\BerkasKeuanganController::class, 'approve']);
    Route::post('keuangan/perjanjian', [Ctr\BerkasKeuanganController::class, 'perjanjian']);
    Route::post('keuangan/cicilan/{id}', [Ctr\BerkasKeuanganController::class, 'detail_cicilan']);
    Route::post('keuangan/template-perjanjian', [Ctr\BerkasKeuanganController::class, 'template_perjanjian']);
    Route::get('keuangan/template-perjanjian', [Ctr\BerkasKeuanganController::class, 'check_template_perjanjian']);
    Route::get('download/template-perjanjian', [Ctr\BerkasKeuanganController::class, 'download_template_perjanjian']);
    Route::post('keuangan/cicilan-piutang', [Ctr\BerkasKeuanganController::class, 'cicilan_piutang']);
    Route::post('keuangan/update-jatuh-tempo', [Ctr\BerkasKeuanganController::class, 'update_jatuh_tempo']);
    Route::post('keuangan/dokumen-piutang', [Ctr\BerkasKeuanganController::class, 'dokumen_mahasiswa']);
    Route::get('keuangan/dokumen-piutang/{id}', [Ctr\BerkasKeuanganController::class, 'dokumen_piutang_mahasiswa']);
    Route::get('download/dokumen-piutang/{id}/{tipe}', [Ctr\BerkasKeuanganController::class, 'download_dokumen_piutang']);

    Route::post('keuangan/tagihan-mahasiswa', [Ctr\BerkasKeuanganController::class, 'mahasiswa_pembayaran_tagihan']); //mahasiswa/pembayaran, termasuk generate va

    Route::get('/keuangan/rekapitulasi/penyisihanpiutang', [Ctr\BerkasKeuanganController::class, 'penyisihanpiutang']);
    Route::get('/keuangan/export/rekap-piutang', [Ctr\BerkasKeuanganController::class, 'export_piutang']);

    // Riwayat Pembayaran
    Route::post('/keuangan/upload-riwayat', [Ctr\BerkasKeuanganController::class, 'upload_riwayat']);
    Route::post('/keuangan/upload-riwayat-cicilan', [Ctr\BerkasKeuanganController::class, 'upload_riwayat_cicilan']);
    Route::post('/keuangan/riwayat-pembayaran', [Ctr\RiwayatPembayaranController::class, 'index']);


    // example use bni api
    Route::get('/test', [Ctr\MahasiswaController::class, 'create_va']);
    Route::post('/test/{id}', [Ctr\BerkasKeuanganController::class, 'detail_cicilan']);


    // Kepegawaian Jabatan Struktural
    Route::get('/getJabatan', [Ctr\JabatanStrukturalController::class, 'getJabatan']);
    Route::post('/jabatan-struktural', [Ctr\JabatanStrukturalController::class, 'store']);
    Route::get('/jabatan-struktural/{id}/edit', [Ctr\JabatanStrukturalController::class, 'edit']);
    Route::put('/jabatan-struktural/{id}', [Ctr\JabatanStrukturalController::class, 'update']);
    Route::delete('/jabatan-struktural/{id}', [Ctr\JabatanStrukturalController::class, 'destroy']);

    // Kepegawaian Data Struktural
    Route::get('/getData', [Ctr\DataStrukturalController::class, 'getData']);
    Route::get('/getDataStruktural', [Ctr\DataStrukturalController::class, 'getDataStruktural']);
    Route::get('/data-struktural/{id}/detail', [Ctr\DataStrukturalController::class, 'show']);
    Route::post('/data-struktural', [Ctr\DataStrukturalController::class, 'store']);
    Route::get('/data-struktural/{id}/edit', [Ctr\DataStrukturalController::class, 'edit']);
    Route::put('/data-struktural/{id}', [Ctr\DataStrukturalController::class, 'update']);
    Route::delete('/data-struktural/{id}', [Ctr\DataStrukturalController::class, 'destroy']);

});

Route::prefix('v1')->middleware('auth:api')->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
});
