<?php

Route::get('/component', function () {
    return view('testingKomponen.testComponent');
});

Route::get('/document', function () {
    return view('testingKomponen.document');
});

Route::get('/absensiperkuliahan', function () {
    return view('testingKomponen.documentAbsensiPerkuliahan');
});


Route::get('/loading', function () {
    return view('testingKomponen.testloading');
});

Route::get('/loading2', function () {
    return view('testingKomponen.testloading2');
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
});

Route::prefix('mahasiswalama')->group(function () {
    Route::get('/dashboard', function () {
        return view('mahasiswaLama.dashboardMahasiswa', [
            "title" => "Dashboard"
        ]);
    });

    Route::get('/pembayaran', function () {
        return view('mahasiswaLama.pembayaran', [
            "title" => "Pembayaran"
        ]);
    });

    Route::get('/presensi', function () {
        return view('mahasiswaLama.presensi', [
            "title" => "Presensi"
        ]);
    });

    Route::prefix('penilaian')->group(function () {
        Route::get('/nilaisemester', function () {
            return view('mahasiswaLama.nilaisemester', [
                "title" => "Nilai Semester"
            ]);
        });

        Route::get('/khs', function () {
            return view('mahasiswaLama.khs', [
                "title" => "KHS"
            ]);
        });
    });

    Route::get('/formcuti', function () {
        return view('mahasiswaLama.formcuti', [
            "title" => "Form Cuti"
        ]);
    });
});

Route::prefix('admin')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboardAdmin', [
            "title" => "admin-dashboard"
        ]);
    });

    Route::prefix('masterdata')->group(function () {
        Route::get('/dataperiode', function () {
            return view('admin.masterData.masterdataPeriode', [
                "title" => "admin-masterData"
            ]);
        });

        Route::get('/datasettingkuliah', function () {
            return view('admin.masterData.masterdataSettingKuliah', [
                "title" => "admin-masterData"
            ]);
        });

        Route::get('/datamahasiswadetail', function () {
            return view('admin.masterData.masterdataMahasiswaDetail', [
                "title" => "admin-masterData"
            ]);
        });

        Route::get('/datamahasiswa', function () {
            return view('admin.masterData.masterdataMahasiswa', [
                "title" => "admin-masterData"
            ]);
        });
        Route::get('/datamahasiswa/tambahdata', function () {
            return view('admin.formMaster.mahasiswa.tambahdatamahasiswa', [
                "title" => "admin-masterData"
            ]);
        });
        Route::get('/datamahasiswa/updatedata', function () {
            return view('admin.formMaster.mahasiswa.updatedatamahasiswa', [
                "title" => "admin-masterData"
            ]);
        });

        Route::get('/datamatakuliah', function () {
            return view('admin.masterData.masterdataMatakuliah', [
                "title" => "admin-masterData"
            ]);
        });
        Route::get('/datamatakuliah/tambahdata', function () {
            return view('admin.formMaster.matakuliah.tambahdatamatakuliah', [
                "title" => "admin-masterData"
            ]);
        });
        Route::get('/datamatakuliah/updatedata', function () {
            return view('admin.formMaster.matakuliah.updatedatamatakuliah', [
                "title" => "admin-masterData"
            ]);
        });

        Route::get('/datakelas', function () {
            return view('admin.masterData.masterdataKelas', [
                "title" => "admin-masterData"
            ]);
        });
        Route::get('/datakelas/tambahdata', function () {
            return view('admin.formMaster.kelas.tambahdatakelas', [
                "title" => "admin-masterData"
            ]);
        });
        Route::get('/datakelas/updatedata', function () {
            return view('admin.formMaster.kelas.updatedatakelas', [
                "title" => "admin-masterData"
            ]);
        });

        Route::get('/datadosen', function () {
            return view('admin.masterData.masterdataDosen', [
                "title" => "admin-masterData"
            ]);
        });
        Route::get('/datadosen/tambahdata', function () {
            return view('admin.formMaster.dosen.tambahdatadosen', [
                "title" => "admin-masterData"
            ]);
        });
        Route::get('/datadosen/updatedata', function () {
            return view('admin.formMaster.dosen.updatedatadosen', [
                "title" => "admin-masterData"
            ]);
        });

        Route::get('/dataruangan', function () {
            return view('admin.masterData.masterdataRuangan', [
                "title" => "admin-masterData"
            ]);
        });
        Route::get('/dataruangan/tambahdata', function () {
            return view('admin.formMaster.ruangan.tambahdataruangan', [
                "title" => "admin-masterData"
            ]);
        });
        Route::get('/dataruangan/updatedata', function () {
            return view('admin.formMaster.ruangan.updatedataruangan', [
                "title" => "admin-masterData"
            ]);
        });

        Route::get('/datajamkuliah', function () {
            return view('admin.masterData.masterdataJamKuliah', [
                "title" => "admin-masterData"
            ]);
        });
        Route::get('/datajamkuliah/tambahdata', function () {
            return view('admin.formMaster.jamKuliah.tambahdatajamkuliah', [
                "title" => "admin-masterData"
            ]);
        });
        Route::get('/datajamkuliah/updatedata', function () {
            return view('admin.formMaster.jamKuliah.updatedatajamkuliah', [
                "title" => "admin-masterData"
            ]);
        });


        Route::get('/datajurusan', function () {
            return view('admin.masterData.masterdataJurusan', [
                "title" => "admin-masterData"
            ]);
        });
        Route::get('/datajurusan/tambahdata', function () {
            return view('admin.formMaster.jurusan.tambahdatajurusan', [
                "title" => "admin-masterData"
            ]);
        });
        Route::get('/datajurusan/updatedata', function () {
            return view('admin.formMaster.jurusan.updatedatajurusan', [
                "title" => "admin-masterData"
            ]);
        });

        Route::get('/dataprodi', function () {
            return view('admin.masterData.masterdataProdi', [
                "title" => "admin-masterData"
            ]);
        });
        Route::get('/dataprodi/tambahdata', function () {
            return view('admin.formMaster.prodi.tambahdataprodi', [
                "title" => "admin-masterData"
            ]);
        });
        Route::get('/dataprodi/updatedata', function () {
            return view('admin.formMaster.prodi.updatedataprodi', [
                "title" => "admin-masterData"
            ]);
        });

        Route::get('/datarangenilai', function () {
            return view('admin.masterData.masterdataRangeNilai', [
                "title" => "admin-masterData"
            ]);
        });

        Route::get('/datadosenpengampu', function () {
            return view('admin.masterData.masterdataDosenPengampu', [
                "title" => "admin-masterData"
            ]);
        });
        Route::get('/datadosenpengampu/tambahdata', function () {
            return view('admin.formMaster.dosenPengampu.tambahdatadosenpengampu', [
                "title" => "admin-masterData"
            ]);
        });


        Route::get('/dataprogram', function () {
            return view('admin.masterData.masterdataProgram', [
                "title" => "admin-masterData"
            ]);
        });
    });

    Route::prefix('kuliah')->group(function () {
        Route::get('/absensi', function () {
            return view('admin.kuliah.absensi', [
                "title" => "admin-kuliah"
            ]);
        });

        Route::get('/nilai', function () {
            return view('admin.kuliah.nilai', [
                "title" => "admin-kuliah"
            ]);
        });

        Route::get('/pelanggaran', function () {
            return view('admin.kuliah.pelanggaran', [
                "title" => "admin-kuliah"
            ]);
        });
    });

    Route::prefix('settingpmb')->group(function () {
        Route::get('/settingjalurpenerimaan', function () {
            return view('admin.pmb.settingJalurPenerimaan', [
                "title" => "admin-settingpmb"
            ]);
        });
        Route::get('/settingjalurpenerimaan/cu/', function () {
            return view('admin.pmb/cuJalurPenerimaan', [
                "id" => null,
                "title" => "admin-settingpmb"
            ]);
        });
        Route::get('/settingjalurpenerimaan/cu/{id}', function ($id) {
            return view('admin.pmb/cuJalurPenerimaan', [
                "id" => $id,
                "title" => "admin-settingpmb"
            ]);
        });

        Route::get('/settingjurusanpilihan', function () {
            return view('admin.pmb.settingJurusanPilihan', [
                "title" => "admin-settingpmb"
            ]);
        });
        Route::get('/editjurusanpilihan', function () {
            return view('admin.pmb.editJurusanPilihan', [
                "title" => "admin-settingpmb"
            ]);
        });

        Route::get('/settingjadwalseleksi', function () {
            return view('admin.pmb.settingJadwalSeleksi', [
                "title" => "admin-settingpmb"
            ]);
        });
        Route::get('/editjadwalseleksi', function () {
            return view('admin.pmb.editJadwalSeleksi', [
                "title" => "admin-settingpmb"
            ]);
        });

        Route::get('/settingjurusanasal', function () {
            return view('admin.pmb.settingJurusanAsalPendaftar', [
                "title" => "admin-settingpmb"
            ]);
        });
        Route::get('/editjurusanasal', function () {
            return view('admin.pmb.editJurusanAsalPendaftar', [
                "title" => "admin-settingpmb"
            ]);
        });

        Route::get('/settingjurusanlinear', function () {
            return view('admin.pmb.settingJurusanLinear', [
                "title" => "admin-settingpmb"
            ]);
        });
        Route::get('/editjurusanlinear', function () {
            return view('admin.pmb.editJurusanLinear', [
                "title" => "admin-settingpmb"
            ]);
        });
    });
});
