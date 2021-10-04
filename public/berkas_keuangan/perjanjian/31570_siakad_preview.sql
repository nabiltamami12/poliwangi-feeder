CREATE TABLE `ABSENSI_ASISTEN_TEKNISI`  (
  `NOMOR` decimal(10, 0) NOT NULL,
  `KULIAH` decimal(10, 0) NOT NULL,
  `PEGAWAI` decimal(10, 0) NOT NULL,
  `MINGGU` decimal(2, 0) NOT NULL,
  `TANGGAL` datetime NOT NULL,
  `PENGGANTI` varchar(1) NULL,
  `HARI_PENGGANTI` decimal(1, 0) NULL,
  PRIMARY KEY (`NOMOR`),
  INDEX `IDX_ABSENSI_ASISTEN_TEKNISI_1`(`KULIAH` ASC, `MINGGU` ASC, `TANGGAL` ASC)
);

CREATE TABLE `ABSENSI_MAHASISWA`  (
  `NOMOR` decimal(20, 0) NOT NULL,
  `KULIAH` decimal(10, 0) NOT NULL,
  `MAHASISWA` decimal(10, 0) NOT NULL,
  `MINGGU` decimal(2, 0) NOT NULL,
  `TANGGAL` datetime NULL,
  `KETERANGAN` varchar(50) NULL,
  `STATUS` varchar(10) NULL,
  `PENGGANTI` varchar(1) NULL,
  `DOSEN` decimal(10, 0) NULL,
  `HARI_PENGGANTI` decimal(1, 0) NULL,
  `TANGGAL_ENTRY` datetime NULL,
  `TELAT` decimal(1, 0) NULL,
  `SERVER` decimal(1, 0) NULL,
  `PEGAWAI` decimal(10, 0) NULL,
  `IP_ADDRESS` varchar(50) NULL,
  `JAM_PENGAJAR` decimal(4, 0) NULL,
  `DOSEN_PENGAJAR` decimal(10, 0) NULL,
  `TEKNISI_PENGAJAR1` decimal(10, 0) NULL,
  `TEKNISI_PENGAJAR2` decimal(10, 0) NULL,
  PRIMARY KEY (`NOMOR`),
  INDEX `IDX_ABSENSI_MAHASISWA_DSN`(`DOSEN_PENGAJAR` ASC),
  INDEX `IDX_ABSENSI_MAHASISWA_KULIAH`(`KULIAH` ASC),
  INDEX `IDX_ABSENSI_MAHASISWA_MHS`(`MAHASISWA` ASC),
  INDEX `IDX_ABSENSI_MAHASISWA_MINGGU`(`MINGGU` ASC),
  INDEX `IDX_ABSENSI_MAHASISWA_TANGGAL`(`TANGGAL` ASC)
);

CREATE TABLE `ABSENSI_MHS_MINGGU`  (
  `NOMOR` decimal(10, 0) NOT NULL,
  `KELAS` decimal(10, 0) NULL,
  `TAHUN_AJARAN` varchar(10) NULL,
  `SEMESTER` decimal(1, 0) NULL,
  `TANGGAL` datetime NULL,
  PRIMARY KEY (`NOMOR`),
  INDEX `ABSENSI_MHS_MGG_KELAS`(`KELAS` ASC)
);

CREATE TABLE `ABSENSI_MHS_SETTING`  (
  `NOMOR` decimal(10, 0) NOT NULL,
  `JAM` decimal(10, 0) NULL,
  `KETERANGAN` varchar(50) NULL
);

CREATE TABLE `ABSENSI_SHIFT`  (
  `NOMOR` decimal(10, 0) NOT NULL,
  `PEGAWAI` decimal(8, 0) NULL,
  `TANGGAL` datetime NULL,
  `MASUK` datetime NULL,
  `PULANG` datetime NULL,
  `SHIFT` decimal(1, 0) NULL,
  PRIMARY KEY (`NOMOR`)
);

CREATE TABLE `ABSENSIKARYAWAN`  (
  `PEGAWAI` decimal(8, 0) NULL,
  `TANGGAL` datetime NULL,
  `MASUK` char(8) NULL,
  `PULANG` char(8) NULL,
  `TERLAMBAT1` decimal(1, 0) NULL,
  `TERLAMBAT2` decimal(1, 0) NULL,
  `PULANGAWAL` decimal(1, 0) NULL,
  `TIDAKABSEN` decimal(1, 0) NULL,
  `TIDAKMASUK` decimal(1, 0) NULL,
  `LIBUR` decimal(1, 0) NULL,
  `LEMBUR` decimal(4, 2) NULL,
  `MULAI_ISTIRAHAT` char(8) NULL,
  `AKHIR_ISTIRAHAT` char(8) NULL,
  `KETERANGAN` varchar(255) NULL,
  INDEX `IDX_ABSENSIKARYAWAN_TANGGAL`(`TANGGAL` ASC),
  INDEX `IDX_ABS_KAR_PEG`(`PEGAWAI` ASC)
);

CREATE TABLE `ABSENSIKARYAWAN_BULAN`  (
  `NOMOR` decimal(10, 0) NOT NULL,
  `TANGGAL` datetime NOT NULL,
  PRIMARY KEY (`NOMOR`)
);

CREATE TABLE `ABSENSIKARYAWAN_STATUS`  (
  `NOMOR` decimal(10, 0) NOT NULL,
  `PEGAWAI` decimal(8, 0) NOT NULL,
  `TANGGAL` datetime NOT NULL,
  `STATUS` varchar(2) NOT NULL,
  `STATUS_TL` varchar(10) NULL,
  `IJIN_TL` varchar(10) NULL,
  `STATUS_PSW` varchar(10) NULL,
  `IJIN_PSW` varchar(10) NULL,
  PRIMARY KEY (`NOMOR`),
  INDEX `INDX_ABSKAR_PEG_TGL`(`PEGAWAI` ASC, `TANGGAL` ASC)
);

CREATE TABLE `ABSENSIKARYAWAN_STATUS1`  (
  `NOMOR` decimal(10, 0) NULL,
  `PEGAWAI` decimal(8, 0) NULL,
  `TANGGAL` datetime NULL,
  `STATUS` varchar(2) NULL
);

CREATE TABLE `AGAMA`  (
  `NOMOR` decimal(2, 0) NOT NULL,
  `AGAMA` varchar(20) NULL,
  PRIMARY KEY (`NOMOR`)
);

CREATE TABLE `AKTIVASI_RAPORT`  (
  `TAHUN_AJARAN` varchar(10) NULL,
  `SEMESTER` decimal(2, 0) NULL,
  `TANGGAL` datetime NULL
);

CREATE TABLE `ALUMNI_LOG`  (
  `NOMOR` decimal(10, 0) NOT NULL,
  `MAHASISWA` decimal(10, 0) NOT NULL,
  `STATUS` decimal(1, 0) NOT NULL
);

CREATE TABLE `ALUMNI_RIWAYAT_KERJA`  (
  `NOMOR` decimal(10, 0) NOT NULL,
  `MAHASISWA` decimal(10, 0) NOT NULL,
  `PERUSAHAAN` decimal(10, 0) NOT NULL,
  `JABATAN` varchar(100) NULL,
  `GAJI` decimal(10, 0) NULL,
  `MASA_KERJA` decimal(5, 0) NULL,
  `STATUS_KERJA` decimal(10, 0) NULL,
  `TAHUN` decimal(4, 0) NULL,
  `TGL` datetime NULL,
  `STATUS` char(1) NULL
);

CREATE TABLE `ALUMNI_STATUS_KERJA`  (
  `NOMOR` decimal(10, 0) NOT NULL,
  `STATUS_KERJA` varchar(70) NULL,
  PRIMARY KEY (`NOMOR`)
);

CREATE TABLE `ALUMNI_STUDI`  (
  `NOMOR` decimal(10, 0) NOT NULL,
  `NAMA_INSTITUT` varchar(150) NULL,
  `JURUSAN` decimal(10, 0) NULL,
  `PROGRAM` decimal(10, 0) NULL,
  `ASAL_DANA` decimal(10, 0) NULL,
  `MAHASISWA` decimal(10, 0) NOT NULL,
  `TAHUN` decimal(4, 0) NULL,
  `TGL` datetime NULL,
  `STATUS` char(1) NULL
);

CREATE TABLE `ALUMNI_STUDI_ASAL_DANA`  (
  `NOMOR` decimal(10, 0) NOT NULL,
  `ASAL_DANA` varchar(100) NULL,
  PRIMARY KEY (`NOMOR`)
);

CREATE TABLE `ALUMNI_STUDI_JURUSAN`  (
  `NOMOR` decimal(10, 0) NOT NULL,
  `JURUSAN` varchar(100) NULL,
  PRIMARY KEY (`NOMOR`)
);

CREATE TABLE `ALUMNI_STUDI_PROGRAM`  (
  `NOMOR` decimal(10, 0) NOT NULL,
  `PROGRAM` varchar(20) NULL,
  PRIMARY KEY (`NOMOR`)
);

CREATE TABLE `API`  (
  `id` decimal(20, 0) NOT NULL,
  `register` varchar(100) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `apikey` text NOT NULL,
  `tipe` decimal(2, 0) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id`(`id` ASC)
);

CREATE TABLE `ASAL_BUKU`  (
  `NOMOR` decimal(4, 0) NOT NULL,
  `KODE` varchar(20) NULL,
  `ASAL` varchar(100) NULL,
  `KETERANGAN` varchar(100) NULL,
  PRIMARY KEY (`NOMOR`)
);

CREATE TABLE `ATK_ADMIN`  (
  `NO` decimal(10, 0) NOT NULL,
  `PEGAWAI` decimal(4, 0) NOT NULL
);

CREATE TABLE `ATK_BARANG`  (
  `NO` decimal(10, 0) NOT NULL,
  `KODE_KELOMPOK_BARANG` varchar(20) NOT NULL,
  `KODE_BARANG` varchar(20) NOT NULL,
  `NAMA` varchar(100) NULL,
  `STOK` decimal(10, 0) NULL,
  `SATUAN` varchar(20) NULL,
  `HARGA_SATUAN` decimal(10, 2) NULL,
  `TAHUN_ANGGARAN` varchar(4) NULL,
  PRIMARY KEY (`NO`)
);

CREATE TABLE `ATK_JENIS_TRANSAKSI`  (
  `NO` decimal(10, 0) NOT NULL,
  `NAMA` varchar(50) NULL,
  PRIMARY KEY (`NO`)
);

CREATE TABLE `ATK_KELOMPOK_BARANG`  (
  `NO` decimal(10, 0) NOT NULL,
  `KODE` varchar(20) NOT NULL,
  `NAMA` varchar(100) NULL,
  PRIMARY KEY (`NO`)
);

CREATE TABLE `ATK_NOMOR_TRANSAKSI`  (
  `NOMOR_AWAL` decimal(10, 0) NOT NULL,
  `NOMOR_AKHIR` decimal(10, 0) NOT NULL,
  `TAHUN` decimal(4, 0) NOT NULL
);

CREATE TABLE `ATK_STAFF`  (
  `NO` decimal(10, 0) NOT NULL,
  `PEGAWAI` decimal(10, 0) NULL,
  `JABATAN` varchar(30) NULL
);

CREATE TABLE `ATK_STATUS_TRANSAKSI`  (
  `NO` decimal(10, 0) NOT NULL,
  `NAMA` varchar(50) NOT NULL,
  PRIMARY KEY (`NO`)
);

CREATE TABLE `ATK_TAHUN_ANGGARAN`  (
  `NO` decimal(10, 0) NOT NULL,
  `TAHUN` decimal(4, 0) NOT NULL,
  `KETERANGAN` varchar(50) NULL,
  `STATUS` decimal(2, 0) NULL,
  PRIMARY KEY (`NO`)
);

CREATE TABLE `ATK_UNIT`  (
  `NO` decimal(10, 0) NOT NULL,
  `NAMA` varchar(100) NOT NULL,
  `ATASAN` decimal(3, 0) NULL,
  PRIMARY KEY (`NO`)
);

CREATE TABLE `BAYAR_DAFTAR_ULANG`  (
  `NOMOR` decimal(10, 0) NOT NULL,
  `KETERANGAN` varchar(100) NOT NULL,
  PRIMARY KEY (`NOMOR`)
);

CREATE TABLE `BEBAS_PINJAM_LAB`  (
  `NOMOR` decimal(11, 0) NOT NULL,
  `NOMOR_LAB` decimal(11, 0) NULL,
  `NAMA_LAB` varchar(255) NULL,
  `KEPALA_LAB` decimal(11, 0) NULL,
  `NRP_PEMINJAM` varchar(10) NULL,
  `NAMA_PEMINJAM` varchar(255) NULL,
  `TANGGAL_PINJAM` datetime NULL,
  `BARANG_PINJAM` text NULL,
  `PEGAWAI_ENTRY` decimal(11, 0) NULL,
  `STATUS` decimal(2, 0) NULL,
  `JUMLAH` decimal(2, 0) NULL,
  `TANGGAL_KEMBALI` datetime NULL,
  PRIMARY KEY (`NOMOR`)
);

CREATE TABLE `BENTUK`  (
  `KODE` decimal(2, 0) NOT NULL,
  `BENTUK` varchar(50) NULL,
  PRIMARY KEY (`KODE`)
);

CREATE TABLE `BOBOT_TA`  (
  `NILAI1` decimal(3, 0) NULL,
  `NILAI2` decimal(3, 0) NULL,
  `NILAI3` decimal(3, 0) NULL,
  `NILAI4` decimal(3, 0) NULL,
  `NILAI5` decimal(3, 0) NULL,
  `NILAI6` decimal(3, 0) NULL,
  `NILAI7` decimal(3, 0) NULL,
  `NILAI8` decimal(3, 0) NULL,
  `STATUS` decimal(1, 0) NULL,
  `UJIAN` varchar(10) NULL,
  `TAHUN` varchar(10) NULL
);

CREATE TABLE `CUTI_DO`  (
  `NOMOR` decimal(10, 0) NOT NULL,
  `NRP` varchar(12) NULL,
  `KATAGORI` char(1) NULL,
  `SK` varchar(30) NULL,
  `TANGGAL` datetime NULL,
  `LAMA` decimal(5, 0) NULL,
  `P_SK` varchar(50) NULL,
  `TGL_INPUT` datetime NULL,
  `PEGAWAI` decimal(10, 0) NULL,
  `SEMESTER_AWAL` decimal(2, 0) NULL,
  `SEMESTER_AKHIR` decimal(2, 0) NULL,
  `TAHUN_AWAL` decimal(4, 0) NULL,
  `TAHUN_AKHIR` decimal(4, 0) NULL
);

CREATE TABLE `DAFTAR_NOMOR_SISIPAN`  (
  `NOMOR` decimal(10, 0) NOT NULL,
  `DIPAKAI` decimal(1, 0) NOT NULL,
  `TANGGAL` datetime NULL,
  `NOMOR_SURAT` decimal(10, 0) NOT NULL
);

CREATE TABLE `DAFTAR_NOMOR_SURAT`  (
  `NOMOR` decimal(10, 0) NOT NULL,
  `DIPAKAI` decimal(1, 0) NOT NULL,
  `TANGGAL` datetime NULL
);

CREATE TABLE `DAFTAR_ULANG`  (
  `NOMOR` decimal(10, 0) NOT NULL,
  `NRP` varchar(15) NOT NULL,
  `SEMESTER` decimal(1, 0) NOT NULL,
  `TAHUN` varchar(4) NOT NULL,
  `BAYAR` decimal(1, 0) NOT NULL,
  `TANGGAL` datetime NULL,
  `SEMESTER_TEMPUH` decimal(2, 0) NULL,
  `NAIKKEKELAS` decimal(4, 0) NULL,
  PRIMARY KEY (`NOMOR`),
  INDEX `INDAFTARULANG`(`NRP` ASC)
);

CREATE TABLE `DAFTAR_ULANG_AKTIVASI`  (
  `NOMOR` decimal(5, 0) NULL,
  `TAHUN` decimal(4, 0) NULL,
  `SEMESTER` decimal(1, 0) NULL,
  `PEGAWAI` decimal(10, 0) NULL,
  `TANGGAL` datetime NULL
);

CREATE TABLE `DAFTAR_ULANG_BACKUP`  (
  `NOMOR` decimal(10, 0) NOT NULL,
  `NRP` varchar(15) NOT NULL,
  `SEMESTER` decimal(1, 0) NOT NULL,
  `TAHUN` varchar(4) NOT NULL,
  `BAYAR` decimal(1, 0) NOT NULL,
  `TANGGAL` datetime NULL,
  PRIMARY KEY (`NOMOR`),
  INDEX `INDAFTARULANG_copy`(`NRP` ASC)
);

CREATE TABLE `DEPARTEMEN`  (
  `NOMOR` decimal(10, 0) NOT NULL,
  `DEPARTEMEN` varchar(50) NOT NULL,
  `KEPALA` decimal(10, 0) NULL,
  `DEPARTEMEN_INGGRIS` varchar(100) NULL,
  PRIMARY KEY (`NOMOR`)
);

CREATE TABLE `DP3_PEGAWAI`  (
  `NOMOR` decimal(10, 0) NOT NULL,
  `PEGAWAI` decimal(10, 0) NULL,
  `PEJABAT` decimal(10, 0) NULL,
  `PEJABAT_ATAS` decimal(10, 0) NULL,
  `NILAI_KESETIAAN` decimal(5, 2) NULL,
  `NILAI_PRESTASI_KERJA` decimal(5, 2) NULL,
  `NILAI_TANGGUNG_JAWAB` decimal(5, 2) NULL,
  `NILAI_KETAATAN` decimal(5, 2) NULL,
  `NILAI_KEJUJURAN` decimal(5, 2) NULL,
  `NILAI_KERJASAMA` decimal(5, 2) NULL,
  `NILAI_PRAKASA` decimal(5, 2) NULL,
  `NILAI_KEPEMIMPINAN` decimal(5, 2) NULL,
  `JUMLAH` decimal(8, 2) NULL,
  `KEBERATAN` text NULL,
  `TANGGAL_ENTRY` datetime NULL,
  `TAHUN` decimal(4, 0) NULL
);

CREATE TABLE `DP3_PREDIKAT`  (
  `NOMOR` decimal(10, 0) NOT NULL,
  `NILAI` decimal(3, 0) NOT NULL,
  `PREDIKAT` varchar(50) NOT NULL
);

CREATE TABLE `EIS_ABSEN`  (
  `NOMOR` decimal(10, 0) NOT NULL,
  `PEGAWAI` decimal(10, 0) NOT NULL,
  `TGL` datetime NOT NULL,
  `MASUK` char(5) NULL,
  `KELUAR` char(5) NULL,
  UNIQUE INDEX `IN_EISABSEN_NOMOR`(`NOMOR` ASC),
  INDEX `IN_EISABSEN_PEGAWAI`(`PEGAWAI` ASC)
);

CREATE TABLE `EIS_CHAT_PATNERLIST`  (
  `PEGAWAI` decimal(10, 0) NULL,
  `PATNER` decimal(10, 0) NULL
);

CREATE TABLE `EIS_DUTY`  (
  `NOMOR` decimal(10, 0) NOT NULL,
  `PEGAWAI` decimal(10, 0) NOT NULL,
  `TITLE` varchar(50) NOT NULL,
  `LOCATION` varchar(50) NULL,
  `NOTES` text NULL,
  `TGL_START` datetime NULL,
  `TGL_END` datetime NULL,
  `NOTES_DUTY` text NULL,
  PRIMARY KEY (`NOMOR`),
  INDEX `IN_EIS_DUTY_TGL`(`TGL_START` ASC, `TGL_END` ASC)
);

CREATE TABLE `EIS_JOB`  (
  `NOMOR` decimal(10, 0) NOT NULL,
  `PEGAWAI` decimal(10, 0) NOT NULL,
  `TITLE` varchar(100) NOT NULL,
  `TIME_START` varchar(10) NULL,
  `TIME_DURATION` varchar(10) NULL,
  `LOCATION` varchar(50) NULL,
  `NOTES` text NULL,
  `TGL` datetime NOT NULL,
  `TIPE` varchar(20) NOT NULL,
  `STATUS_JOB` decimal(2, 0) NULL,
  `NOTES_JOB` text NULL,
  `SCHEDULE` decimal(10, 0) NULL,
  PRIMARY KEY (`NOMOR`),
  INDEX `IDX_EIS_JOB_PEGAWAI_TGL`(`PEGAWAI` ASC, `TGL` ASC),
  INDEX `IDX_EIS_JOB_SCHEDULE`(`SCHEDULE` ASC)
);

CREATE TABLE `EIS_MESSAGE`  (
  `NOMOR` decimal(10, 0) NOT NULL,
  `STATUS` decimal(2, 0) NOT NULL,
  `TGL` datetime NOT NULL,
  `MESSAGE` text NULL,
  `PEGAWAI` decimal(10, 0) NOT NULL,
  `PATNER` decimal(10, 0) NOT NULL,
  `JUDUL` varchar(50) NOT NULL,
  `HAPUS_PEGAWAI` decimal(10, 0) NOT NULL,
  `HAPUS_PATNER` decimal(10, 0) NOT NULL,
  UNIQUE INDEX `IN_EISMESSAGE_NOMOR`(`NOMOR` ASC)
);

CREATE TABLE `EIS_SCHEDULE`  (
  `NOMOR` decimal(10, 0) NOT NULL,
  `PEGAWAI` decimal(10, 0) NOT NULL,
  `TITLE` varchar(50) NOT NULL,
  `TIME_START` varchar(10) NULL,
  `TIME_DURATION` varchar(10) NULL,
  `LOCATION` varchar(50) NULL,
  `NOTES` text NULL,
  `REMAINDER` varchar(10) NULL,
  `TGL` datetime NOT NULL,
  `TIPE` varchar(20) NOT NULL,
  `RPT` varchar(10) NULL,
  `RPT_END` datetime NULL,
  `STATUS_JOB` decimal(2, 0) NULL,
  `NOTES_JOB` text NULL,
  UNIQUE INDEX `IN_EISSCHEDULE_NOMOR`(`NOMOR` ASC)
);

CREATE TABLE `FEEDER_WILAYAH`  (
  `NOMOR` decimal(10, 0) NOT NULL,
  `ID_WIL` varchar(8) NULL,
  `NM_WIL` varchar(40) NULL,
  `ASAL_WIL` varchar(8) NULL,
  `KODE_BPS` varchar(7) NULL,
  `KODE_DAGRI` varchar(7) NULL,
  `KODE_KEU` varchar(10) NULL,
  `ID_INDUK_WILAYAH` varchar(8) NULL,
  `ID_LEVEL_WIL` decimal(16, 0) NULL,
  `ID_NEGARA` varchar(2) NULL,
  `SPPD_KOTA` decimal(10, 0) NULL,
  PRIMARY KEY (`NOMOR`)
);

CREATE TABLE `GOLDARAH`  (
  `NOMOR` varchar(5) NOT NULL,
  `GOLDARAH` varchar(5) NULL,
  PRIMARY KEY (`NOMOR`)
);

CREATE TABLE `HAK`  (
  `NOMOR` decimal(10, 0) NOT NULL,
  `HAK` varchar(50) NOT NULL,
  `HAK_LAMA_HEXA` varchar(50) NULL,
  `HAK_LAMA_DESIMAL` varchar(50) NULL,
  PRIMARY KEY (`NOMOR`)
);

CREATE TABLE `HAK_ROLES`  (
  `NOMOR` decimal(10, 0) NOT NULL,
  `HAK_ROLES` varchar(50) NOT NULL,
  PRIMARY KEY (`NOMOR`)
);

CREATE TABLE `HAK_ROLES_HAK`  (
  `NOMOR` decimal(10, 0) NOT NULL,
  `HAK_ROLES` decimal(10, 0) NOT NULL,
  `HAK` decimal(10, 0) NULL,
  `HAK_ROLES_ROLES` decimal(10, 0) NULL,
  PRIMARY KEY (`NOMOR`)
);

CREATE TABLE `HARI`  (
  `NOMOR` decimal(2, 0) NOT NULL,
  `HARI` varchar(20) NULL,
  PRIMARY KEY (`NOMOR`)
);

CREATE TABLE `HARIKERJA`  (
  `HARI` decimal(1, 0) NOT NULL,
  `LIBUR` decimal(1, 0) NULL,
  PRIMARY KEY (`HARI`)
);

CREATE TABLE `HARILIBUR`  (
  `KETERANGAN` varchar(50) NULL,
  `TANGGAL` char(5) NOT NULL,
  PRIMARY KEY (`TANGGAL`)
);

CREATE TABLE `JABATAN`  (
  `NOMOR` decimal(3, 0) NOT NULL,
  `JABATAN` varchar(50) NULL,
  `PEGAWAI` decimal(8, 0) NULL,
  `KETERANGAN` varchar(100) NULL,
  PRIMARY KEY (`NOMOR`)
);

CREATE TABLE `JABATAN_FUNGSIONAL`  (
  `NOMOR` decimal(10, 0) NOT NULL,
  `JABATAN` varchar(100) NULL,
  `KREDIT` decimal(10, 0) NULL,
  `TINGKAT` decimal(2, 0) NULL,
  PRIMARY KEY (`NOMOR`)
);

CREATE TABLE `JABATAN_FUNGSIONAL_PLP`  (
  `NOMOR` decimal(10, 0) NOT NULL,
  `JABATAN` varchar(100) NULL,
  `KREDIT` decimal(10, 0) NULL,
  `KELOMPOK_JABATAN` decimal(2, 0) NULL,
  PRIMARY KEY (`NOMOR`)
);

CREATE TABLE `JABATAN_HONORARIUM`  (
  `NOMOR` decimal(2, 0) NOT NULL,
  `KETERANGAN` varchar(50) NOT NULL,
  PRIMARY KEY (`NOMOR`)
);

CREATE TABLE `JABATAN_KHUSUS`  (
  `NOMOR` decimal(10, 0) NOT NULL,
  `KETERANGAN` varchar(100) NOT NULL,
  PRIMARY KEY (`NOMOR`)
);

CREATE TABLE `JABATAN_PEGAWAI`  (
  `NOMOR` decimal(2, 0) NOT NULL,
  `KETERANGAN` varchar(50) NOT NULL,
  PRIMARY KEY (`NOMOR`)
);

CREATE TABLE `JABATAN_STRUKTURAL`  (
  `NOMOR` decimal(10, 0) NOT NULL,
  `JABATAN` varchar(200) NULL,
  `GAJI` decimal(10, 0) NULL,
  `NOMOR_SK` varchar(40) NULL,
  `STATUS` varchar(3) NULL,
  `TINGKAT` decimal(2, 0) NULL,
  PRIMARY KEY (`NOMOR`)
);

CREATE TABLE `JABATAN_TUGAS_TAMBAHAN`  (
  `NOMOR` decimal(10, 0) NOT NULL,
  `JABATAN` varchar(100) NULL,
  `GAJI` decimal(10, 0) NULL,
  `NOMOR_SK` varchar(40) NULL,
  `STATUS` varchar(3) NULL,
  PRIMARY KEY (`NOMOR`)
);

CREATE TABLE `JADWAL_UAS`  (
  `NOMOR` decimal(11, 0) NOT NULL,
  `HARI` decimal(11, 0) NULL,
  `TANGGAL` datetime NULL,
  `JAM_UAS` decimal(11, 0) NULL,
  `SEMESTER_TEMPUH` decimal(11, 0) NULL,
  `KODE_MK` varchar(30) NULL,
  `MATAKULIAH` decimal(11, 0) NULL,
  `RUANG` decimal(11, 0) NULL,
  `PENGAWAS1` decimal(11, 0) NULL,
  `PENGAWAS2` decimal(11, 0) NULL,
  `PROGRAM` decimal(11, 0) NULL,
  `JURUSAN` decimal(11, 0) NULL,
  `TAHUN` decimal(11, 0) NULL,
  `SEMESTER` decimal(11, 0) NULL,
  `JENIS` decimal(11, 0) NULL,
  `KELAS` decimal(11, 0) NULL,
  `PENGAWAS3` decimal(11, 0) NULL,
  `PENGAWAS4` decimal(11, 0) NULL,
  `PENGAWAS5` decimal(11, 0) NULL,
  `PENGAWAS6` decimal(11, 0) NULL,
  `PENGAWAS7` decimal(11, 0) NULL,
  `PENGAWAS8` decimal(11, 0) NULL,
  `RUANG2` decimal(11, 0) NULL,
  `RUANG3` decimal(11, 0) NULL,
  `RUANG4` decimal(11, 0) NULL,
  `GOLONGAN1` varchar(30) NULL,
  `GOLONGAN2` varchar(30) NULL,
  `GOLONGAN3` varchar(30) NULL,
  `GOLONGAN4` varchar(30) NULL,
  `PENGAWAS9` decimal(11, 0) NULL,
  `PENGAWAS10` decimal(11, 0) NULL,
  `PENGAWAS11` decimal(11, 0) NULL,
  `PENGAWAS12` decimal(11, 0) NULL,
  `PENGAWAS13` decimal(11, 0) NULL,
  `PENGAWAS14` decimal(11, 0) NULL,
  `PENGAWAS15` decimal(11, 0) NULL,
  `PENGAWAS16` decimal(11, 0) NULL,
  PRIMARY KEY (`NOMOR`)
);

CREATE TABLE `JALUR_DAFTAR`  (
  `NOMOR` decimal(2, 0) NOT NULL,
  `JALUR_DAFTAR` varchar(50) NULL,
  PRIMARY KEY (`NOMOR`)
);

CREATE TABLE `JAM`  (
  `NOMOR` decimal(4, 0) NOT NULL,
  `KHUSUS` decimal(1, 0) NULL,
  `PROGRAM` decimal(2, 0) NULL,
  `HARI` decimal(1, 0) NULL,
  `KODE` decimal(2, 0) NULL,
  `JAM` varchar(15) NOT NULL,
  `SORE` decimal(1, 0) NOT NULL,
  PRIMARY KEY (`NOMOR`),
  INDEX `JAM_PROGRAM_KODE`(`PROGRAM` ASC, `KODE` ASC)
);

CREATE TABLE `JAM_2`  (
  `NOMOR` decimal(4, 0) NOT NULL,
  `KHUSUS` decimal(1, 0) NOT NULL,
  `PROGRAM` decimal(2, 0) NOT NULL,
  `HARI` decimal(1, 0) NOT NULL,
  `KODE` decimal(2, 0) NOT NULL,
  `JAM` varchar(15) NOT NULL,
  `SORE` decimal(1, 0) NULL,
  PRIMARY KEY (`NOMOR`)
);

CREATE TABLE `JAM_UAS`  (
  `NOMOR` decimal(2, 0) NOT NULL,
  `JAM` varchar(20) NULL,
  PRIMARY KEY (`NOMOR`)
);

CREATE TABLE `JAWAB`  (
  `NOMOR` decimal(1, 0) NOT NULL,
  `JAWAB` varchar(5) NOT NULL,
  PRIMARY KEY (`NOMOR`)
);

CREATE TABLE `JAWABAN`  (
  `NOMOR` decimal(2, 0) NOT NULL,
  `JAWAB` varchar(30) NULL,
  PRIMARY KEY (`NOMOR`)
);

CREATE TABLE `JENIS_KINERJA_DOSEN`  (
  `NOMOR` decimal(10, 0) NOT NULL,
  `KETERANGAN` varchar(100) NULL,
  `STAFF` decimal(2, 0) NULL,
  PRIMARY KEY (`NOMOR`)
);

CREATE TABLE `JENIS_ORTU`  (
  `NOMOR` decimal(2, 0) NOT NULL,
  `JENIS` varchar(50) NULL,
  PRIMARY KEY (`NOMOR`)
);

CREATE TABLE `JENJANG`  (
  `NOMOR` decimal(3, 0) NOT NULL,
  `JENJANG` varchar(10) NULL,
  `KODE_EPSBED` char(1) NULL,
  PRIMARY KEY (`NOMOR`)
);

CREATE TABLE `JUDUL_TA`  (
  `NRP` varchar(15) NULL,
  `JUDUL` text NOT NULL,
  `ABSTRAK` text NULL,
  `DOSEN1` varchar(200) NULL,
  `DOSEN2` varchar(200) NULL,
  `DOSEN3` varchar(200) NULL,
  `TAHUN_AJARAN` varchar(10) NULL,
  `DOSEN4` varchar(200) NULL,
  `INGGRIS` text NULL,
  `TANGGAL_ENTRI` datetime NULL
);

CREATE TABLE `JUDUL_TA_DAFTAR`  (
  `NOMOR` decimal(10, 0) NOT NULL,
  `MAHASISWA` decimal(10, 0) NOT NULL,
  `JUDUL` varchar(200) NOT NULL,
  `RANGKUMAN` text NULL,
  `PEMBIMBING1` decimal(10, 0) NULL,
  `PEMBIMBING2` decimal(10, 0) NULL,
  `PEMBIMBING3` decimal(10, 0) NULL,
  `STATUS` decimal(1, 0) NULL,
  `CATATAN` text NULL,
  `TANGGAL_ENTRI` datetime NOT NULL,
  `TANGGAL_RAPAT` datetime NULL,
  `AMBIL` decimal(1, 0) NULL,
  `PRIORITAS` decimal(1, 0) NULL,
  `DAFTAR_SEMINAR` decimal(1, 0) NULL,
  `TANGGAL_SEMINAR` datetime NULL,
  `TEMPAT_SEMINAR` decimal(10, 0) NULL,
  `ANGGOTA_PENGUJI_SEMINAR` decimal(10, 0) NULL,
  `DAFTAR_SIDANG` decimal(1, 0) NULL,
  `TANGGAL_SIDANG` datetime NULL,
  `TEMPAT_SIDANG` decimal(10, 0) NULL,
  `ANGGOTA_PENGUJI_SIDANG` decimal(10, 0) NULL,
  `ANGGOTA_PENGUJI_SEMINAR_EXT` varchar(100) NULL,
  `ANGGOTA_PENGUJI_SIDANG_EXT` varchar(100) NULL,
  `JENIS_ANGGOTA_PENGUJI_SEMINAR` decimal(1, 0) NULL,
  `JENIS_ANGGOTA_PENGUJI_SIDANG` decimal(1, 0) NULL,
  PRIMARY KEY (`NOMOR`)
);

CREATE TABLE `JUDUL_TA_DAFTAR_TANGGAL`  (
  `NOMOR` decimal(10, 0) NOT NULL,
  `PROGRAM` decimal(10, 0) NULL,
  `JURUSAN` decimal(10, 0) NULL,
  `SUBKAMPUS` decimal(2, 0) NULL,
  `TANGGAL_AWAL` datetime NULL,
  `TANGGAL_AKHIR` datetime NULL,
  PRIMARY KEY (`NOMOR`)
);

CREATE TABLE `JURUSAN`  (
  `NOMOR` decimal(2, 0) NOT NULL,
  `JURUSAN` varchar(200) NOT NULL,
  `KAJUR` decimal(8, 0) NULL,
  `SEKJUR` decimal(8, 0) NULL,
  `ALIAS` varchar(10) NULL,
  `JURUSAN_INGGRIS` varchar(50) NULL,
  `JURUSAN_LENGKAP` varchar(200) NULL,
  `KONSENTRASI` varchar(255) NULL,
  `AKREDITASI` varchar(255) NULL,
  `SK_AKREDITASI` varchar(255) NULL,
  PRIMARY KEY (`NOMOR`)
);

CREATE TABLE `KATEGORI_HOTNEWS`  (
  `NOMOR` decimal(4, 0) NOT NULL,
  `KATEGORI` varchar(50) NULL,
  `KETERANGAN` varchar(100) NULL,
  PRIMARY KEY (`NOMOR`),
  INDEX `KATEGORI_HOTNEWS_KATEGORI`(`KATEGORI` ASC)
);

CREATE TABLE `KATEGORI_PENGUMUMAN`  (
  `NOMOR` decimal(4, 0) NOT NULL,
  `KATEGORI` varchar(50) NULL,
  `KETERANGAN` varchar(100) NULL,
  PRIMARY KEY (`NOMOR`),
  INDEX `KATEGORI_PENGUMUMAN_KATEGORI`(`KATEGORI` ASC)
);

CREATE TABLE `KELAS`  (
  `NOMOR` decimal(8, 0) NOT NULL,
  `PROGRAM` decimal(2, 0) NULL,
  `JURUSAN` decimal(2, 0) NULL,
  `KELAS` decimal(2, 0) NULL,
  `PARAREL` varchar(5) NULL,
  `KODE` varchar(15) NULL,
  `KODE_KELAS_ABSEN` varchar(4) NULL,
  `KODE_EPSBED` varchar(1) NULL,
  `KONSENTRASI` decimal(10, 0) NULL,
  `WALI_KELAS` decimal(10, 0) NULL,
  PRIMARY KEY (`NOMOR`)
);

CREATE TABLE `KELAS_PENDAFTAR`  (
  `NOMOR` decimal(4, 0) NOT NULL,
  `MAHASISWA_JALUR_PENERIMAAN` decimal(10, 0) NULL,
  `BATAS_BAWAH` decimal(10, 0) NULL,
  `BATAS_ATAS` decimal(10, 0) NULL,
  `KAPASITAS` decimal(4, 0) NULL,
  `UMMB` decimal(10, 0) NULL,
  `JUMLAH_PARAREL` decimal(1, 0) NULL,
  `KODE_AWAL` varchar(10) NULL,
  `PROGRAM` decimal(10, 0) NULL,
  `JURUSAN` decimal(10, 0) NULL,
  `DIGIT_NRP` decimal(10, 0) NULL,
  `TAHUN` decimal(4, 0) NULL,
  PRIMARY KEY (`NOMOR`)
);

CREATE TABLE `KELAS_PENDAFTAR_PARAREL`  (
  `NOMOR` decimal(10, 0) NOT NULL,
  `KELAS_PENDAFTAR` decimal(10, 0) NULL,
  `PARAREL` decimal(1, 0) NULL,
  `KELAS` decimal(10, 0) NULL,
  PRIMARY KEY (`NOMOR`)
);

CREATE TABLE `KELAS_PENDAFTAR_PLOT`  (
  `NOMOR` decimal(10, 0) NOT NULL,
  `KELAS_PENDAFTAR` decimal(10, 0) NULL,
  `JENIS_KELAMIN` char(1) NULL,
  `PARAREL` decimal(1, 0) NULL,
  `PENDAFTAR` decimal(10, 0) NULL,
  `NRP` varchar(12) NULL,
  `URUT` decimal(10, 0) NULL,
  `TAHUN` decimal(4, 0) NULL,
  PRIMARY KEY (`NOMOR`)
);

CREATE TABLE `KELAS_SEMESTER`  (
  `NOMOR` decimal(65, 30) NOT NULL,
  `SEMESTER` decimal(65, 30) NULL,
  `KELAS` decimal(65, 30) NULL,
  PRIMARY KEY (`NOMOR`)
);

CREATE TABLE `KELAS_SEMESTER_BAGI`  (
  `NOMOR` decimal(11, 0) NOT NULL,
  `TAHUN_AJARAN` decimal(4, 0) NULL,
  `SEMESTER_AJARAN` decimal(2, 0) NULL,
  `SEMESTER_TEMPUH` decimal(2, 0) NULL,
  `KELAS` decimal(3, 0) NULL,
  `PROGRAM` decimal(2, 0) NULL,
  `JURUSAN` decimal(2, 0) NULL,
  `JUMLAH_PEMBAGIAN` decimal(2, 0) NULL,
  `PEGAWAI_ENTRY` decimal(11, 0) NULL,
  `TANGGAL_ENTRY` datetime NULL,
  `TANGGAL_BAGI` datetime NULL,
  `JUMLAH_MAHASISWA` decimal(3, 0) NULL,
  `NAMA_PEGAWAI_ENTRY` varchar(100) NULL,
  `AKTIFKAN_PEMBAGIAN` decimal(1, 0) NULL,
  PRIMARY KEY (`NOMOR`)
);

CREATE TABLE `KETERANGAN_CERAI`  (
  `NOMOR` decimal(10, 0) NOT NULL,
  `KETERANGAN` varchar(50) NOT NULL,
  PRIMARY KEY (`NOMOR`)
);

CREATE TABLE `KETERANGAN_CUTI_DL`  (
  `NOMOR` decimal(10, 0) NOT NULL,
  `JENIS` varchar(50) NOT NULL,
  `LAMA` decimal(10, 0) NULL,
  `KODE` varchar(5) NULL,
  `TUNJANGAN_KINERJA` decimal(4, 0) NULL,
  PRIMARY KEY (`NOMOR`)
);

CREATE TABLE `KETERANGAN_MENINGGAL`  (
  `NOMOR` decimal(10, 0) NOT NULL,
  `KETERANGAN` varchar(50) NOT NULL,
  PRIMARY KEY (`NOMOR`)
);

CREATE TABLE `KETERANGAN_ORTU`  (
  `NOMOR` decimal(2, 0) NOT NULL,
  `KETERANGAN` varchar(20) NULL,
  PRIMARY KEY (`NOMOR`)
);

CREATE TABLE `KEU_ANALISA`  (
  `NOMOR` decimal(10, 0) NOT NULL,
  `PEGAWAI` decimal(10, 0) NOT NULL,
  `BULAN` decimal(10, 0) NULL,
  `TAHUN` varchar(10) NULL,
  `APBN_RUTIN1` decimal(10, 0) NULL,
  `APBN_RUTIN2` decimal(10, 0) NULL,
  `PNBP_RUTIN1` decimal(10, 0) NULL,
  `PNBP_RUTIN2` decimal(10, 0) NULL,
  `PNBP_EVENT` decimal(10, 0) NULL,
  `POT_APBN` decimal(10, 0) NULL,
  `POT_PNBP` decimal(10, 0) NULL,
  `GOLONGAN` varchar(10) NULL,
  `PINJAM_APBN` decimal(10, 0) NULL,
  `PINJAM_PNBP` decimal(10, 0) NULL,
  `APBN_RUTIN13` decimal(10, 0) NULL,
  `PNBP_RUTIN13` decimal(10, 0) NULL,
  `PNBP_EVENT_KERJASAMA` decimal(10, 0) NULL,
  `PNBP_EVENT_PJJ` decimal(10, 0) NULL,
  `PNBP_EVENT_VEDC` decimal(10, 0) NULL,
  PRIMARY KEY (`NOMOR`)
);

CREATE TABLE `KEU_APBN`  (
  `NOMOR` decimal(10, 0) NOT NULL,
  `PEGAWAI` decimal(10, 0) NOT NULL,
  `STATUS` varchar(1) NULL,
  `ISTRI` decimal(1, 0) NULL,
  `ANAK` decimal(2, 0) NULL,
  `TUNJ_UMUM` decimal(12, 0) NULL,
  `TUNJ_FUNGSIONAL` decimal(12, 0) NULL,
  `TUNJ_STRUKTURAL` decimal(12, 0) NULL,
  `PEMBULATAN` decimal(8, 0) NULL,
  `POT_BERAS` decimal(8, 0) NULL,
  `POT_SRUMAH` decimal(8, 0) NULL,
  `POT_HUTKL` decimal(8, 0) NULL,
  `POT_TABRM` decimal(8, 0) NULL,
  `BULAN` varchar(2) NULL,
  `TAHUN` varchar(4) NULL,
  `ENTRY_BY` decimal(10, 0) NULL,
  `GAPOK` decimal(12, 0) NULL,
  `TUNJ_BERAS` decimal(12, 0) NULL,
  `UANG_MAKAN` decimal(12, 0) NULL,
  `KETERANGAN` varchar(200) NULL,
  `PPH` decimal(10, 0) NULL,
  `TUNJ_ISTRI` decimal(12, 0) NULL,
  `TUNJ_ANAK` decimal(12, 0) NULL,
  `IURAN` decimal(12, 0) NULL,
  `MK_TAHUN` decimal(10, 0) NULL,
  `MK_BULAN` decimal(10, 0) NULL,
  `GOLONGAN` varchar(5) NULL,
  `GAJI13` decimal(10, 0) NULL,
  `REKENING` varchar(20) NULL,
  `STATUS_KARYAWAN` decimal(10, 0) NULL,
  `STATUS_PEGAWAI` decimal(10, 0) NULL,
  `TPP` decimal(10, 0) NULL,
  `TAMB_UMUM` decimal(10, 0) NULL,
  `TUNJ_PAPUA` decimal(10, 0) NULL,
  `TW_TERPENCIL` decimal(10, 0) NULL,
  `TUNJ_FUNG_LAIN` decimal(10, 0) NULL,
  `TUNGGAKAN` decimal(10, 0) NULL,
  `POT_LAIN` decimal(10, 0) NULL,
  `PENGALI` decimal(10, 1) NULL
);

CREATE TABLE `KEU_APBN_POTONGAN`  (
  `NOMOR` varchar(10) NOT NULL,
  `GOLONGAN` varchar(3) NULL,
  `KORPRI` decimal(10, 0) NULL,
  `IDATA` decimal(10, 0) NULL,
  `TABRM` decimal(10, 0) NULL,
  `UANG_DUKA` decimal(10, 0) NULL
);

CREATE TABLE `KEU_APBN_TUNJ_UMUM`  (
  `NOMOR` varchar(10) NOT NULL,
  `GOLONGAN` varchar(3) NULL,
  `TUNJANGAN` decimal(12, 0) NULL
);

CREATE TABLE `KEU_BANK`  (
  `NOMOR` decimal(10, 0) NOT NULL,
  `KETERANGAN` varchar(50) NULL
);

CREATE TABLE `KEU_BENDAHARA`  (
  `NOMOR` decimal(11, 0) NOT NULL,
  `PEGAWAI` decimal(11, 0) NULL,
  `KEU_JENIS_BENDAHARA` decimal(2, 0) NULL,
  PRIMARY KEY (`NOMOR`)
);

CREATE TABLE `KEU_DUKA`  (
  `NOMOR` decimal(10, 0) NOT NULL,
  `BULAN` varchar(2) NULL,
  `TAHUN` varchar(4) NULL,
  `PEGAWAI` decimal(4, 0) NULL,
  `SUAMI_ISTRI` decimal(4, 0) NULL,
  `ANAK` decimal(4, 0) NULL,
  `ORTU` decimal(4, 0) NULL,
  `PETUGAS` decimal(10, 0) NULL,
  `TGL_ENTRY` datetime NULL,
  `DUKA` datetime NULL
);

CREATE TABLE `KEU_JENIS`  (
  `NOMOR` decimal(10, 0) NOT NULL,
  `KETERANGAN` varchar(100) NULL,
  `STAFF` decimal(2, 0) NULL,
  `JENIS` decimal(2, 0) NULL,
  `KREDIT` decimal(2, 0) NULL,
  `NILAI` decimal(10, 0) NULL,
  `NON_PNS` decimal(10, 0) NULL
);

CREATE TABLE `KEU_JENIS_BENDAHARA`  (
  `NOMOR` decimal(2, 0) NOT NULL,
  `JENIS_BENDAHARA` varchar(50) NULL,
  PRIMARY KEY (`NOMOR`)
);

CREATE TABLE `KEU_JENIS_GAJI`  (
  `NOMOR` decimal(4, 0) NULL,
  `JENIS_GAJI` varchar(50) NULL,
  `PROSEN` decimal(10, 3) NULL
);

CREATE TABLE `KEU_JENIS_PEMBAYARAN`  (
  `NOMOR` decimal(2, 0) NOT NULL,
  `NAMA` varchar(100) NULL,
  `STATUS` char(2) NULL
);

CREATE TABLE `KEU_JENIS_RAPELAN`  (
  `NOMOR` decimal(10, 0) NOT NULL,
  `KETERANGAN` varchar(100) NULL,
  PRIMARY KEY (`NOMOR`)
);

CREATE TABLE `KEU_JENIS_UANG`  (
  `NOMOR` decimal(2, 0) NOT NULL,
  `KETERANGAN` varchar(50) NULL
);

CREATE TABLE `KEU_JKREDIT`  (
  `NOMOR` varchar(10) NOT NULL,
  `KETERANGAN` varchar(150) NULL,
  INDEX `INDX_KEU_JKREDIT`(`NOMOR` ASC)
);

CREATE TABLE `KEU_JPOT`  (
  `NOMOR` decimal(10, 0) NOT NULL,
  `KETERANGAN` varchar(100) NULL,
  `KREDIT` decimal(1, 0) NULL,
  INDEX `INDX_KEU_JPOT`(`NOMOR` ASC, `KREDIT` ASC)
);

CREATE TABLE `KEU_KODE_PAJAK`  (
  `ID_KODE_PAJAK` decimal(5, 0) NOT NULL,
  `KODE_PAJAK` varchar(6) NOT NULL,
  `KODE_JENIS_SETORAN` varchar(3) NOT NULL,
  `PERSEN_PAJAK` decimal(3, 0) NOT NULL,
  `KETERANGAN` varchar(15) NULL
);

CREATE TABLE `KEU_KONSTANTA`  (
  `NOMOR` decimal(10, 0) NOT NULL,
  `KETERANGAN` varchar(50) NULL,
  `NILAI` decimal(10, 0) NULL
);

CREATE TABLE `KEU_PELUNASAN`  (
  `NOMOR` decimal(10, 0) NOT NULL,
  `PINJAMAN` decimal(10, 0) NOT NULL,
  `SISA_ANGSURAN` decimal(10, 0) NOT NULL,
  `TGL_PELUNASAN` datetime NULL,
  `PETUGAS` decimal(10, 0) NULL,
  `TGL_ENTRY` datetime NULL,
  `POTONG` decimal(1, 0) NULL,
  `POTONG_BLN` datetime NULL
);

CREATE TABLE `KEU_PENERIMAAN`  (
  `NOMOR` decimal(10, 0) NOT NULL,
  `NAMA` varchar(100) NULL,
  `STATUS` char(2) NULL,
  `KODE_MAP` varchar(10) NULL
);

CREATE TABLE `KEU_PICK_FROM`  (
  `NOMOR` decimal(10, 0) NOT NULL,
  `KETERANGAN` varchar(100) NULL,
  INDEX `INDX_KEU_PICK_FROM`(`NOMOR` ASC)
);

CREATE TABLE `KEU_PINJAMAN`  (
  `NOMOR` decimal(10, 0) NOT NULL,
  `PEGAWAI` decimal(10, 0) NULL,
  `BLN_AWAL_PINJAM` varchar(2) NULL,
  `THN_AWAL_PINJAM` varchar(4) NULL,
  `BLN_AKHIR_PINJAM` varchar(2) NULL,
  `THN_AKHIR_PINJAM` varchar(4) NULL,
  `KREDIT` decimal(10, 0) NULL,
  `BANK` decimal(10, 0) NULL,
  `NILAI_KREDIT` decimal(12, 0) NULL,
  `NILAI_ANGSURAN` decimal(12, 0) NULL,
  `ANGSURAN_KE` decimal(10, 0) NULL,
  `SISA_ANGSURAN` decimal(12, 0) NULL,
  `KETERANGAN` varchar(150) NULL,
  `ENTRY_BY` decimal(10, 0) NULL,
  `PICK_FROM` decimal(2, 0) NULL,
  `STATUS` decimal(1, 0) NULL,
  `PJM_POKOK` decimal(12, 0) NULL,
  `PJM_BUNGA` decimal(12, 0) NULL,
  `PJM_BULAT` decimal(12, 0) NULL,
  `PJM_BULAN` decimal(12, 0) NULL,
  `TGL_REALISASI` datetime NULL,
  `TGL_ENTRY` datetime NULL,
  INDEX `INDX_KEU_PINJAMAN1`(`NOMOR` ASC, `PEGAWAI` ASC, `KREDIT` ASC, `PICK_FROM` ASC, `STATUS` ASC, `SISA_ANGSURAN` ASC)
);

CREATE TABLE `KEU_PINJAMAN_DEL`  (
  `NOMOR` decimal(10, 0) NOT NULL,
  `PEGAWAI` decimal(10, 0) NULL,
  `BLN_AWAL_PINJAM` varchar(2) NULL,
  `THN_AWAL_PINJAM` varchar(4) NULL,
  `BLN_AKHIR_PINJAM` varchar(2) NULL,
  `THN_AKHIR_PINJAM` varchar(4) NULL,
  `KREDIT` decimal(10, 0) NULL,
  `BANK` decimal(10, 0) NULL,
  `NILAI_KREDIT` decimal(12, 0) NULL,
  `NILAI_ANGSURAN` decimal(12, 0) NULL,
  `ANGSURAN_KE` decimal(10, 0) NULL,
  `SISA_ANGSURAN` decimal(12, 0) NULL,
  `KETERANGAN` varchar(150) NULL,
  `ENTRY_BY` decimal(10, 0) NULL,
  `PICK_FROM` decimal(2, 0) NULL,
  `STATUS` decimal(1, 0) NULL,
  `PJM_POKOK` decimal(12, 0) NULL,
  `PJM_BUNGA` decimal(12, 0) NULL,
  `PJM_BULAT` decimal(12, 0) NULL,
  `PJM_BULAN` decimal(12, 0) NULL,
  `TGL_REALISASI` datetime NULL,
  `TGL_ENTRY` datetime NULL
);

CREATE TABLE `KEU_PNBP_EVENT_4_NEW`  (
  `NOMOR` decimal(10, 0) NOT NULL,
  `SK` varchar(100) NULL,
  `NOMOR_SK` varchar(100) NULL,
  `EVENT` text NULL,
  `TGL_BAYAR` decimal(2, 0) NULL,
  `BLN_BAYAR` decimal(2, 0) NULL,
  `THN_BAYAR` varchar(4) NULL,
  `IS_HONORARIUM_PAJAK` decimal(1, 0) NULL,
  `JURUSAN` decimal(2, 0) NULL,
  `TGL_TRANSFER` decimal(2, 0) NULL,
  `BLN_TRANSFER` decimal(2, 0) NULL,
  `THN_TRANSFER` varchar(4) NULL,
  `JUDUL` varchar(50) NULL,
  `JML_REKENING` decimal(10, 0) NULL,
  `JML_TUNAI` decimal(10, 0) NULL,
  `BENDAHARA` decimal(4, 0) NULL,
  `DANA` decimal(2, 0) NULL,
  `STAFF` decimal(4, 0) NULL,
  `T_AJARAN` varchar(4) NULL,
  `SEMESTER` decimal(2, 0) NULL,
  `ID_RKAKL` decimal(10, 0) NULL,
  `STATUS_SPTJB` decimal(2, 0) NULL,
  `STATUS_SPM_BAYAR` decimal(2, 0) NULL,
  `STATUS_SSP` decimal(2, 0) NULL,
  `TOTAL_HONORARIUM` decimal(20, 0) NULL,
  `TOTAL_PAJAK` decimal(20, 0) NULL,
  `TOTAL_PENERIMAAN` decimal(20, 0) NULL,
  INDEX `INDX_KPE4_1`(`NOMOR` ASC, `TGL_BAYAR` ASC, `BLN_BAYAR` ASC, `THN_BAYAR` ASC, `IS_HONORARIUM_PAJAK` ASC),
  INDEX `INDX_KPE4_2`(`NOMOR` ASC, `TGL_TRANSFER` ASC, `BLN_TRANSFER` ASC, `THN_TRANSFER` ASC, `IS_HONORARIUM_PAJAK` ASC)
);

CREATE TABLE `KEU_PNBP_EVENT_4_NEW_2`  (
  `NOMOR` decimal(10, 0) NOT NULL,
  `KEU_PNBP_EVENT_4_NEW` decimal(10, 0) NULL,
  `PEGAWAI` decimal(10, 0) NULL,
  `GLR_DPN` varchar(20) NULL,
  `GLR_BLK` varchar(20) NULL,
  `REKENING_BANK` varchar(20) NULL,
  `GOLONGAN` varchar(5) NULL,
  `JABATAN` decimal(3, 0) NULL,
  `HONORARIUM` decimal(10, 0) NULL,
  `JML_MHS_D3` decimal(4, 2) NULL,
  `JML_MHS_D4` decimal(4, 2) NULL,
  `PENERIMAAN` decimal(10, 0) NULL,
  `PAJAK` decimal(10, 0) NULL,
  INDEX `KPE_4_NEW_2`(`PEGAWAI` ASC, `KEU_PNBP_EVENT_4_NEW` ASC, `JABATAN` ASC, `JML_MHS_D3` ASC, `JML_MHS_D4` ASC)
);

CREATE TABLE `KEU_PNBP_EVENT_5`  (
  `NOMOR` decimal(10, 0) NOT NULL,
  `SK` varchar(100) NULL,
  `NOMOR_SK` varchar(100) NULL,
  `EVENT` text NULL,
  `IS_HONORARIUM_PAJAK` decimal(1, 0) NULL,
  `TGL_BAYAR` decimal(2, 0) NULL,
  `BLN_BAYAR` decimal(2, 0) NULL,
  `THN_BAYAR` varchar(4) NULL,
  `PROGRAM_STUDI` decimal(3, 0) NULL,
  `TGL_TRANSFER` decimal(2, 0) NULL,
  `BLN_TRANSFER` decimal(2, 0) NULL,
  `THN_TRANSFER` varchar(4) NULL,
  `JUDUL` varchar(50) NULL,
  `JML_REKENING` decimal(10, 0) NULL,
  `JML_TUNAI` decimal(10, 0) NULL,
  `BENDAHARA` decimal(4, 0) NULL,
  `DANA` decimal(2, 0) NULL,
  `STAFF` decimal(2, 0) NULL,
  `KEGIATAN` decimal(2, 0) NULL,
  `T_AJARAN` varchar(4) NULL,
  `SEMESTER` decimal(2, 0) NULL,
  `KELAS` decimal(2, 0) NULL,
  `ID_RKAKL` decimal(10, 0) NULL,
  `STATUS_SPTJB` decimal(2, 0) NULL,
  `STATUS_SPM_BAYAR` decimal(2, 0) NULL,
  `STATUS_SSP` decimal(2, 0) NULL,
  `TOTAL_HONORARIUM` decimal(20, 0) NULL,
  `TOTAL_PAJAK` decimal(20, 0) NULL,
  `TOTAL_PENERIMAAN` decimal(20, 0) NULL,
  INDEX `INDX_KPE5`(`NOMOR` ASC, `TGL_BAYAR` ASC, `BLN_BAYAR` ASC, `THN_TRANSFER` ASC, `IS_HONORARIUM_PAJAK` ASC),
  INDEX `INDX_KPE5_2`(`NOMOR` ASC, `TGL_TRANSFER` ASC, `BLN_TRANSFER` ASC, `THN_TRANSFER` ASC, `IS_HONORARIUM_PAJAK` ASC)
);

CREATE TABLE `KEU_PNBP_EVENT_5_DETILX`  (
  `NOMOR` decimal(10, 0) NOT NULL,
  `KEU_PNBP_EVENT_5` decimal(10, 0) NOT NULL,
  `PEGAWAI` decimal(10, 0) NOT NULL,
  `GLR_DPN` varchar(20) NULL,
  `GLR_BLK` varchar(20) NULL,
  `GOLONGAN` varchar(5) NULL,
  `REKENING_BANK` varchar(20) NULL,
  `JABATAN` decimal(10, 0) NULL,
  `HONORARIUM` decimal(10, 0) NULL,
  `JUMLAH_JAM` decimal(3, 0) NULL,
  `PENERIMAAN` decimal(10, 0) NULL,
  `PAJAK` decimal(10, 0) NULL,
  INDEX `INDX_KPE5D`(`NOMOR` ASC, `KEU_PNBP_EVENT_5` ASC, `PEGAWAI` ASC),
  INDEX `KPE_5_DETILX`(`PEGAWAI` ASC, `KEU_PNBP_EVENT_5` ASC, `JABATAN` ASC, `JUMLAH_JAM` ASC)
);

CREATE TABLE `KEU_PNBP_EVENT_TATAP_MUKA`  (
  `NOMOR` decimal(10, 0) NOT NULL,
  `EVENT` text NULL,
  `SK` varchar(100) NULL,
  `NOMOR_SK` varchar(100) NULL,
  `TAHUN` decimal(4, 0) NULL,
  `SEMESTER` decimal(1, 0) NULL,
  `PROGRAM` decimal(3, 0) NULL,
  `IS_HONORARIUM_PAJAK` decimal(1, 0) NULL,
  `TGL_BAYAR` decimal(2, 0) NULL,
  `BLN_BAYAR` decimal(2, 0) NULL,
  `THN_BAYAR` varchar(4) NULL,
  `TGL_TRANSFER` decimal(2, 0) NULL,
  `BLN_TRANSFER` decimal(2, 0) NULL,
  `THN_TRANSFER` varchar(4) NULL,
  `JUDUL` varchar(50) NULL,
  `JML_REKENING` decimal(10, 0) NULL,
  `JML_TUNAI` decimal(10, 0) NULL,
  `BENDAHARA` decimal(10, 0) NULL,
  `DANA` decimal(10, 0) NULL,
  `NOMOR_BUKTI` varchar(50) NULL,
  `MAK` varchar(50) NULL,
  `STAFF` decimal(10, 0) NULL,
  `STATUS_KELAS` decimal(10, 0) NULL,
  `BULAN_GAJI` decimal(10, 0) NULL,
  `TAHUN_GAJI` decimal(10, 0) NULL
);

CREATE TABLE `KEU_PNBP_GAJI_HONORER`  (
  `NOMOR` decimal(10, 0) NOT NULL,
  `SK` varchar(100) NULL,
  `NOMOR_SK` varchar(100) NULL,
  `KETERANGAN` varchar(100) NULL,
  `TGL_AWAL` decimal(2, 0) NULL,
  `BLN_AWAL` decimal(2, 0) NULL,
  `THN_AWAL` varchar(4) NULL,
  `IS_GAJI_PAJAK` decimal(1, 0) NULL,
  `STATUS` decimal(1, 0) NULL,
  INDEX `INDX_KPGH`(`NOMOR` ASC, `STATUS` ASC, `IS_GAJI_PAJAK` ASC, `TGL_AWAL` ASC, `BLN_AWAL` ASC, `THN_AWAL` ASC)
);

CREATE TABLE `KEU_PNBP_KOREKSI`  (
  `NOMOR` decimal(10, 0) NOT NULL,
  `KET` varchar(20) NULL,
  `SATUAN` varchar(20) NULL,
  `NILAI` decimal(10, 0) NULL,
  INDEX `INDX_KPK`(`NOMOR` ASC)
);

CREATE TABLE `KEU_PNBP_PENGAWAS`  (
  `NOMOR` decimal(10, 0) NOT NULL,
  `KET` varchar(20) NULL,
  `SATUAN` varchar(20) NULL,
  `NILAI` varchar(10) NULL
);

CREATE TABLE `KEU_PNBP_SK`  (
  `NO` decimal(10, 0) NOT NULL,
  `NAMA_SK` varchar(200) NULL,
  INDEX `INDX_KPS`(`NO` ASC)
);

CREATE TABLE `KEU_PNBP_SK_DETIL`  (
  `NO` decimal(10, 0) NOT NULL,
  `KEU_PNBP_SK` decimal(10, 0) NULL,
  `NOMOR_SK` varchar(40) NULL,
  `SESUAI_SK` varchar(30) NULL,
  `TGL_BERLAKU` datetime NULL,
  `STATUS` decimal(1, 0) NULL,
  INDEX `INDX_KPSD`(`NO` ASC, `KEU_PNBP_SK` ASC, `STATUS` ASC)
);

CREATE TABLE `KEU_PNBP_SK_TEMP`  (
  `NOMOR` decimal(10, 0) NOT NULL,
  `SK_TATAP_MUKA` varchar(100) NULL,
  `NOMOR_SK_TATAP_MUKA` varchar(100) NULL,
  `SK_TRANSPORTASI` varchar(100) NULL,
  `NOMOR_SK_TRANSPORTASI` varchar(100) NULL,
  `SK_KOREKSI` varchar(100) NULL,
  `NOMOR_SK_KOREKSI` varchar(100) NULL,
  `SK_SOAL` varchar(100) NULL,
  `NOMOR_SK_SOAL` varchar(100) NULL,
  `SK_PENGAWAS` varchar(100) NULL,
  `NOMOR_SK_PENGAWAS` varchar(100) NULL,
  `SK_TPPA_TA` varchar(100) NULL,
  `NOMOR_SK_TPPA_TA` varchar(100) NULL,
  `SK_TM_PELATIHAN` varchar(100) NULL,
  `NOMOR_SK_TM_PELATIHAN` varchar(100) NULL,
  `SK_TM_PJJ` varchar(100) NULL,
  `NOMOR_SK_TM_PJJ` varchar(100) NULL,
  `SK_TM_VEDC` varchar(100) NULL,
  `NOMOR_SK_TM_VEDC` varchar(100) NULL,
  `SK_TRANS_PELATIHAN` varchar(100) NULL,
  `NOMOR_SK_TRANS_PELATIHAN` varchar(100) NULL,
  `NOMOR_SK_TRANS_PJJ` varchar(100) NULL,
  `SK_TRANS_VEDC` varchar(100) NULL,
  `NOMOR_SK_TRANS_VEDC` varchar(100) NULL,
  `SK_TRANS_PJJ` varchar(100) NULL,
  `SK_SOAL_PJJ` varchar(100) NULL,
  `SK_SOAL_VEDC` varchar(100) NULL,
  `NOMOR_SK_SOAL_PJJ` varchar(100) NULL,
  `NOMOR_SK_SOAL_VEDC` varchar(100) NULL,
  `SK_KOREKSI_PJJ` varchar(100) NULL,
  `NOMOR_SK_KOREKSI_PJJ` varchar(100) NULL,
  `SK_KOREKSI_VEDC` varchar(100) NULL,
  `NOMOR_SK_KOREKSI_VEDC` varchar(100) NULL,
  `SK_PENGAWAS_PJJ` varchar(100) NULL,
  `NOMOR_SK_PENGAWAS_PJJ` varchar(100) NULL,
  `SK_PENGAWAS_VEDC` varchar(100) NULL,
  `NOMOR_SK_PENGAWAS_VEDC` varchar(100) NULL,
  `SK_TPPA_TA_PJJ` varchar(100) NULL,
  `NOMOR_SK_TPPA_TA_PJJ` varchar(100) NULL,
  `SK_TPPA_TA_VEDC` varchar(100) NULL,
  `NOMOR_SK_TPPA_TA_VEDC` varchar(100) NULL,
  `SK_KULIAH_ONLINE` varchar(100) NULL,
  `NOMOR_SK_KULIAH_ONLINE` varchar(100) NULL
);

CREATE TABLE `KEU_PNBP_SOAL`  (
  `NOMOR` decimal(10, 0) NOT NULL,
  `KET` varchar(30) NULL,
  `SATUAN` varchar(30) NULL,
  `NILAI` varchar(10) NULL
);

CREATE TABLE `KEU_PNBP_TATAP_MUKA`  (
  `NOMOR` decimal(10, 0) NOT NULL,
  `KET` varchar(50) NULL,
  `SATUAN` varchar(50) NULL,
  `NILAI` decimal(10, 0) NULL,
  `STAFF` decimal(10, 0) NULL,
  `KELAS` decimal(10, 0) NULL,
  `PENDIDIKAN` decimal(10, 0) NULL,
  PRIMARY KEY (`NOMOR`),
  INDEX `INDX_KPTM`(`NOMOR` ASC)
);

CREATE TABLE `KEU_PNBP_TPPA_TA`  (
  `NOMOR` decimal(10, 0) NOT NULL,
  `KET` varchar(50) NULL,
  `SATUAN` varchar(20) NULL,
  `NILAI` varchar(10) NULL
);

CREATE TABLE `KEU_PNBP_TRANSFER_RUTIN`  (
  `NOMOR` decimal(10, 0) NOT NULL,
  `BULAN` decimal(2, 0) NULL,
  `TAHUN` varchar(4) NULL,
  `TGL_TRANSFER_RUTIN1` decimal(2, 0) NULL,
  `BLN_TRANSFER_RUTIN1` decimal(2, 0) NULL,
  `THN_TRANSFER_RUTIN1` varchar(4) NULL,
  `TGL_TRANSFER_RUTIN10` decimal(2, 0) NULL,
  `BLN_TRANSFER_RUTIN10` decimal(2, 0) NULL,
  `THN_TRANSFER_RUTIN10` varchar(4) NULL,
  `TGL_TRANSFER_RUTIN13` decimal(2, 0) NULL,
  `BLN_TRANSFER_RUTIN13` decimal(2, 0) NULL,
  `THN_TRANSFER_RUTIN13` varchar(4) NULL,
  `TANGGAL_GAJI_APBN` datetime NULL,
  `TANGGAL_UMAKAN_APBN` datetime NULL,
  `TANGGAL_GAJI_PNBP` datetime NULL,
  `TANGGAL_INSENTIVE_PNBP` datetime NULL,
  `TANGGAL_TJABATAN_PNBP` datetime NULL,
  `TANGGAL_TKEDISIPLINAN_PNBP` datetime NULL,
  `TANGGAL_TKEHADIRAN_PNBP` datetime NULL,
  `TANGGAL_TKINERJA_PNBP` datetime NULL,
  INDEX `INDX_KPTT`(`NOMOR` ASC, `BULAN` ASC, `TAHUN` ASC)
);

CREATE TABLE `KEU_PNBP_TUNJ_HADIR_DETIL`  (
  `NOMOR` decimal(10, 0) NOT NULL,
  `TUNJ_HADIR` decimal(10, 0) NULL,
  `GOLONGAN` decimal(2, 0) NULL,
  `JUMLAH` decimal(10, 0) NULL,
  PRIMARY KEY (`NOMOR`)
);

CREATE TABLE `KEU_PNBP_TUNJ_HADIR_KET`  (
  `NOMOR` decimal(10, 0) NOT NULL,
  `KETERANGAN` varchar(30) NULL
);

CREATE TABLE `KEU_PNBP_TUNJ_UMUM`  (
  `NOMOR` decimal(10, 0) NOT NULL,
  `GOLONGAN` varchar(4) NULL,
  `NILAI` decimal(10, 0) NULL,
  `TUNJ_UMUM` decimal(10, 0) NULL,
  PRIMARY KEY (`NOMOR`)
);

CREATE TABLE `KEU_PNBP_UANG_DUKA`  (
  `NOMOR` decimal(10, 0) NOT NULL,
  `GOLONGAN` varchar(5) NULL,
  `POT_PEGAWAI` decimal(8, 0) NULL,
  `POT_ORTU` decimal(8, 0) NULL,
  `POT_SUAMI_ISTRI` decimal(8, 0) NULL,
  `POT_ANAK` decimal(8, 0) NULL,
  `KEU_UANG_DUKA_NEW` decimal(10, 0) NULL,
  INDEX `INDX_KPUD`(`NOMOR` ASC)
);

CREATE TABLE `KEU_POKOK_PNS`  (
  `NOMOR` decimal(10, 0) NOT NULL,
  `MASAKERJA` decimal(2, 0) NULL,
  `GOLONGAN` varchar(3) NULL,
  `A` decimal(12, 0) NULL,
  `B` decimal(12, 0) NULL,
  `C` decimal(12, 0) NULL,
  `D` decimal(12, 0) NULL,
  `E` decimal(12, 0) NULL,
  `SURAT` decimal(10, 0) NULL,
  `ENTRY_BY` decimal(10, 0) NULL
);

CREATE TABLE `KEU_POTONGAN`  (
  `NOMOR` decimal(10, 0) NOT NULL,
  `BULAN` varchar(2) NULL,
  `TAHUN` varchar(4) NULL,
  `PEGAWAI` decimal(10, 0) NULL,
  `JPOT` decimal(12, 0) NULL,
  `POTONGAN` decimal(12, 0) NULL,
  `TGL_ENTRY` datetime NULL,
  `ENTRY_BY` decimal(10, 0) NULL
);

CREATE TABLE `KEU_PPH21`  (
  `NOMOR` decimal(10, 0) NOT NULL,
  `NAMA_POTONGAN` varchar(50) NOT NULL,
  `NILAI` decimal(10, 2) NOT NULL,
  UNIQUE INDEX `PPH21_IDX`(`NOMOR` ASC)
);

CREATE TABLE `KEU_PPK`  (
  `ID_PPK` decimal(1, 0) NOT NULL,
  `SPTJB_PPK` decimal(8, 0) NOT NULL,
  `SPP_PPK` decimal(8, 0) NOT NULL,
  `SPP_PENGUJI` decimal(8, 0) NOT NULL,
  `SPM_PPK` decimal(8, 0) NOT NULL,
  PRIMARY KEY (`ID_PPK`)
);

CREATE TABLE `KEU_STAFF`  (
  `NOMOR` decimal(3, 0) NOT NULL,
  `KETERANGAN` varchar(50) NULL
);

CREATE TABLE `KEU_STATUS_KAWIN`  (
  `NOMOR` decimal(10, 0) NOT NULL,
  `KODE` decimal(5, 0) NULL,
  `KETERANGAN` varchar(50) NULL,
  `PTKP` decimal(10, 0) NULL
);

CREATE TABLE `KEU_STATUS_PINJAMAN`  (
  `NOMOR` decimal(10, 0) NULL,
  `KETERANGAN` varchar(50) NULL,
  INDEX `INDX_KSP`(`NOMOR` ASC)
);

CREATE TABLE `KEU_SURAT`  (
  `NOMOR` decimal(10, 0) NOT NULL,
  `TANGGAL` datetime NULL,
  `NOMOR_SURAT` varchar(50) NULL,
  `NOPP` decimal(4, 0) NULL,
  `TAHUN` varchar(4) NULL,
  `STATUS` decimal(1, 0) NULL,
  `ENTRY_BY` decimal(10, 0) NULL,
  `BARU` decimal(1, 0) NULL
);

CREATE TABLE `KEU_TANDA_TANGAN`  (
  `NOMOR` decimal(10, 0) NOT NULL,
  `PEGAWAI` decimal(5, 0) NULL,
  `JABATAN` varchar(100) NULL
);

CREATE TABLE `KEU_TOTAL_GAJI`  (
  `NOMOR` decimal(10, 0) NOT NULL,
  `BULAN` varchar(2) NULL,
  `TAHUN` varchar(4) NULL,
  `PEGAWAI` decimal(10, 0) NULL,
  `BERSIH` decimal(12, 0) NULL,
  `POTONGAN` decimal(12, 0) NULL,
  `TOTAL_BAYAR` decimal(12, 0) NULL
);

CREATE TABLE `KEU_TUNJ_MAKAN`  (
  `NOMOR` decimal(10, 0) NOT NULL,
  `SK` varchar(25) NULL,
  `NOMOR_SK` varchar(50) NULL,
  `STATUS` decimal(2, 0) NULL,
  `JUMLAH` decimal(10, 0) NULL,
  `TANGGAL` datetime NULL
);

CREATE TABLE `KEU_UANG_DUKA`  (
  `NOMOR` decimal(10, 0) NOT NULL,
  `GOLONGAN` varchar(4) NULL,
  `PEGAWAI` decimal(10, 0) NULL,
  `SUAMI_ISTRI` decimal(10, 0) NULL,
  `ANAK` decimal(10, 0) NULL,
  `ORTU` decimal(10, 0) NULL,
  `TANGGAL_BERLAKU` datetime NULL,
  `STATUS` decimal(1, 0) NULL
);

CREATE TABLE `KEU_UANG_DUKA_NEW`  (
  `NOMOR` decimal(10, 0) NOT NULL,
  `SK` varchar(20) NULL,
  `NOMOR_SK` varchar(30) NULL,
  `TANGGAL` datetime NULL,
  `STATUS` decimal(2, 0) NULL
);

CREATE TABLE `KINERJA_TATAP_MUKA`  (
  `NOMOR` decimal(10, 0) NOT NULL,
  `PEGAWAI` decimal(4, 0) NULL,
  `STAFF` decimal(2, 0) NULL,
  `JENIS_KINERJA` decimal(3, 0) NULL,
  `TAHUN_AKADEMIK` varchar(20) NULL,
  `SEMESTER` decimal(2, 0) NULL,
  `JAM_MULAI` varchar(10) NULL,
  `JAM_SELESAI` varchar(10) NULL,
  `PERTEMUAN_KE` decimal(3, 0) NULL,
  `MATAKULIAH` varchar(100) NULL,
  `TANGGAL` datetime NULL,
  `KELAS` varchar(10) NULL,
  `SESUAI_JADWAL` decimal(2, 0) NULL,
  `ALASAN_TIDAK` text NULL,
  `JML_MAHASISWA` decimal(3, 0) NULL,
  `JML_SAKIT` decimal(3, 0) NULL,
  `JML_IJIN` decimal(3, 0) NULL,
  `JML_ALPHA` decimal(3, 0) NULL,
  `NRP_MHS_SAKIT` text NULL,
  `NRP_MHS_ALPHA` text NULL,
  `MODUL_MATERI` text NULL,
  `SESUAI_SAP` decimal(2, 0) NULL,
  `MEDIA_PENYAMPAIAN` decimal(2, 0) NULL,
  `STUDI_KASUS` text NULL,
  `TGS_MGGU_DEPAN` text NULL,
  `NILAI_KOGNITIF_MHS` decimal(2, 0) NULL,
  `NILAI_AFEKTIF_MHS` decimal(2, 0) NULL,
  `NILAI_DISIPLIN_MHS` decimal(2, 0) NULL,
  `NILAI_TERTIB_MHS` decimal(2, 0) NULL,
  `NILAI_BAHASAN_DOSEN` decimal(2, 0) NULL,
  `NILAI_DISKUSI_DOSEN` decimal(2, 0) NULL,
  `NILAI_MAMPU_MATERI_DOSEN` decimal(2, 0) NULL,
  `NILAI_KUASA_MATERI_DOSEN` decimal(2, 0) NULL,
  `NILAI_JAWAB_DOSEN` decimal(2, 0) NULL,
  `NILAI_KUASA_KELAS_DOSEN` decimal(2, 0) NULL,
  `TERLAMBAT_MENGAJAR` decimal(2, 0) NULL,
  `MAHASISWA_TERLAMBAT` decimal(2, 0) NULL,
  `SANKSI` decimal(2, 0) NULL,
  `BAHAS_TUGAS` decimal(2, 0) NULL,
  `KEJENUHAN` decimal(2, 0) NULL,
  `TANGGAL_TTD` datetime NULL,
  `MINGGU_PENGGANTI` decimal(2, 0) NULL,
  `JML_BUTUH_ALAT` decimal(3, 0) NULL,
  `JML_TERSEDIA` decimal(3, 0) NULL,
  `MASALAH` text NULL,
  `SOLUSI` text NULL,
  `CATATAN` text NULL,
  `NILAI_DISIPLIN_LABORAN` decimal(2, 0) NULL,
  `NILAI_TANGGUNGJAWAB_LABORAN` decimal(2, 0) NULL,
  `NILAI_KERJASAMA_LABORAN` decimal(2, 0) NULL,
  `NILAI_KREATIFITAS_LABORAN` decimal(2, 0) NULL,
  `NILAI_SEMANGAT_LABORAN` decimal(2, 0) NULL,
  `TERLAMBAT_MENGAJAR_PRAK` decimal(2, 0) NULL,
  `MAHASISWA_TERLAMBAT_PRAK` decimal(2, 0) NULL,
  `SANKSI_PRAK` decimal(2, 0) NULL,
  `PENILAIAN_TUGAS_PRAK` decimal(2, 0) NULL,
  `ALAT_BAIK_PRAK` decimal(2, 0) NULL,
  `KEJENUHAN_PRAK` decimal(2, 0) NULL,
  `KULIAH` decimal(10, 0) NULL,
  `NILAI_PSIKOMOTORIK` decimal(2, 0) NULL,
  `KUALITAS_PENDAMPINGAN` decimal(2, 0) NULL,
  `MEDIA_PENYAMPAIAN2` decimal(2, 0) NULL,
  `HARI_2` decimal(2, 0) NULL,
  PRIMARY KEY (`NOMOR`),
  INDEX `IDX_KINERJA_TATAP_MUKA`(`KULIAH` ASC, `PEGAWAI` ASC, `TANGGAL` ASC)
);

CREATE TABLE `KODE_RUANG`  (
  `NOMOR` char(1) NOT NULL,
  `RUANG` varchar(100) NULL,
  PRIMARY KEY (`NOMOR`)
);

CREATE TABLE `KODE_SURAT`  (
  `KODE` varchar(2) NOT NULL,
  `KETERANGAN` varchar(80) NULL,
  `NOMOR` decimal(10, 0) NOT NULL,
  `HITUNG` decimal(10, 0) NOT NULL
);

CREATE TABLE `KONTER`  (
  `NO` varchar(10) NULL,
  `JUMLAH` varchar(10) NULL
);

CREATE TABLE `KP_DAFTAR`  (
  `NOMOR` decimal(10, 0) NOT NULL,
  `TANGGAL_ENTRI` datetime NULL,
  `DAFTAR_UJIAN` decimal(1, 0) NULL,
  `TANGGAL_UJIAN` datetime NULL,
  `TEMPAT_UJIAN` decimal(10, 0) NULL,
  `ANGGOTA_PENGUJI_UJIAN1` decimal(10, 0) NULL,
  `ANGGOTA_PENGUJI_UJIAN2` decimal(10, 0) NULL,
  `ANGGOTA_PENGUJI_UJIAN2_EXT` varchar(100) NULL,
  `JENIS_ANGGOTA_PENGUJI_UJIAN2` decimal(1, 0) NULL,
  `NAMA_PEMBIMBING_LAPANGAN` varchar(50) NULL,
  PRIMARY KEY (`NOMOR`)
);

CREATE TABLE `KP_DAFTAR_DETIL`  (
  `NOMOR` decimal(10, 0) NOT NULL,
  `KP_DAFTAR` decimal(10, 0) NOT NULL,
  `MAHASISWA` decimal(10, 0) NOT NULL,
  `PROGRAM_MKU` decimal(1, 0) NULL,
  `SESUAI_BIDANG` decimal(1, 0) NULL,
  `PKL_CICILAN` decimal(1, 0) NULL,
  `LAMA_PKL_CICILAN` decimal(3, 0) NULL,
  PRIMARY KEY (`NOMOR`)
);

CREATE TABLE `KP_DAFTAR_KOORDINATOR`  (
  `NOMOR` decimal(10, 0) NOT NULL,
  `PROGRAM` decimal(10, 0) NULL,
  `JURUSAN` decimal(10, 0) NULL,
  `PEGAWAI` decimal(10, 0) NULL,
  PRIMARY KEY (`NOMOR`)
);

CREATE TABLE `KP_DAFTAR_TANGGAL`  (
  `NOMOR` decimal(10, 0) NOT NULL,
  `PROGRAM` decimal(10, 0) NULL,
  `JURUSAN` decimal(10, 0) NULL,
  `TANGGAL_AWAL` datetime NULL,
  `TANGGAL_AKHIR` datetime NULL,
  PRIMARY KEY (`NOMOR`)
);

CREATE TABLE `KP_DAFTAR_TEMPAT`  (
  `NOMOR` decimal(10, 0) NOT NULL,
  `TEMPAT` varchar(50) NULL,
  `ALAMAT` text NULL,
  `KOTA` decimal(10, 0) NULL,
  `BULAN_PELAKSANAAN` decimal(2, 0) NULL,
  `TAHUN_PELAKSANAAN` decimal(4, 0) NULL,
  `PEMBIMBING` decimal(10, 0) NULL,
  `STATUS_PERSETUJUAN` decimal(1, 0) NULL,
  `TANGGAL_ENTRI` datetime NOT NULL,
  `CATATAN` text NULL,
  `KP_DAFTAR` decimal(10, 0) NULL,
  PRIMARY KEY (`NOMOR`)
);

CREATE TABLE `KULIAH`  (
  `NOMOR` decimal(8, 0) NOT NULL,
  `TAHUN` decimal(4, 0) NOT NULL,
  `SEMESTER` decimal(1, 0) NOT NULL,
  `KELAS` decimal(8, 0) NOT NULL,
  `MATAKULIAH` decimal(8, 0) NULL,
  `HARI` decimal(1, 0) NULL,
  `JAM` decimal(4, 0) NULL,
  `RUANG` decimal(4, 0) NULL,
  `DOSEN` decimal(8, 0) NULL,
  `ASISTEN` decimal(8, 0) NULL,
  `KEHADIRAN` decimal(2, 0) NULL,
  `TGLUJIAN` datetime NULL,
  `RUANGUJIAN` decimal(4, 0) NULL,
  `TGLNILAI` datetime NULL,
  `IP_PC` varchar(50) NULL,
  `HOST_PC` varchar(100) NULL,
  `USER_PC` varchar(100) NULL,
  `PROSENQ1` decimal(3, 0) NULL,
  `PROSENQ2` decimal(3, 0) NULL,
  `PROSENT` decimal(3, 0) NULL,
  `PROSENU` decimal(3, 0) NULL,
  `KUNCI` decimal(1, 0) NULL,
  `PUBLIK` decimal(1, 0) NULL,
  `TEKNISI` decimal(8, 0) NULL,
  `HARI_2` decimal(1, 0) NULL,
  `JAM_2` decimal(4, 0) NULL,
  `ASISTEN2` decimal(8, 0) NULL,
  `TEKNISI2` decimal(8, 0) NULL,
  `RUANG_2` decimal(4, 0) NULL,
  `DOSEN2` decimal(8, 0) NULL,
  `DOSEN3` decimal(8, 0) NULL,
  `DOSEN4` decimal(8, 0) NULL,
  `DOSEN5` decimal(8, 0) NULL,
  `PROSEN_KUIS` decimal(3, 0) NULL,
  `PROSEN_PRAK` decimal(3, 0) NULL,
  `HARI_3` decimal(1, 0) NULL,
  `JAM_3` decimal(4, 0) NULL,
  PRIMARY KEY (`NOMOR`),
  INDEX `IDX_KULIAH_1`(`TAHUN` ASC, `SEMESTER` ASC, `KELAS` ASC),
  INDEX `IDX_KULIAH_2`(`NOMOR` ASC, `HARI_2` ASC)
);

CREATE TABLE `KULIAH_LOG`  (
  `NOMOR` decimal(10, 0) NOT NULL,
  `KULIAH` decimal(10, 0) NOT NULL,
  `HARI` decimal(1, 0) NULL,
  `JAM` decimal(4, 0) NULL,
  `STATUS` decimal(1, 0) NOT NULL,
  `DOSEN` decimal(10, 0) NULL,
  `TANGGAL` datetime NOT NULL,
  `BARU` decimal(1, 0) NULL,
  `UBAH` decimal(1, 0) NULL,
  `HAPUS` decimal(1, 0) NULL,
  `TANDA_BARU` decimal(1, 0) NULL,
  `HARI_AWAL` decimal(1, 0) NULL,
  `HARI2` decimal(1, 0) NULL,
  `HARI2_AWAL` decimal(1, 0) NULL,
  `JAM2` decimal(4, 0) NULL,
  `ASISTEN` decimal(10, 0) NULL,
  `TEKNISI` decimal(10, 0) NULL,
  PRIMARY KEY (`NOMOR`),
  INDEX `IDX_KULIAH_LOG1`(`STATUS` ASC, `TANGGAL` ASC)
);

CREATE TABLE `KULIAH_PARAREL`  (
  `NOMOR` decimal(10, 0) NOT NULL,
  `KULIAH` decimal(10, 0) NOT NULL,
  `DOSEN` decimal(10, 0) NULL,
  `MINGGU` decimal(2, 0) NULL,
  `HARI` decimal(1, 0) NULL,
  `ASISTEN` decimal(10, 0) NULL,
  `TEKNISI` decimal(10, 0) NULL,
  `ASISTEN2` decimal(10, 0) NULL,
  `TEKNISI2` decimal(10, 0) NULL,
  `DOSEN2` decimal(10, 0) NULL,
  `DOSEN3` decimal(10, 0) NULL,
  `JAM` decimal(4, 0) NULL,
  PRIMARY KEY (`NOMOR`)
);

CREATE TABLE `KULIAH_PUBLISH`  (
  `NOMOR` decimal(10, 0) NOT NULL,
  `TAHUN` decimal(4, 0) NULL,
  `SEMESTER` decimal(1, 0) NULL,
  `KELAS` decimal(10, 0) NULL,
  `PEGAWAI` decimal(10, 0) NULL,
  `PUBLISH` decimal(1, 0) NULL,
  PRIMARY KEY (`NOMOR`)
);

CREATE TABLE `KULIAH1`  (
  `NOMOR` decimal(8, 0) NOT NULL,
  `TAHUN` decimal(4, 0) NOT NULL,
  `SEMESTER` decimal(1, 0) NOT NULL,
  `KELAS` decimal(8, 0) NOT NULL,
  `MATAKULIAH` decimal(8, 0) NULL,
  `HARI` decimal(1, 0) NULL,
  `JAM` decimal(4, 0) NULL,
  `RUANG` decimal(4, 0) NULL,
  `DOSEN` decimal(8, 0) NULL,
  `ASISTEN` decimal(8, 0) NULL,
  `KEHADIRAN` decimal(2, 0) NULL,
  `TGLUJIAN` datetime NULL,
  `RUANGUJIAN` decimal(4, 0) NULL,
  `TGLNILAI` datetime NULL,
  `IP_PC` varchar(15) NULL,
  `HOST_PC` varchar(20) NULL,
  `USER_PC` varchar(20) NULL,
  `PROSENQ1` decimal(3, 0) NULL,
  `PROSENQ2` decimal(3, 0) NULL,
  `PROSENT` decimal(3, 0) NULL,
  `PROSENU` decimal(3, 0) NULL,
  `KUNCI` decimal(1, 0) NULL,
  `PUBLIK` decimal(1, 0) NULL,
  `TEKNISI` decimal(8, 0) NULL,
  `HARI_2` decimal(1, 0) NULL,
  `JAM_2` decimal(4, 0) NULL
);

CREATE TABLE `KULIAH2`  (
  `NOMOR` decimal(8, 0) NOT NULL,
  `TAHUN` decimal(4, 0) NOT NULL,
  `SEMESTER` decimal(1, 0) NOT NULL,
  `KELAS` decimal(8, 0) NOT NULL,
  `MATAKULIAH` decimal(8, 0) NULL,
  `HARI` decimal(1, 0) NULL,
  `JAM` decimal(4, 0) NULL,
  `RUANG` decimal(4, 0) NULL,
  `DOSEN` decimal(8, 0) NULL,
  `ASISTEN` decimal(8, 0) NULL,
  `KEHADIRAN` decimal(2, 0) NULL,
  `TGLUJIAN` datetime NULL,
  `RUANGUJIAN` decimal(4, 0) NULL,
  `TGLNILAI` datetime NULL,
  `IP_PC` varchar(50) NULL,
  `HOST_PC` varchar(100) NULL,
  `USER_PC` varchar(100) NULL,
  `PROSENQ1` decimal(3, 0) NULL,
  `PROSENQ2` decimal(3, 0) NULL,
  `PROSENT` decimal(3, 0) NULL,
  `PROSENU` decimal(3, 0) NULL,
  `KUNCI` decimal(1, 0) NULL,
  `PUBLIK` decimal(1, 0) NULL,
  `TEKNISI` decimal(8, 0) NULL,
  `HARI_2` decimal(1, 0) NULL,
  `JAM_2` decimal(4, 0) NULL,
  `ASISTEN2` decimal(8, 0) NULL,
  `TEKNISI2` decimal(8, 0) NULL,
  `RUANG_2` decimal(4, 0) NULL,
  `DOSEN2` decimal(8, 0) NULL,
  `DOSEN3` decimal(8, 0) NULL,
  `DOSEN4` decimal(8, 0) NULL,
  `DOSEN5` decimal(8, 0) NULL,
  `PROSEN_KUIS` decimal(3, 0) NULL,
  `PROSEN_PRAK` decimal(3, 0) NULL,
  `HARI_3` decimal(1, 0) NULL,
  `JAM_3` decimal(4, 0) NULL
);

CREATE TABLE `LAMA_ISTIRAHAT`  (
  `NOMOR` decimal(1, 0) NOT NULL,
  `LAMA_ISTIRAHAT` varchar(20) NOT NULL,
  PRIMARY KEY (`NOMOR`)
);

CREATE TABLE `LAPORAN`  (
  `NRP` varchar(10) NULL,
  `NAMA` varchar(50) NULL,
  `SEMESTER` varchar(3) NULL,
  `KELAS` varchar(5) NULL,
  `PROGRAM` decimal(2, 0) NULL,
  `JURUSAN` decimal(2, 0) NULL,
  `TAHUN` varchar(10) NULL,
  `NA1` double NULL,
  `NH1` double NULL,
  `NR1` varchar(70) NULL,
  `NAA1` varchar(20) NULL,
  `NAH1` varchar(70) NULL,
  `NA2` double NULL,
  `NH2` double NULL,
  `NR2` varchar(70) NULL,
  `NAA2` varchar(20) NULL,
  `NAH2` varchar(70) NULL,
  `NA3` double NULL,
  `NH3` double NULL,
  `NR3` varchar(70) NULL,
  `NAA3` varchar(20) NULL,
  `NAH3` varchar(70) NULL,
  `NA4` double NULL,
  `NH4` double NULL,
  `NR4` varchar(70) NULL,
  `NAA4` varchar(20) NULL,
  `NAH4` varchar(70) NULL,
  `NA5` double NULL,
  `NH5` double NULL,
  `NR5` varchar(70) NULL,
  `NAA5` varchar(20) NULL,
  `NAH5` varchar(70) NULL,
  `NA6` double NULL,
  `NH6` double NULL,
  `NR6` varchar(70) NULL,
  `NAA6` varchar(20) NULL,
  `NAH6` varchar(70) NULL,
  `NA7` double NULL,
  `NH7` double NULL,
  `NR7` varchar(70) NULL,
  `NAA7` varchar(20) NULL,
  `NAH7` varchar(70) NULL,
  `NA8` double NULL,
  `NH8` double NULL,
  `NR8` varchar(70) NULL,
  `NAA8` varchar(20) NULL,
  `NAH8` varchar(70) NULL,
  `NA9` double NULL,
  `NH9` double NULL,
  `NR9` varchar(70) NULL,
  `NAA9` varchar(20) NULL,
  `NAH9` varchar(70) NULL,
  `NA10` double NULL,
  `NH10` double NULL,
  `NR10` varchar(70) NULL,
  `NAA10` varchar(20) NULL,
  `NAH10` varchar(70) NULL,
  `NA11` double NULL,
  `NH11` double NULL,
  `NR11` varchar(70) NULL,
  `NAA11` varchar(20) NULL,
  `NAH11` varchar(70) NULL,
  `NA12` double NULL,
  `NH12` double NULL,
  `NR12` varchar(70) NULL,
  `NAA12` varchar(20) NULL,
  `NAH12` varchar(70) NULL,
  `NA13` double NULL,
  `NH13` double NULL,
  `NR13` varchar(70) NULL,
  `NAA13` varchar(20) NULL,
  `NAH13` varchar(70) NULL,
  `NA14` double NULL,
  `NH14` double NULL,
  `NR14` varchar(70) NULL,
  `NAA14` varchar(20) NULL,
  `NAH14` varchar(70) NULL,
  `NA15` double NULL,
  `NH15` double NULL,
  `NR15` varchar(70) NULL,
  `NAA15` varchar(20) NULL,
  `NAH15` varchar(70) NULL,
  `NA16` double NULL,
  `NH16` double NULL,
  `NR16` varchar(70) NULL,
  `NAA16` varchar(20) NULL,
  `NAH16` varchar(70) NULL,
  `NA17` double NULL,
  `NH17` double NULL,
  `NR17` varchar(70) NULL,
  `NAA17` varchar(20) NULL,
  `NAH17` varchar(70) NULL,
  `NA18` double NULL,
  `NH18` double NULL,
  `NR18` varchar(70) NULL,
  `NAA18` varchar(20) NULL,
  `NAH18` varchar(70) NULL,
  `NA19` double NULL,
  `NH19` double NULL,
  `NR19` varchar(70) NULL,
  `NAA19` varchar(20) NULL,
  `NAH19` varchar(70) NULL,
  `NA20` double NULL,
  `NH20` double NULL,
  `NR20` varchar(70) NULL,
  `NAA20` varchar(20) NULL,
  `NAH20` varchar(70) NULL,
  `NA21` double NULL,
  `NH21` double NULL,
  `NR21` varchar(70) NULL,
  `NAA21` varchar(20) NULL,
  `NAH21` varchar(70) NULL,
  `NA22` double NULL,
  `NH22` double NULL,
  `NR22` varchar(70) NULL,
  `NAA22` varchar(20) NULL,
  `NAH22` varchar(70) NULL,
  `NA23` double NULL,
  `NH23` double NULL,
  `NR23` varchar(70) NULL,
  `NAA23` varchar(20) NULL,
  `NAH23` varchar(70) NULL,
  `NA24` double NULL,
  `NH24` double NULL,
  `NR24` varchar(70) NULL,
  `NAA24` varchar(20) NULL,
  `NAH24` varchar(70) NULL,
  `NA25` double NULL,
  `NH25` double NULL,
  `NR25` varchar(70) NULL,
  `NAA25` varchar(20) NULL,
  `NAH25` varchar(70) NULL,
  `IPS` double NULL,
  `REMARK` varchar(20) NULL,
  `PARAREL` varchar(5) NULL,
  `NILAI` varchar(10) NULL,
  `KURIKULUM` varchar(4) NULL,
  `KUNCI` decimal(1, 0) NULL,
  `NAIK` decimal(1, 0) NULL,
  `KET_NAIK` varchar(10) NULL,
  INDEX `INLAPORAN`(`NRP` ASC),
  INDEX `INLAPORAN_JURUSAN`(`JURUSAN` ASC),
  INDEX `INLAPORAN_KELAS`(`KELAS` ASC),
  INDEX `INLAPORAN_KURIKULUM`(`KURIKULUM` ASC),
  INDEX `INLAPORAN_TAHUN`(`TAHUN` ASC)
);

CREATE TABLE `LIBUR_SEMESTER`  (
  `NOMOR` decimal(65, 30) NULL,
  `TAHUN` decimal(4, 0) NULL,
  `SEMESTER` decimal(1, 0) NULL,
  `TANGGAL_AWAL` datetime NULL,
  `TANGGAL_AKHIR` datetime NULL,
  `PROGRAM` decimal(10, 0) NULL,
  `KELAS` decimal(1, 0) NULL
);

CREATE TABLE `LOG_DAFUL`  (
  `DATA_DAFUL` text NULL
);

CREATE TABLE `LOG_MAHASISWA`  (
  `NRP` varchar(12) NOT NULL,
  `TANGGAL` datetime NOT NULL,
  `PERINTAH` varchar(10) NOT NULL
);

CREATE TABLE `LOGLOGIN`  (
  `NOMOR` decimal(10, 0) NOT NULL,
  `TANGGAL` datetime NOT NULL,
  `PEGAWAI` decimal(10, 0) NOT NULL,
  `URL` text NOT NULL,
  `URL_FILES` text NOT NULL,
  `IP` varchar(100) NOT NULL,
  `HOST` varchar(100) NOT NULL,
  `SOURCE` varchar(100) NOT NULL
);

CREATE TABLE `LOKER_POSISI`  (
  `NOMOR` decimal(10, 0) NOT NULL,
  `POSISI` varchar(100) NULL,
  PRIMARY KEY (`NOMOR`)
);

CREATE TABLE `MAHASISWA`  (
  `NOMOR` decimal(8, 0) NOT NULL,
  `NRP` varchar(20) NOT NULL,
  `NAMA` varchar(100) NOT NULL,
  `KELAS` decimal(4, 0) NOT NULL,
  `DOSEN_WALI` decimal(8, 0) NULL,
  `STATUS` char(1) NOT NULL,
  `TGLLAHIR` datetime NULL,
  `TMPLAHIR` varchar(100) NULL,
  `TGLMASUK` datetime NULL,
  `DAN_LAIN_LAIN` char(1) NULL,
  `JENIS_KELAMIN` char(1) NULL,
  `WARGA` varchar(10) NULL,
  `AGAMA` decimal(2, 0) NULL,
  `ALAMAT` text NULL,
  `NOTELP` varchar(100) NULL,
  `SMU` varchar(50) NULL,
  `BEASISWA` varchar(30) NULL,
  `AYAH` varchar(60) NULL,
  `KERJA_AYAH` varchar(100) NULL,
  `IBU` varchar(60) NULL,
  `KERJA_IBU` varchar(100) NULL,
  `PENGHASILAN` decimal(10, 0) NULL,
  `ALAMAT_ORTU` text NULL,
  `NOTELP_ORTU` varchar(100) NULL,
  `DARAH` varchar(10) NULL,
  `NIJAZAH` decimal(10, 0) NULL,
  `NUN` decimal(10, 2) NULL,
  `PASSWORD` varchar(20) NULL,
  `TGLLULUS` datetime NULL,
  `LULUSSMU` decimal(4, 0) NULL,
  `NO_BNI` varchar(16) NULL,
  `ANAK_KE` decimal(2, 0) NULL,
  `ID_ASURANSI` varchar(20) NULL,
  `ALAMAT_SMU` text NULL,
  `PENGHASILAN_IBU` decimal(10, 0) NULL,
  `JUMLAH_ANAK` decimal(2, 0) NULL,
  `KETERANGAN_AYAH` varchar(50) NULL,
  `KETERANGAN_IBU` varchar(50) NULL,
  `PRESTASI_OLAHRAGA` varchar(100) NULL,
  `TEMPAT_KERJA` varchar(100) NULL,
  `GAJI_KERJA` varchar(20) NULL,
  `JABATAN_KERJA` varchar(100) NULL,
  `HAK` decimal(6, 0) NULL,
  `EL` decimal(1, 0) NULL,
  `NO_PENDAFTARAN` varchar(20) NULL,
  `JALUR_DAFTAR` decimal(2, 0) NULL,
  `NISN` varchar(50) NULL,
  `NPSN` varchar(50) NULL,
  `SPP1` varchar(75) NULL,
  `SPP2` varchar(75) NULL,
  `SPP3` varchar(75) NULL,
  `SPP4` varchar(75) NULL,
  `SPP5` varchar(75) NULL,
  `SPP6` varchar(75) NULL,
  `SPP7` varchar(75) NULL,
  `SPP8` varchar(75) NULL,
  `ANGKATAN` decimal(4, 0) NULL,
  `SEMESTER_MASUK` decimal(4, 0) NULL,
  `MAHASISWA_JALUR_PENERIMAAN` decimal(4, 0) NULL,
  `NIK` varchar(50) NULL,
  `KOTA_ORTU` varchar(20) NULL,
  `ALAMAT_KOTA` varchar(20) NULL,
  `SUBKAMPUS` varchar(20) NULL,
  `UKT` decimal(10, 0) NULL,
  `SEKOLAH` decimal(10, 0) NULL,
  `FOTO` longtext NULL,
  `IJASAH` longtext NULL,
  `STATUS_KAWIN` decimal(2, 0) NULL,
  `UKURAN_BAJU` varchar(5) NULL,
  `PERNAHPT` decimal(2, 0) NULL,
  `TAHUNMASUK_PT` decimal(4, 0) NULL,
  `JUMLAH_SKS` decimal(5, 0) NULL,
  `PT_ASAL` varchar(200) NULL,
  `NUNMAPEL` decimal(5, 0) NULL,
  `NIJAZAHMAPEL` decimal(5, 0) NULL,
  `STATUS_SMU` decimal(5, 0) NULL,
  `JURUSAN_SMU` decimal(10, 0) NULL,
  `THLAHIRAYAH` decimal(4, 0) NULL,
  `PENDIDIKANAYAH` varchar(50) NULL,
  `THLAHIRIBU` decimal(4, 0) NULL,
  `PENDIDIKANIBU` varchar(50) NULL,
  `SUMBERBIAYA` decimal(2, 0) NULL,
  `LEMBAGA` varchar(200) NULL,
  `JENIS_LEMBAGA` decimal(2, 0) NULL,
  `JENIS_TEMPATTINGGAL` varchar(50) NULL,
  `TRANSPORTASI` varchar(200) NULL,
  `MINAT` varchar(200) NULL,
  `INFOPOLIJE` decimal(2, 0) NULL,
  `SEMESTER` decimal(2, 0) NULL,
  `MAHASISWA_PEMBIAYAAN` decimal(2, 0) NULL,
  `IJIN_LOGIN` decimal(2, 0) NULL,
  `KODE_TRANSAKSI` varchar(11) NULL,
  `KIRIM_TAGIH_FOTO` decimal(1, 0) NULL,
  `NOMOR_IJAZAH` varchar(100) NULL,
  `TANDA` decimal(1, 0) NULL,
  `BIAYA_LAIN` decimal(10, 0) NULL,
  `NIK_KTP` varchar(30) NULL,
  `JALAN` varchar(255) NULL,
  `RT` varchar(30) NULL,
  `RW` varchar(30) NULL,
  `KELURAHAN` varchar(255) NULL,
  `KECAMATAN` varchar(255) NULL,
  `KABUPATEN_KOTA` varchar(255) NULL,
  `PROPINSI` varchar(255) NULL,
  `KODE_POS` varchar(5) NULL,
  `TEMPAT_LAHIR_AYAH` varchar(255) NULL,
  `TEMPAT_LAHIR_IBU` varchar(255) NULL,
  `TANGGAL_LAHIR_AYAH` datetime NULL,
  `TANGGAL_LAHIR_IBU` datetime NULL,
  `PENDIDIKAN_AYAH` varchar(255) NULL,
  `PENDIDIKAN_IBU` varchar(255) NULL,
  `JALAN_ORTU` varchar(255) NULL,
  `RT_ORTU` varchar(30) NULL,
  `RW_ORTU` varchar(30) NULL,
  `KELURAHAN_ORTU` varchar(255) NULL,
  `KECAMATAN_ORTU` varchar(255) NULL,
  `KABUPATEN_KOTA_ORTU` varchar(255) NULL,
  `PROPINSI_ORTU` varchar(255) NULL,
  `KODE_POS_ORTU` varchar(5) NULL,
  `TAHUN_LULUS` decimal(4, 0) NULL,
  `SEMESTER_LULUS` decimal(2, 0) NULL,
  `FEEDER_WILAYAH` decimal(10, 0) NULL,
  `NRP_LAMA` varchar(20) NULL,
  `TGLTERBIT` datetime NULL,
  `BLANGKO_IJAZAH` varchar(255) NULL,
  `EMAIL` varchar(200) NULL,
  `PIN_PDDIKTI` varchar(255) NULL,
  `AKREDITASI` varchar(255) NULL,
  `SK_AKREDITASI` varchar(255) NULL,
  `KELAS_LAMA` decimal(4, 0) NULL,
  PRIMARY KEY (`NOMOR`),
  UNIQUE INDEX `MAHASISWA_NRP_1_1`(`NRP` ASC),
  UNIQUE INDEX `Mahasiswa_Nomor_1_1_1_1`(`NOMOR` ASC),
  INDEX `STATUS_MAHASISWA_1_1`(`STATUS` ASC)
);

CREATE TABLE `MAHASISWA_BACKUP`  (
  `NOMOR` decimal(8, 0) NOT NULL,
  `NRP` varchar(20) NOT NULL,
  `NAMA` varchar(100) NOT NULL,
  `KELAS` decimal(4, 0) NOT NULL,
  `DOSEN_WALI` decimal(8, 0) NULL,
  `STATUS` char(1) NOT NULL,
  `TGLLAHIR` datetime NULL,
  `TMPLAHIR` varchar(100) NULL,
  `TGLMASUK` datetime NULL,
  `DAN_LAIN_LAIN` char(1) NULL,
  `JENIS_KELAMIN` char(1) NULL,
  `WARGA` varchar(10) NULL,
  `AGAMA` decimal(2, 0) NULL,
  `ALAMAT` text NULL,
  `NOTELP` varchar(100) NULL,
  `SMU` varchar(50) NULL,
  `BEASISWA` varchar(30) NULL,
  `AYAH` varchar(60) NULL,
  `KERJA_AYAH` varchar(100) NULL,
  `IBU` varchar(60) NULL,
  `KERJA_IBU` varchar(100) NULL,
  `PENGHASILAN` decimal(10, 0) NULL,
  `ALAMAT_ORTU` text NULL,
  `NOTELP_ORTU` varchar(100) NULL,
  `DARAH` varchar(10) NULL,
  `NIJAZAH` decimal(10, 0) NULL,
  `NUN` decimal(10, 2) NULL,
  `PASSWORD` varchar(20) NULL,
  `TGLLULUS` datetime NULL,
  `LULUSSMU` decimal(4, 0) NULL,
  `NO_BNI` varchar(16) NULL,
  `ANAK_KE` decimal(2, 0) NULL,
  `ID_ASURANSI` varchar(20) NULL,
  `ALAMAT_SMU` text NULL,
  `PENGHASILAN_IBU` decimal(10, 0) NULL,
  `JUMLAH_ANAK` decimal(2, 0) NULL,
  `KETERANGAN_AYAH` varchar(50) NULL,
  `KETERANGAN_IBU` varchar(50) NULL,
  `PRESTASI_OLAHRAGA` varchar(100) NULL,
  `TEMPAT_KERJA` varchar(100) NULL,
  `GAJI_KERJA` varchar(20) NULL,
  `JABATAN_KERJA` varchar(100) NULL,
  `HAK` decimal(6, 0) NULL,
  `EL` decimal(1, 0) NULL,
  `NO_PENDAFTARAN` varchar(20) NULL,
  `JALUR_DAFTAR` decimal(2, 0) NULL,
  `NISN` varchar(50) NULL,
  `NPSN` varchar(50) NULL,
  `SPP1` varchar(75) NULL,
  `SPP2` varchar(75) NULL,
  `SPP3` varchar(75) NULL,
  `SPP4` varchar(75) NULL,
  `SPP5` varchar(75) NULL,
  `SPP6` varchar(75) NULL,
  `SPP7` varchar(75) NULL,
  `SPP8` varchar(75) NULL,
  `ANGKATAN` decimal(4, 0) NULL,
  `SEMESTER_MASUK` decimal(4, 0) NULL,
  `MAHASISWA_JALUR_PENERIMAAN` decimal(4, 0) NULL,
  `NIK` varchar(50) NULL,
  `KOTA_ORTU` varchar(20) NULL,
  `ALAMAT_KOTA` varchar(20) NULL,
  `SUBKAMPUS` varchar(20) NULL,
  `UKT` decimal(10, 0) NULL,
  `SEKOLAH` decimal(10, 0) NULL,
  `FOTO` longtext NULL,
  `IJASAH` longtext NULL,
  `STATUS_KAWIN` decimal(2, 0) NULL,
  `UKURAN_BAJU` varchar(5) NULL,
  `PERNAHPT` decimal(2, 0) NULL,
  `TAHUNMASUK_PT` decimal(4, 0) NULL,
  `JUMLAH_SKS` decimal(5, 0) NULL,
  `PT_ASAL` varchar(200) NULL,
  `NUNMAPEL` decimal(5, 0) NULL,
  `NIJAZAHMAPEL` decimal(5, 0) NULL,
  `STATUS_SMU` decimal(5, 0) NULL,
  `JURUSAN_SMU` decimal(10, 0) NULL,
  `THLAHIRAYAH` decimal(4, 0) NULL,
  `PENDIDIKANAYAH` varchar(50) NULL,
  `THLAHIRIBU` decimal(4, 0) NULL,
  `PENDIDIKANIBU` varchar(50) NULL,
  `SUMBERBIAYA` decimal(2, 0) NULL,
  `LEMBAGA` varchar(200) NULL,
  `JENIS_LEMBAGA` decimal(2, 0) NULL,
  `JENIS_TEMPATTINGGAL` varchar(50) NULL,
  `TRANSPORTASI` varchar(200) NULL,
  `MINAT` varchar(200) NULL,
  `INFOPOLIJE` decimal(2, 0) NULL,
  `SEMESTER` decimal(2, 0) NULL,
  `MAHASISWA_PEMBIAYAAN` decimal(2, 0) NULL,
  `IJIN_LOGIN` decimal(2, 0) NULL,
  `KODE_TRANSAKSI` varchar(11) NULL,
  `KIRIM_TAGIH_FOTO` decimal(1, 0) NULL,
  `NOMOR_IJAZAH` varchar(100) NULL,
  `TANDA` decimal(1, 0) NULL,
  `BIAYA_LAIN` decimal(10, 0) NULL,
  `NIK_KTP` varchar(30) NULL,
  `JALAN` varchar(255) NULL,
  `RT` varchar(30) NULL,
  `RW` varchar(30) NULL,
  `KELURAHAN` varchar(255) NULL,
  `KECAMATAN` varchar(255) NULL,
  `KABUPATEN_KOTA` varchar(255) NULL,
  `PROPINSI` varchar(255) NULL,
  `KODE_POS` varchar(5) NULL,
  `TEMPAT_LAHIR_AYAH` varchar(255) NULL,
  `TEMPAT_LAHIR_IBU` varchar(255) NULL,
  `TANGGAL_LAHIR_AYAH` datetime NULL,
  `TANGGAL_LAHIR_IBU` datetime NULL,
  `PENDIDIKAN_AYAH` varchar(255) NULL,
  `PENDIDIKAN_IBU` varchar(255) NULL,
  `JALAN_ORTU` varchar(255) NULL,
  `RT_ORTU` varchar(30) NULL,
  `RW_ORTU` varchar(30) NULL,
  `KELURAHAN_ORTU` varchar(255) NULL,
  `KECAMATAN_ORTU` varchar(255) NULL,
  `KABUPATEN_KOTA_ORTU` varchar(255) NULL,
  `PROPINSI_ORTU` varchar(255) NULL,
  `KODE_POS_ORTU` varchar(5) NULL,
  `TAHUN_LULUS` decimal(4, 0) NULL,
  `SEMESTER_LULUS` decimal(2, 0) NULL,
  `FEEDER_WILAYAH` decimal(10, 0) NULL,
  `NRP_LAMA` varchar(20) NULL,
  `TGLTERBIT` datetime NULL,
  `BLANGKO_IJAZAH` varchar(255) NULL,
  `EMAIL` varchar(200) NULL
);

CREATE TABLE `MAHASISWA_COPY`  (
  `NRP` varchar(20) NULL,
  `NIK` varchar(100) NULL,
  `TEMPAT_LAHIR` varchar(100) NULL,
  `TANGGAL_LAHIR` datetime NULL,
  `IBU` varchar(100) NULL
);

CREATE TABLE `MAHASISWA_JALUR_PENERIMAAN`  (
  `NOMOR` decimal(10, 0) NULL,
  `JALUR_PENERIMAAN` varchar(50) NULL
);

CREATE TABLE `MAHASISWA_LOG`  (
  `NOMOR` decimal(10, 0) NOT NULL,
  `MAHASISWA` decimal(10, 0) NOT NULL,
  `STATUS_MAHASISWA` char(1) NOT NULL,
  `TANGGAL` datetime NOT NULL,
  `STATUS` decimal(1, 0) NOT NULL,
  `KELAS` decimal(10, 0) NULL,
  PRIMARY KEY (`NOMOR`),
  INDEX `IDX_MAHASISWA_LOG1`(`STATUS` ASC, `TANGGAL` ASC)
);

CREATE TABLE `MAHASISWA_PEMBIAYAAN`  (
  `NOMOR` decimal(2, 0) NOT NULL,
  `PEMBIAYAAN` varchar(50) NULL,
  PRIMARY KEY (`NOMOR`)
);

CREATE TABLE `MAHASISWA1`  (
  `NRP` varchar(10) NULL,
  `NAMA` varchar(200) NULL,
  `SEMESTER` decimal(2, 0) NULL,
  `STATUS` char(1) NULL,
  `KELAS` decimal(10, 0) NULL
);

CREATE TABLE `MASTER_PEMBAYARAN`  (
  `NOMOR` decimal(10, 0) NOT NULL,
  `PEMBAYARAN_VIA` varchar(100) NULL,
  PRIMARY KEY (`NOMOR`)
);

CREATE TABLE `MATAKULIAH`  (
  `NOMOR` decimal(8, 0) NOT NULL,
  `PROGRAM` decimal(2, 0) NOT NULL,
  `JURUSAN` decimal(2, 0) NOT NULL,
  `KELAS` decimal(1, 0) NOT NULL,
  `SEMESTER` decimal(1, 0) NOT NULL,
  `KODE` varchar(20) NULL,
  `MATAKULIAH` varchar(100) NULL,
  `JAM` decimal(10, 0) NOT NULL,
  `SKS` decimal(10, 0) NOT NULL,
  `MK_GROUP` varchar(50) NULL,
  `MK_WAJIB` decimal(1, 0) NOT NULL,
  `TAHUN` decimal(4, 0) NULL,
  `MATAKULIAH_INGGRIS` varchar(100) NULL,
  `MATAKULIAH_SINGKATAN` varchar(20) NULL,
  `TANGGAL_MULAI_EFEKTIF` datetime NULL,
  `TANGGAL_AKHIR_EFEKTIF` datetime NULL,
  `MATAKULIAH_JENIS` decimal(2, 0) NULL,
  `MASUK_PENILAIAN` decimal(2, 0) NULL,
  PRIMARY KEY (`NOMOR`),
  INDEX `Matakuliah_Kode`(`KODE` ASC),
  UNIQUE INDEX `Matakuliah_Nomor`(`NOMOR` ASC),
  INDEX `Matakuliah_kode1`(`KODE` ASC, `MATAKULIAH_JENIS` ASC)
);

CREATE TABLE `MATAKULIAH_JENIS`  (
  `NOMOR` decimal(10, 0) NOT NULL,
  `MATAKULIAH_JENIS` varchar(100) NULL,
  PRIMARY KEY (`NOMOR`)
);

CREATE TABLE `MHS_LIST`  (
  `NOMOR` decimal(10, 0) NOT NULL,
  `MAHASISWA` decimal(10, 0) NOT NULL,
  `KELAS` decimal(3, 0) NOT NULL,
  `SEMESTER` decimal(1, 0) NOT NULL,
  `TAHUN` varchar(10) NOT NULL,
  PRIMARY KEY (`MAHASISWA`, `KELAS`, `SEMESTER`, `TAHUN`),
  INDEX `INMHS_LIST_MHS`(`MAHASISWA` ASC)
);

CREATE TABLE `NH`  (
  `NA` decimal(3, 0) NOT NULL,
  `NH` varchar(2) NOT NULL,
  `AKUMULASI` decimal(2, 1) NULL,
  `NA_ATAS` decimal(3, 0) NULL,
  PRIMARY KEY (`NA`)
);

CREATE TABLE `NH_copy`  (
  `NA` decimal(3, 0) NOT NULL,
  `NH` varchar(2) NOT NULL,
  `AKUMULASI` decimal(2, 1) NULL,
  `NA_ATAS` decimal(3, 0) NULL,
  PRIMARY KEY (`NA`)
);

CREATE TABLE `NILAI`  (
  `NOMOR` decimal(8, 0) NOT NULL,
  `KULIAH` decimal(8, 0) NOT NULL,
  `MAHASISWA` decimal(8, 0) NOT NULL,
  `QUIS1` decimal(5, 2) NULL,
  `QUIS2` decimal(5, 2) NULL,
  `TUGAS` decimal(5, 2) NULL,
  `UJIAN` decimal(5, 2) NULL,
  `NA` decimal(5, 2) NULL,
  `HER` decimal(5, 2) NULL,
  `NH` varchar(2) NULL,
  `KETERANGAN` varchar(100) NULL,
  `NHU` varchar(2) NULL,
  `NSP` decimal(5, 0) NULL,
  `KUIS` decimal(8, 0) NULL,
  `PRAKTIKUM` decimal(8, 0) NULL,
  PRIMARY KEY (`NOMOR`),
  INDEX `Nilai_Kuliah_Mahasiswa`(`KULIAH` ASC, `MAHASISWA` ASC)
);

CREATE TABLE `NILAI_BACKUP`  (
  `NOMOR` decimal(8, 0) NOT NULL,
  `KULIAH` decimal(8, 0) NOT NULL,
  `MAHASISWA` decimal(8, 0) NOT NULL,
  `QUIS1` decimal(5, 2) NULL,
  `QUIS2` decimal(5, 2) NULL,
  `TUGAS` decimal(5, 2) NULL,
  `UJIAN` decimal(5, 2) NULL,
  `NA` decimal(5, 2) NULL,
  `HER` decimal(5, 2) NULL,
  `NH` varchar(2) NULL,
  `KETERANGAN` varchar(100) NULL,
  `NHU` varchar(2) NULL,
  `NSP` decimal(5, 0) NULL,
  `KUIS` decimal(8, 0) NULL,
  `PRAKTIKUM` decimal(8, 0) NULL,
  PRIMARY KEY (`NOMOR`)
);

CREATE TABLE `NILAI_KP`  (
  `NOMOR` decimal(10, 0) NOT NULL,
  `KP_DAFTAR` decimal(10, 0) NOT NULL,
  `PEGAWAI` decimal(10, 0) NULL,
  `NILAI1` decimal(3, 0) NULL COMMENT 'Penguasaan Materi',
  `NILAI2` decimal(3, 0) NULL COMMENT 'Penyajian Tertulis (Laporan)',
  `NILAI3` decimal(3, 0) NULL COMMENT 'Sikap',
  `JENIS` decimal(1, 0) NULL COMMENT '1=SEMINAR 2=SIDANG',
  `STATUS_DOSEN` decimal(1, 0) NOT NULL COMMENT '1=PENGUJI 2=PEMBIMBING',
  `NILAI4` decimal(3, 0) NULL,
  `REVISI` text NULL,
  `TANGGAL_AKHIR_REVISI` datetime NULL,
  `PEGAWAI_EXT` decimal(1, 0) NULL,
  `PEMBIMBING_LAPANGAN` decimal(1, 0) NULL,
  `NILAI5` decimal(3, 0) NULL,
  `MAHASISWA` decimal(10, 0) NULL,
  PRIMARY KEY (`NOMOR`)
);

CREATE TABLE `NILAI_PUSH_LOG`  (
  `NOMOR` decimal(10, 0) NOT NULL,
  `TANGGAL` datetime NOT NULL,
  `STATUS` decimal(1, 0) NOT NULL,
  `PEGAWAI` decimal(10, 0) NOT NULL,
  `TAHUN` decimal(4, 0) NULL,
  `SEMESTER` decimal(1, 0) NULL,
  `JENJANG` decimal(2, 0) NULL,
  PRIMARY KEY (`NOMOR`)
);

CREATE TABLE `NILAI1`  (
  `NOMOR` decimal(8, 0) NOT NULL,
  `KULIAH` decimal(8, 0) NOT NULL,
  `MAHASISWA` decimal(8, 0) NOT NULL,
  `QUIS1` decimal(5, 2) NULL,
  `QUIS2` decimal(5, 2) NULL,
  `TUGAS` decimal(5, 2) NULL,
  `UJIAN` decimal(5, 2) NULL,
  `NA` decimal(5, 2) NULL,
  `HER` decimal(5, 2) NULL,
  `NH` varchar(2) NULL,
  `KETERANGAN` varchar(100) NULL,
  `NHU` varchar(2) NULL,
  `NSP` decimal(5, 0) NULL,
  `KUIS` decimal(8, 0) NULL,
  `PRAKTIKUM` decimal(8, 0) NULL
);

CREATE TABLE `P_BUTIR`  (
  `NOMOR` decimal(10, 0) NULL,
  `BUTIR` text NULL
);

CREATE TABLE `P_KREDIT`  (
  `NO` decimal(5, 0) NOT NULL,
  `GOL` varchar(10) NOT NULL,
  `KREDIT` decimal(10, 0) NOT NULL,
  `FUNGSIONAL` varchar(30) NULL
);

CREATE TABLE `P_KUM`  (
  `NO` char(10) NULL,
  `KUM` char(10) NULL,
  `PROSEN` decimal(10, 0) NULL
);

CREATE TABLE `P_PROSES`  (
  `NOMOR` decimal(10, 0) NOT NULL,
  `NOID` varchar(10) NULL,
  `P_RULE` decimal(10, 0) NULL,
  `KREDIT_USUL` decimal(10, 3) NULL,
  `KREDIT_RPT` decimal(10, 3) NULL,
  `SK` varchar(150) NULL,
  `KEGIATAN` text NULL,
  `TEMPAT` varchar(50) NULL,
  `TANGGAL` datetime NULL,
  `KEDUDUKAN` varchar(50) NULL,
  `KUM` char(2) NULL,
  `RESUME` text NULL,
  `KAJUR` varchar(50) NULL,
  `KAJURNIP` varchar(10) NULL,
  `KAJURPKT` varchar(50) NULL,
  `KAJURGOL` varchar(5) NULL,
  `KAJURRUANG` varchar(30) NULL,
  `KAJURFUNG` varchar(50) NULL,
  `LABEL` varchar(15) NULL,
  `STATUS` char(10) NULL,
  `RUANG` varchar(30) NULL
);

CREATE TABLE `P_PROSES1`  (
  `NOMOR` decimal(10, 0) NULL,
  `NOID` varchar(10) NULL,
  `P_RULE` decimal(10, 0) NULL,
  `KREDIT_USUL` decimal(10, 3) NULL,
  `KREDIT_RPT` decimal(10, 3) NULL,
  `SK` varchar(150) NULL,
  `KEGIATAN` text NULL,
  `TEMPAT` varchar(50) NULL,
  `TANGGAL` datetime NULL,
  `KEDUDUKAN` varchar(50) NULL,
  `KUM` char(2) NULL,
  `RESUME` text NULL,
  `KAJUR` varchar(50) NULL,
  `KAJURNIP` varchar(10) NULL,
  `KAJURPKT` varchar(50) NULL,
  `KAJURGOL` varchar(5) NULL,
  `KAJURRUANG` varchar(20) NULL,
  `KAJURFUNG` varchar(50) NULL,
  `LABEL` varchar(15) NULL,
  `STATUS` char(10) NULL,
  `RUANG` varchar(30) NULL
);

CREATE TABLE `P_RULE`  (
  `NOMOR` decimal(10, 0) NULL,
  `BUTIR` text NULL,
  `KREDIT` char(10) NULL,
  `KETERANGAN` text NULL,
  `LABEL` char(15) NULL,
  `KUM` char(2) NULL,
  `SUBUNS` decimal(10, 0) NULL,
  `UNS` decimal(10, 0) NULL,
  `UNS1` decimal(10, 0) NULL,
  `UNS2` decimal(10, 0) NULL,
  `PESERTA` decimal(10, 0) NULL
);

CREATE TABLE `P_SK`  (
  `NOMOR` decimal(10, 0) NOT NULL,
  `TENTANG` varchar(100) NOT NULL,
  `HAK` varchar(10) NULL
);

CREATE TABLE `P_SUBUNSUR`  (
  `NOMOR` decimal(10, 0) NULL,
  `SUBUNSUR` text NULL
);

CREATE TABLE `P_UNSUR`  (
  `NOMOR` decimal(10, 0) NULL,
  `UNSUR` varchar(200) NULL
);

CREATE TABLE `P_UNSUR1`  (
  `NOMOR` decimal(10, 0) NULL,
  `UNSUR1` varchar(200) NULL
);

CREATE TABLE `P_UNSUR2`  (
  `NOMOR` decimal(10, 0) NULL,
  `UNSUR2` varchar(50) NULL
);

CREATE TABLE `PANGKAT`  (
  `NOMOR` varchar(10) NOT NULL,
  `PANGKAT` varchar(50) NULL,
  `GOLONGAN` varchar(10) NULL,
  `URUT` decimal(10, 0) NULL,
  PRIMARY KEY (`NOMOR`)
);

CREATE TABLE `PEGAWAI`  (
  `NOMOR` decimal(8, 0) NOT NULL,
  `NIP` varchar(19) NULL,
  `NOID` varchar(15) NULL,
  `NAMA` varchar(100) NOT NULL,
  `STAFF` decimal(2, 0) NOT NULL,
  `JURUSAN` decimal(2, 0) NULL,
  `HOMEPAGE` varchar(50) NULL,
  `PASSWORD` varchar(40) NULL,
  `HAK` decimal(10, 0) NULL,
  `USERNAME` varchar(50) NULL,
  `JABATAN` decimal(10, 0) NULL,
  `SEX` char(1) NULL,
  `AGAMA` decimal(2, 0) NULL,
  `EMAIL` varchar(50) NULL,
  `ALAMAT` varchar(255) NULL,
  `NOTELP` varchar(30) NULL,
  `GOLAWAL` varchar(5) NULL,
  `GOLAKHIR` varchar(5) NULL,
  `TMTCPNS` datetime NULL,
  `TMTPNS` datetime NULL,
  `TMTFUNGSIONAL` datetime NULL,
  `TMTAKHIR` datetime NULL,
  `FUNGSIONAL` decimal(10, 0) NULL,
  `KARPEG` varchar(30) NULL,
  `MASAKERJA_TAHUN` decimal(4, 0) NULL,
  `PENDIDIKAN` decimal(10, 0) NULL,
  `RUANG` decimal(4, 0) NULL,
  `KETERANGAN` varchar(100) NULL,
  `TMPLAHIR` varchar(20) NULL,
  `TGLLAHIR` datetime NULL,
  `SHIFT` char(1) NULL,
  `HP` varchar(30) NULL,
  `GOLDARAH` varchar(5) NULL,
  `GELAR_DPN` varchar(10) NULL,
  `GELAR_BLK` varchar(20) NULL,
  `KREDIT` decimal(10, 2) NULL,
  `KUMA` decimal(10, 0) NULL,
  `KUMB` decimal(10, 0) NULL,
  `KUMC` decimal(10, 0) NULL,
  `KUMD` decimal(10, 0) NULL,
  `RAPAT` char(1) NULL,
  `STATUS_KAWIN` char(1) NULL,
  `KELURAHAN` varchar(50) NULL,
  `KECAMATAN` varchar(50) NULL,
  `KOTA` varchar(50) NULL,
  `PROPINSI` varchar(50) NULL,
  `TINGGI` decimal(3, 0) NULL,
  `BERAT` decimal(3, 0) NULL,
  `RAMBUT` decimal(2, 0) NULL,
  `MUKA` decimal(2, 0) NULL,
  `WARNA` decimal(2, 0) NULL,
  `CIRI` varchar(50) NULL,
  `CACAT` varchar(50) NULL,
  `HOBBY` varchar(100) NULL,
  `ALAMAT2` varchar(100) NULL,
  `NOTELP2` varchar(15) NULL,
  `ALAMAT3` varchar(100) NULL,
  `NOTELP3` varchar(15) NULL,
  `MANAGER` decimal(8, 0) NULL,
  `SURAT` varchar(2) NULL,
  `STATUS` decimal(2, 0) NOT NULL,
  `ASKES` varchar(30) NULL,
  `PANGKAT` varchar(40) NULL,
  `REKENING_BANK` varchar(20) NULL,
  `MASAKERJA_BULAN` decimal(2, 0) NULL,
  `LEVEL_MRC` varchar(20) NULL,
  `JABATAN_HONORARIUM` decimal(2, 0) NULL,
  `STATUS_KARYAWAN` decimal(2, 0) NULL,
  `LEVEL_AGENDA` decimal(10, 0) NULL,
  `JABATAN_KHUSUS` decimal(10, 0) NULL,
  `PERPUS_KODE_STAFF` decimal(10, 0) NULL,
  `DAPAT_UANG_KINERJA` decimal(10, 0) NULL,
  `DAPAT_UANG_KEHADIRAN` decimal(10, 0) NULL,
  `DAPAT_UANG_MAKAN` decimal(10, 0) NULL,
  `TMTSTRUKTURAL` datetime NULL,
  `TMTTUGAS_TAMBAHAN` datetime NULL,
  `JABATAN_TUGAS_TAMBAHAN` decimal(10, 0) NULL,
  `KODE_DOSEN_SK034` varchar(10) NULL,
  `DOSEN_VEDC` decimal(1, 0) NULL,
  `NIP_BARU` varchar(20) NULL,
  `KODE_SMART_CARD` varchar(9) NULL,
  `NIP_LAMA` varchar(20) NULL,
  `PROGRAM` decimal(10, 0) NULL,
  `NPWP` varchar(30) NULL,
  `NIDN` varchar(20) NULL,
  `SERDOS` decimal(10, 0) NULL,
  `LAMA_ISTIRAHAT` decimal(10, 0) NULL,
  `TMT_KERJA` datetime NULL,
  `EDIT_ABSEN` decimal(2, 0) NULL,
  `DAPAT_REMUNISASI` decimal(10, 0) NULL,
  `UNIT` decimal(10, 0) NULL,
  `DEPARTEMEN` decimal(10, 0) NULL,
  `PRAKTISI` decimal(2, 0) NULL,
  `NAMA_INSTANSI` varchar(100) NULL,
  `ALAMAT_INSTANSI` text NULL,
  `JABATAN_INSTANSI` varchar(100) NULL,
  `TMTKONTRAK` datetime NULL,
  `FUNGSIONAL_PLP` decimal(10, 0) NULL,
  `PENDIDIKAN_TERAKHIR` decimal(65, 30) NULL,
  `KARIS_KARSU` varchar(50) NULL,
  `NUPN` varchar(50) NULL,
  `NIDK` varchar(50) NULL,
  PRIMARY KEY (`NOMOR`)
);

CREATE TABLE `PEGAWAI_ALAMAT`  (
  `NOMOR` decimal(10, 0) NOT NULL,
  `PEGAWAI` decimal(10, 0) NOT NULL,
  `JALAN` varchar(150) NULL,
  `KELURAHAN` varchar(100) NULL,
  `KECAMATAN` varchar(100) NULL,
  `KOTA` varchar(100) NULL,
  `TELP` varchar(50) NULL,
  `KODE_POS` varchar(10) NULL,
  PRIMARY KEY (`NOMOR`)
);

CREATE TABLE `PEGAWAI_ANAK`  (
  `NOMOR` decimal(10, 0) NOT NULL,
  `PEGAWAI` decimal(10, 0) NOT NULL,
  `ANAK_KE` decimal(3, 0) NULL,
  `NAMA` varchar(50) NULL,
  `TEMPAT_LAHIR` varchar(30) NULL,
  `TANGGAL_LAHIR` datetime NULL,
  `JENIS_KELAMIN` char(1) NULL,
  `DARI_SUAMI_ISTRI_KE` varchar(3) NULL,
  `KETERANGAN` varchar(2) NULL,
  `PENDIDIKAN_TERAKHIR` varchar(20) NULL,
  `STATUS_TUNJANGAN` decimal(1, 0) NULL,
  PRIMARY KEY (`NOMOR`)
);

CREATE TABLE `PEGAWAI_ANAK_KETERANGAN`  (
  `NOMOR` char(2) NOT NULL,
  `KETERANGAN` varchar(20) NOT NULL
);

CREATE TABLE `PEGAWAI_CUTI`  (
  `NOMOR` decimal(10, 0) NOT NULL,
  `PEGAWAI` decimal(10, 0) NOT NULL,
  `JENIS_CUTI` decimal(10, 0) NULL,
  `MULAI_CUTI` datetime NULL,
  `AKHIR_CUTI` datetime NULL,
  `KETERANGAN` varchar(200) NULL,
  PRIMARY KEY (`NOMOR`)
);

CREATE TABLE `PEGAWAI_DUMP`  (
  `NOMOR` decimal(8, 0) NULL,
  `NIP` varchar(19) NULL,
  `NOID` varchar(15) NULL,
  `NAMA` varchar(50) NULL,
  `STAFF` decimal(2, 0) NULL,
  `HAK` decimal(10, 0) NULL,
  `SEX` char(1) NULL,
  `STATUS` decimal(2, 0) NULL
);

CREATE TABLE `PEGAWAI_HAK`  (
  `NOMOR` decimal(10, 0) NOT NULL,
  `PEGAWAI` decimal(10, 0) NOT NULL,
  `HAK` decimal(10, 0) NULL,
  `HAK_ROLES` decimal(10, 0) NULL,
  PRIMARY KEY (`NOMOR`)
);

CREATE TABLE `PEGAWAI_JABATAN`  (
  `NOMOR` decimal(10, 0) NOT NULL,
  `PEGAWAI` decimal(10, 0) NOT NULL,
  `NAMA_JABATAN` varchar(100) NULL,
  `TMT` datetime NULL,
  `NOMOR_SK` varchar(50) NULL,
  `TANGGAL_SK` datetime NULL,
  `PEJABAT_YG_MENGESAHKAN` varchar(50) NULL,
  `TUNJANGAN` varchar(250) NULL,
  `KETERANGAN` varchar(250) NULL,
  `JABATAN_FUNGSIONAL` decimal(10, 0) NULL,
  `JABATAN_STRUKTURAL` decimal(10, 0) NULL,
  PRIMARY KEY (`NOMOR`)
);

CREATE TABLE `PEGAWAI_KP4`  (
  `NOMOR` decimal(10, 0) NOT NULL,
  `PEGAWAI` decimal(10, 0) NOT NULL,
  `THN_MASA_KERJA_TAMBAHAN` varchar(4) NULL,
  `BLN_MASA_KERJA_TAMBAHAN` varchar(4) NULL,
  `THN_MASA_KERJA_SELURUH` varchar(4) NULL,
  `BLN_MASA_KERJA_SELURUH` varchar(4) NULL,
  `KERJA_SAMPINGAN` varchar(20) NULL,
  `GAJI_SAMPINGAN` varchar(10) NULL,
  `GAJI_PENSIUN` varchar(10) NULL
);

CREATE TABLE `PEGAWAI_ORANG_TUA`  (
  `NOMOR` decimal(10, 0) NOT NULL,
  `PEGAWAI` decimal(10, 0) NOT NULL,
  `NAMA` varchar(50) NULL,
  `JENIS` decimal(11, 0) NULL,
  `PEKERJAAN` varchar(50) NULL,
  `TMP_LAHIR` varchar(50) NULL,
  `TGL_LAHIR` datetime NULL,
  `KETERANGAN` decimal(11, 0) NULL,
  `TELEPON` varchar(20) NULL,
  PRIMARY KEY (`NOMOR`)
);

CREATE TABLE `PEGAWAI_PELATIHAN`  (
  `NOMOR` decimal(10, 0) NOT NULL,
  `PEGAWAI` decimal(10, 0) NULL,
  `NAMA_PELATIHAN` varchar(100) NULL,
  `INSTITUSI_PELATIHAN` varchar(100) NULL,
  `TEMPAT_TRAINING` varchar(100) NULL,
  `TANGGAL_MULAI_PELAKSANAAN` datetime NULL,
  `TANGGAL_AKHIR_PELAKSANAAN` datetime NULL,
  `DURASI_PELAKSANAAN` varchar(20) NULL,
  PRIMARY KEY (`NOMOR`)
);

CREATE TABLE `PEGAWAI_PENDIDIKAN`  (
  `NOMOR` decimal(10, 0) NOT NULL,
  `PEGAWAI` decimal(10, 0) NOT NULL,
  `PROGRAM_PENDIDIKAN` varchar(50) NULL,
  `NAMA_INSTITUSI_PENDIDIKAN` varchar(50) NULL,
  `TEMPAT` varchar(50) NULL,
  `FAKULTAS` varchar(50) NULL,
  `JURUSAN` varchar(50) NULL,
  `TAHUN_MASUK` varchar(4) NULL,
  `TAHUN_LULUS` varchar(4) NULL,
  `IJASAH` varchar(50) NULL,
  `TINGKAT_PENDIDIKAN` decimal(2, 0) NULL,
  PRIMARY KEY (`NOMOR`)
);

CREATE TABLE `PEGAWAI_PENDIDIKAN_TINGKAT`  (
  `NOMOR` decimal(10, 0) NOT NULL,
  `PENDIDIKAN` varchar(100) NULL,
  `TINGKAT` decimal(2, 0) NULL,
  PRIMARY KEY (`NOMOR`)
);

CREATE TABLE `PEGAWAI_RIWAYAT_PEKERJAAN`  (
  `NOMOR` decimal(10, 0) NOT NULL,
  `PEGAWAI` decimal(10, 0) NOT NULL,
  `TENTANG` varchar(50) NULL,
  `NOMOR_SK` varchar(50) NULL,
  `TANGGAL_SK` datetime NULL,
  `PEJABAT_YANG_MENGESAHKAN` varchar(50) NULL,
  `PANGKAT` decimal(3, 0) NULL,
  `TMT` datetime NULL,
  `MASA_KERJA_TAHUN` decimal(5, 0) NULL,
  `MASA_KERJA_BULAN` decimal(5, 0) NULL,
  `GAJI` varchar(20) NULL,
  `KETERANGAN` varchar(150) NULL,
  PRIMARY KEY (`NOMOR`)
);

CREATE TABLE `PEGAWAI_SK_KATEGORI`  (
  `NOMOR` decimal(10, 0) NOT NULL,
  `KATEGORI` varchar(100) NOT NULL
);

CREATE TABLE `PEGAWAI_SK_SUBFOLDER`  (
  `NOMOR` decimal(10, 0) NOT NULL,
  `KATEGORI` decimal(10, 0) NOT NULL,
  `SUBFOLDER` varchar(100) NOT NULL
);

CREATE TABLE `PEGAWAI_SUAMI_ISTRI`  (
  `NOMOR` decimal(10, 0) NOT NULL,
  `PEGAWAI` decimal(10, 0) NOT NULL,
  `NAMA_SUAMI_ISTRI` varchar(50) NULL,
  `TEMPAT_LAHIR` varchar(50) NULL,
  `TANGGAL_LAHIR` datetime NULL,
  `PEKERJAAN` varchar(50) NULL,
  `PERNIKAHAN_KE` varchar(5) NULL,
  `TANGGAL_PERNIKAHAN` datetime NULL,
  `TEMPAT_PERNIKAHAN` varchar(50) NULL,
  `KETERANGAN_MENINGGAL` decimal(10, 0) NULL,
  `KETERANGAN_CERAI` decimal(10, 0) NULL,
  PRIMARY KEY (`NOMOR`)
);

CREATE TABLE `PEGAWAI_TIDAK_MASUK_KERJA`  (
  `NOMOR` decimal(10, 0) NOT NULL,
  `PEGAWAI` decimal(10, 0) NOT NULL,
  `JENIS` decimal(10, 0) NULL,
  `MULAI` datetime NULL,
  `AKHIR` datetime NULL,
  `KETERANGAN` text NULL,
  `NOMOR_SURAT` varchar(100) NULL,
  `PENGANTAR_SURAT` text NULL,
  `KEPERLUAN` text NULL,
  `TEMPAT` varchar(100) NULL,
  `PENANDATANGAN` decimal(4, 0) NULL,
  `PEGAWAI_PENANDATANGAN` decimal(4, 0) NULL,
  `TEMPAT_KOTA` decimal(10, 0) NULL,
  `TANGGAL_TTD` datetime NULL,
  `PEGAWAI_TTD_CUTI` decimal(11, 0) NULL,
  PRIMARY KEY (`NOMOR`)
);

CREATE TABLE `PEGAWAI_TTD_CUTI`  (
  `NOMOR` decimal(11, 0) NOT NULL,
  `PEGAWAI` decimal(11, 0) NULL,
  `JABATAN` varchar(100) NULL,
  PRIMARY KEY (`NOMOR`)
);

CREATE TABLE `PEGAWAI_TUGAS_TAMBAHAN`  (
  `NOMOR` decimal(10, 0) NOT NULL,
  `PEGAWAI` decimal(10, 0) NOT NULL,
  `JABATAN` decimal(10, 0) NOT NULL,
  `TMT` datetime NULL,
  `BAYAR` decimal(1, 0) NULL,
  PRIMARY KEY (`NOMOR`),
  UNIQUE INDEX `PK_J_TAMBAHAN_NOMOR_1`(`NOMOR` ASC)
);

CREATE TABLE `PENDAFTAR`  (
  `NOMOR` decimal(12, 0) NULL,
  `UMMB` decimal(4, 0) NULL,
  `JURUSAN` decimal(4, 0) NULL,
  `PROGRAM` decimal(4, 0) NULL,
  `NODAFTAR` varchar(50) NOT NULL,
  `NAMA` varchar(100) NOT NULL,
  `AGAMA` decimal(1, 0) NULL,
  `SEX` char(1) NULL,
  `ALAMAT` text NULL,
  `TELP` varchar(100) NULL,
  `STATUS` char(1) NULL,
  `SPI` decimal(12, 0) NULL,
  `NRP` decimal(8, 0) NULL,
  `T_AJARAN` varchar(5) NULL,
  `SEMESTER` decimal(2, 0) NULL,
  `WARGA` varchar(10) NULL,
  `TGLLAHIR` datetime NULL,
  `PENGHASILAN` decimal(12, 0) NULL,
  `JUMLAH_ANAK` decimal(5, 0) NULL,
  `EL` decimal(1, 0) NULL,
  `PMDK` decimal(1, 0) NULL,
  `ANAK_KE` decimal(5, 0) NULL,
  `GELOMBANG` decimal(1, 0) NULL,
  `BEBAS_SPP` decimal(1, 0) NULL,
  `BEBAS_IKOMA` decimal(1, 0) NULL,
  `BEBAS_KEMAHASISWAAN` decimal(1, 0) NULL,
  `BEBAS_SPI` decimal(1, 0) NULL,
  `KETERANGAN_BEBAS_SPI` varchar(200) NULL,
  `TEMPAT_LAHIR` varchar(50) NULL,
  `SMU` varchar(200) NULL,
  `ALAMAT_SMU` text NULL,
  `TAHUN_LULUS_SMU` decimal(4, 0) NULL,
  `NILAI_IJAZAH` decimal(3, 0) NULL,
  `NILAI_UAN` decimal(3, 2) NULL,
  `DARAH` varchar(10) NULL,
  `PRESTASI_OLAHRAGA` varchar(100) NULL,
  `NUN` decimal(10, 2) NULL,
  `NIJAZAH` decimal(10, 0) NULL,
  `AYAH` varchar(60) NULL,
  `KERJA_AYAH` varchar(100) NULL,
  `KETERANGAN_AYAH` varchar(10) NULL,
  `IBU` varchar(60) NULL,
  `KERJA_IBU` varchar(100) NULL,
  `KETERANGAN_IBU` varchar(10) NULL,
  `PENGHASILAN_IBU` decimal(10, 0) NULL,
  `ALAMAT_ORTU` text NULL,
  `NOTELP_ORTU` varchar(100) NULL,
  `NISN` varchar(50) NULL,
  `TANGGAL_UBAH` datetime NULL,
  `CADANGAN` decimal(2, 0) NULL,
  `UKT` decimal(10, 0) NULL,
  `BEBAS_UKT` decimal(1, 0) NULL,
  `SEKOLAH` decimal(10, 0) NULL,
  `KODE_TRANSAKSI` varchar(11) NULL,
  `PUBLIK` decimal(1, 0) NULL,
  `MAHASISWA_JALUR_PENERIMAAN` decimal(10, 0) NULL,
  `KOTA` decimal(10, 0) NULL,
  `KOTA_ORTU` decimal(10, 0) NULL,
  `PENDAFTARAN` decimal(10, 0) NULL,
  `IKOMA` decimal(10, 0) NULL,
  `KEMAHASISWAAN` decimal(10, 0) NULL,
  `SUBKAMPUS` decimal(10, 0) NULL,
  `FOTO` longtext NULL,
  `TANGGAL_TRANSFER_SPP` datetime NULL,
  `KIRIM_EMAIL` decimal(1, 0) NULL,
  `KIRIM_SMS` decimal(1, 0) NULL,
  `EMAIL` varchar(50) NULL,
  `NIK` varchar(50) NULL,
  `KELAS_PAGI_SORE` decimal(1, 0) NULL,
  `IJASAH` longtext NULL,
  `STATUS_KAWIN` decimal(2, 0) NULL,
  `UKURAN_BAJU` varchar(5) NULL,
  `PERNAHPT` decimal(2, 0) NULL,
  `TAHUNMASUK_PT` decimal(4, 0) NULL,
  `JUMLAH_SKS` decimal(5, 0) NULL,
  `PT_ASAL` varchar(200) NULL,
  `NUNMAPEL` decimal(5, 0) NULL,
  `NIJAZAHMAPEL` decimal(5, 0) NULL,
  `STATUS_SMU` decimal(5, 0) NULL,
  `JURUSAN_SMU` decimal(10, 0) NULL,
  `THLAHIRAYAH` decimal(4, 0) NULL,
  `PENDIDIKANAYAH` decimal(2, 0) NULL,
  `THLAHIRIBU` decimal(4, 0) NULL,
  `PENDIDIKANIBU` decimal(2, 0) NULL,
  `SUMBERBIAYA` decimal(2, 0) NULL,
  `LEMBAGA` varchar(200) NULL,
  `JENIS_LEMBAGA` decimal(2, 0) NULL,
  `JENIS_TEMPATTINGGAL` decimal(2, 0) NULL,
  `TRANSPORTASI` varchar(200) NULL,
  `MINAT` varchar(200) NULL,
  `INFOPOLIJE` decimal(2, 0) NULL,
  `BIAYA_LAIN` decimal(10, 0) NULL,
  `UKT3` decimal(10, 0) NULL,
  `UKT4` decimal(10, 0) NULL,
  `UKT5` decimal(10, 0) NULL,
  `KELURAHAN` varchar(200) NULL,
  `KECAMATAN` varchar(200) NULL,
  `FEEDER_WILAYAH` decimal(10, 0) NULL,
  `NOMOR_UKT` decimal(10, 0) NULL,
  `BIDIKMISI` decimal(1, 0) NULL,
  `RATA_SEM_1` double NULL,
  `RATA_SEM_2` double NULL,
  `RATA_SEM_3` double NULL,
  `RATA_SEM_4` double NULL,
  `RATA_SEM_5` double NULL,
  `RATA_SEM_6` double NULL,
  `KAP_BIDIKMISI` varchar(255) NULL,
  `NOREF_BANK` text NULL,
  `TANGGAL_TRANSFER` datetime NULL,
  `PEMBAYARAN` varchar(255) NULL,
  `SCAN_PEMBAYARAN` longtext NULL,
  `JURUSAN_ASAL` decimal(10, 0) NULL,
  `PRESTASI` text NULL
);

CREATE TABLE `PENDIDIKAN`  (
  `NOMOR` decimal(2, 0) NOT NULL,
  `PENDIDIKAN` varchar(50) NOT NULL,
  `TINGKAT` decimal(2, 0) NULL,
  PRIMARY KEY (`NOMOR`)
);

CREATE TABLE `PENGUMUMAN`  (
  `NOMOR` decimal(8, 0) NOT NULL,
  `PEGAWAI` decimal(8, 0) NULL,
  `KATEGORI` decimal(4, 0) NULL,
  `JUDUL` varchar(100) NULL,
  `URAIAN` text NULL,
  `COUNTER` decimal(8, 0) NULL,
  `DIBUAT` datetime NULL,
  `DIUBAH` datetime NULL,
  PRIMARY KEY (`NOMOR`),
  INDEX `PENGUMUMAN_COUNTER`(`COUNTER` ASC),
  INDEX `PENGUMUMAN_DIBUAT`(`DIBUAT` ASC),
  INDEX `PENGUMUMAN_DIUBAH`(`DIUBAH` ASC),
  INDEX `PENGUMUMAN_KATEGORI`(`KATEGORI` ASC),
  INDEX `PENGUMUMAN_PEGAWAI`(`PEGAWAI` ASC)
);

CREATE TABLE `PERPUS_KODE_STAFF`  (
  `NOMOR` decimal(10, 0) NOT NULL,
  `KETERANGAN` varchar(50) NOT NULL,
  PRIMARY KEY (`NOMOR`)
);

CREATE TABLE `PERUSAHAAN`  (
  `NOMOR` decimal(10, 0) NOT NULL,
  `NAMA` varchar(70) NOT NULL,
  `ALAMAT` text NULL,
  `NO_TELP` varchar(40) NULL,
  `BIDANG_USAHA` decimal(3, 0) NULL,
  `STATUS_PERUSAHAAN` decimal(3, 0) NULL,
  PRIMARY KEY (`NOMOR`),
  UNIQUE INDEX `IN_PERUSAHAAN_NAMA`(`NAMA` ASC)
);

CREATE TABLE `PERUSAHAAN_BIDANG_USAHA`  (
  `NOMOR` decimal(10, 0) NOT NULL,
  `BIDANG_USAHA` varchar(70) NULL,
  PRIMARY KEY (`NOMOR`)
);

CREATE TABLE `PERUSAHAAN_STATUS`  (
  `NOMOR` decimal(10, 0) NOT NULL,
  `STATUS` varchar(100) NULL,
  PRIMARY KEY (`NOMOR`)
);

CREATE TABLE `PP_ASALBUKU`  (
  `NOMOR` decimal(4, 0) NOT NULL,
  `ASAL` varchar(100) NULL,
  `KETERANGAN` varchar(100) NULL,
  PRIMARY KEY (`NOMOR`)
);

CREATE TABLE `PP_BATASBUKU`  (
  `NO` decimal(65, 30) NULL,
  `KET` decimal(65, 30) NULL,
  `KETERANGAN` varchar(50) NULL
);

CREATE TABLE `PP_BUKU`  (
  `NOMOR` decimal(8, 0) NOT NULL,
  `JUDUL` decimal(8, 0) NULL,
  `NIJ` varchar(10) NULL,
  `BARCODE` varchar(30) NULL,
  `NIB` varchar(30) NULL,
  `TM` varchar(10) NULL,
  `ASAL` decimal(4, 0) NULL,
  `HARGA` varchar(15) NULL,
  `STATUS` decimal(5, 0) NULL,
  `KETERANGAN` varchar(50) NULL,
  `ISSN` varchar(50) NULL,
  `CALL_NUMBER` varchar(50) NULL,
  `NOKELAS` varchar(50) NULL,
  `ISBN` varchar(50) NULL,
  PRIMARY KEY (`NOMOR`)
);

CREATE TABLE `PP_CATATAN`  (
  `NO` varchar(20) NOT NULL,
  `PEMINJAM` varchar(10) NULL,
  `CATATAN` text NULL,
  `TANGGAL` datetime NULL,
  PRIMARY KEY (`NO`)
);

CREATE TABLE `PP_DENDA`  (
  `NO` varchar(10) NULL,
  `KET` varchar(10) NULL
);

CREATE TABLE `PP_DIKTAT_PENGEMBALIAN`  (
  `NOMOR` decimal(10, 0) NOT NULL,
  `TAHUN_AJARAN` decimal(4, 0) NOT NULL,
  `SEMESTER` decimal(1, 0) NOT NULL,
  `TANGGAL` datetime NOT NULL
);

CREATE TABLE `PP_HARI`  (
  `NO` varchar(10) NULL,
  `KET` varchar(10) NULL
);

CREATE TABLE `PP_JUDUL`  (
  `NOMOR` decimal(8, 0) NOT NULL,
  `NIJ` varchar(25) NULL,
  `JUDUL` text NULL,
  `PENGARANG` varchar(75) NULL,
  `PENERBIT` varchar(75) NULL,
  `TAHUN` varchar(5) NULL,
  `EDISI` varchar(20) NULL,
  `URAIAN` text NULL,
  `DAFTARISI` text NULL,
  `HALAMAN` decimal(5, 0) NULL,
  `UKURAN` varchar(20) NULL,
  `LOKASI` decimal(5, 0) NULL,
  `KOLEKSI` decimal(5, 0) NULL,
  `SUBYEK` varchar(75) NULL,
  `NOKELAS` varchar(75) NULL,
  `CALL_NUMBER` varchar(75) NULL,
  `ISBN` varchar(75) NULL,
  `ISSN` varchar(75) NULL,
  `KETERANGAN` varchar(75) NULL,
  `OPERATOR` varchar(75) NULL,
  `STATUS` char(10) NULL,
  PRIMARY KEY (`NOMOR`)
);

CREATE TABLE `PP_PINJAM`  (
  `NOMOR` decimal(8, 0) NULL,
  `PEMINJAM` varchar(50) NULL,
  `BUKU` varchar(50) NULL,
  `TGLPINJAM` datetime NULL,
  `TGLKEMBALI` datetime NULL,
  `STATUS` varchar(10) NULL,
  `TGLHRSKEMBALI` datetime NULL,
  `JUDUL` varchar(150) NULL
);

CREATE TABLE `PP_STATUSBUKU`  (
  `NOMOR` decimal(2, 0) NOT NULL,
  `STATUS` varchar(20) NULL,
  PRIMARY KEY (`NOMOR`)
);

CREATE TABLE `PREDIKAT`  (
  `NOMOR` decimal(10, 0) NOT NULL,
  `IP_BAWAH` decimal(5, 2) NOT NULL,
  `IP_ATAS` decimal(5, 2) NOT NULL,
  `LAMA_STUDI` decimal(2, 0) NOT NULL,
  `PROGRAM` varchar(20) NOT NULL,
  `PREDIKAT` varchar(50) NOT NULL,
  `PREDIKAT_INGGRIS` varchar(50) NULL,
  `PREDIKAT_ALIAS` varchar(20) NULL,
  PRIMARY KEY (`NOMOR`)
);

CREATE TABLE `PROGRAM`  (
  `NOMOR` decimal(2, 0) NOT NULL,
  `PROGRAM` varchar(50) NOT NULL,
  `KETERANGAN` varchar(100) NULL,
  `LAMA_STUDI` decimal(3, 1) NULL,
  `KODE_EPSBED` decimal(2, 0) NULL,
  `GELAR` varchar(100) NULL,
  `GELAR_INGGRIS` varchar(100) NULL,
  `MAX_KELAS` decimal(1, 0) NULL,
  `KETERANGAN_INGGRIS` varchar(100) NULL,
  PRIMARY KEY (`NOMOR`)
);

CREATE TABLE `PROGRAM_STUDI`  (
  `NOMOR` decimal(10, 0) NOT NULL,
  `PROGRAM` decimal(10, 0) NOT NULL,
  `JURUSAN` decimal(10, 0) NOT NULL,
  `KEPALA` decimal(10, 0) NULL,
  `KODE_EPSBED` varchar(5) NULL,
  `DEPARTEMEN` decimal(10, 0) NULL,
  `GELAR` varchar(100) NULL,
  `GELAR_INGGRIS` varchar(100) NULL
);

CREATE TABLE `RAPAT_KENAIKAN_TANGGAL`  (
  `NOMOR` decimal(10, 0) NULL,
  `KELAS` decimal(10, 0) NULL,
  `TANGGAL` datetime NULL,
  `TAHUN` decimal(4, 0) NULL,
  `SEMESTER` decimal(1, 0) NULL
);

CREATE TABLE `RAPORT_MANUAL`  (
  `NOMOR` decimal(10, 0) NOT NULL,
  `TAHUN` decimal(4, 0) NULL,
  `SEMESTER` decimal(1, 0) NULL,
  `MAHASISWA` decimal(10, 0) NULL,
  `STATUS` decimal(1, 0) NULL,
  PRIMARY KEY (`NOMOR`)
);

CREATE TABLE `RAPORT_MANUAL_DETIL`  (
  `NOMOR` decimal(10, 0) NOT NULL,
  `RAPORT_MANUAL` decimal(10, 0) NULL,
  `MATAKULIAH` text NULL,
  `SKS` decimal(1, 0) NULL,
  `NILAI_ANGKA` decimal(3, 0) NULL,
  `NILAI_HURUF` varchar(2) NULL,
  `KODE_MATAKULIAH` varchar(50) NULL,
  PRIMARY KEY (`NOMOR`)
);

CREATE TABLE `RAPORT_TEMP`  (
  `NOMOR` varchar(30) NULL,
  `NRP` varchar(20) NULL,
  `NAMA` varchar(100) NULL,
  `WALIKELAS` varchar(50) NULL,
  `JURUSAN` varchar(30) NULL,
  `TAHUN` varchar(10) NULL,
  `SEMESTER` varchar(10) NULL,
  `KELAS` varchar(10) NULL,
  `PARALEL` varchar(10) NULL,
  `KODE` varchar(20) NULL,
  `MATAKULIAH` varchar(100) NULL,
  `JAM` decimal(5, 0) NULL,
  `UTAMA` varchar(5) NULL,
  `ULANGAN` varchar(5) NULL,
  `NH` varchar(10) NULL,
  `KAK` varchar(5) NULL,
  `KETERANGAN` varchar(20) NULL,
  `STATUS` varchar(50) NULL,
  `TANGGALNAIK` datetime NULL,
  `MKGRUP` varchar(10) NULL,
  `NO` decimal(3, 0) NULL
);

CREATE TABLE `REKAP_TA_KOORDINATOR`  (
  `NOMOR` decimal(10, 0) NOT NULL,
  `PROGRAM` decimal(10, 0) NOT NULL,
  `JURUSAN` decimal(10, 0) NOT NULL,
  `PEGAWAI` decimal(10, 0) NOT NULL,
  PRIMARY KEY (`NOMOR`)
);

CREATE TABLE `REMUN_KELAS_JABATAN`  (
  `NOMOR` decimal(11, 0) NOT NULL,
  `KELAS_JABATAN` decimal(4, 0) NULL,
  `TUNJANGAN_KINERJA` decimal(11, 2) NULL,
  PRIMARY KEY (`NOMOR`)
);

CREATE TABLE `REMUN_KELAS_JABATAN_HNR`  (
  `NOMOR` decimal(11, 0) NOT NULL,
  `KELAS_JABATAN` varchar(4) NULL,
  `TUNJANGAN_KINERJA` decimal(11, 2) NULL,
  `STATUS_KARYAWAN` decimal(3, 0) NULL,
  PRIMARY KEY (`NOMOR`)
);

CREATE TABLE `REMUN_SESI_PEGAWAI`  (
  `NOMOR` decimal(11, 0) NOT NULL,
  `PEGAWAI` decimal(4, 0) NULL,
  `KELAS_JABATAN` decimal(4, 0) NULL,
  `PROSENTASE_KINERJA` decimal(6, 2) NULL,
  `BULAN` decimal(2, 0) NULL,
  `TAHUN` decimal(4, 0) NULL,
  `TUNJANGAN_KINERJA` decimal(11, 2) NULL,
  `PROSENTASE_TL` decimal(6, 2) NULL,
  `PROSENTASE_PSW` decimal(6, 2) NULL,
  `PROSENTASE_DISIPLIN` decimal(6, 2) NULL,
  `REMUN_KE_13` decimal(2, 0) NULL,
  PRIMARY KEY (`NOMOR`)
);

CREATE TABLE `REMUN_TTD`  (
  `NOMOR` decimal(4, 0) NOT NULL,
  `PEGAWAI` decimal(4, 0) NULL,
  `JABATAN` varchar(50) NULL,
  PRIMARY KEY (`NOMOR`)
);

CREATE TABLE `RUANG`  (
  `NOMOR` decimal(10, 0) NOT NULL,
  `RUANG` varchar(50) NOT NULL,
  `KETERANGAN` varchar(100) NULL,
  `KEPALA` decimal(8, 0) NULL,
  `ASISTEN` decimal(8, 0) NULL,
  `TEKNISI` decimal(8, 0) NULL,
  `JURUSAN` decimal(2, 0) NULL,
  `HOMEPAGE` varchar(50) NULL,
  `EMAIL` varchar(50) NULL,
  `USERNAME` varchar(20) NULL,
  `PASSWORD` varchar(40) NULL,
  `KODE` char(1) NULL,
  `TELP` varchar(50) NULL,
  `TENDER` decimal(2, 0) NULL,
  `IS_RUANG_KULIAH` decimal(1, 0) NULL,
  `KAPASITAS_MAHASISWA` decimal(4, 0) NULL,
  `PEMAKAI` decimal(10, 0) NULL,
  `TEKNISI3` decimal(8, 0) NULL,
  `TEKNISI4` decimal(8, 0) NULL,
  `TEKNISI5` decimal(8, 0) NULL,
  PRIMARY KEY (`NOMOR`)
);

CREATE TABLE `SATUAN`  (
  `KODE_SAT` varchar(10) NULL,
  `SATUAN` varchar(10) NULL
);

CREATE TABLE `SETTING`  (
  `NAMA` varchar(50) NOT NULL,
  `NILAI` varchar(50) NULL,
  `KETERANGAN` varchar(100) NULL,
  PRIMARY KEY (`NAMA`)
);

CREATE TABLE `SETTING_SATPAM`  (
  `NOMOR` decimal(10, 0) NOT NULL,
  `PEGAWAI` decimal(10, 0) NOT NULL,
  `TANGGAL` datetime NOT NULL,
  `SHIFT` decimal(1, 0) NULL,
  PRIMARY KEY (`NOMOR`),
  INDEX `IN_SETTING_SATPAM`(`PEGAWAI` ASC, `TANGGAL` ASC)
);

CREATE TABLE `SETTING_SATPAM_DETAIL`  (
  `NOMOR` decimal(10, 0) NOT NULL,
  `PEGAWAI` decimal(10, 0) NOT NULL,
  `TANGGAL` datetime NOT NULL,
  `SHIFT` decimal(1, 0) NULL,
  PRIMARY KEY (`NOMOR`)
);

CREATE TABLE `SEX`  (
  `NOMOR` char(1) NOT NULL,
  `SEX` varchar(10) NULL,
  PRIMARY KEY (`NOMOR`)
);

CREATE TABLE `SK034_KULIAH_MAHASISWA_LOG`  (
  `NOMOR` decimal(10, 0) NOT NULL,
  `MAHASISWA` decimal(10, 0) NOT NULL,
  `TAHUN` decimal(4, 0) NOT NULL,
  `SEMESTER` decimal(1, 0) NOT NULL,
  PRIMARY KEY (`NOMOR`)
);

CREATE TABLE `SK034_MAHASISWA_LOG`  (
  `NOMOR` decimal(10, 0) NOT NULL,
  `MAHASISWA` decimal(10, 0) NOT NULL,
  PRIMARY KEY (`NOMOR`)
);

CREATE TABLE `SK034_MATAKULIAH_LOG`  (
  `NOMOR` decimal(10, 0) NOT NULL,
  `MATAKULIAH` decimal(10, 0) NOT NULL,
  `TAHUN` decimal(4, 0) NOT NULL,
  `SEMESTER` decimal(1, 0) NOT NULL,
  PRIMARY KEY (`NOMOR`)
);

CREATE TABLE `SK034_MENGAJAR_DOSEN_LOG`  (
  `NOMOR` decimal(10, 0) NOT NULL,
  `KULIAH` decimal(10, 0) NOT NULL,
  `TAHUN` decimal(4, 0) NOT NULL,
  `SEMESTER` decimal(1, 0) NOT NULL,
  PRIMARY KEY (`NOMOR`)
);

CREATE TABLE `SK034_NILAI_SEMESTER_MHS_LOG`  (
  `NOMOR` decimal(10, 0) NOT NULL,
  `NILAI` decimal(10, 0) NOT NULL,
  `TAHUN` decimal(4, 0) NOT NULL,
  `SEMESTER` decimal(1, 0) NOT NULL,
  PRIMARY KEY (`NOMOR`)
);

CREATE TABLE `SK034_RIWAYAT_STATUS_MHS_LOG`  (
  `NOMOR` decimal(10, 0) NOT NULL,
  `CUTI_DO` decimal(10, 0) NOT NULL,
  `TAHUN` decimal(4, 0) NOT NULL,
  `SEMESTER` decimal(1, 0) NOT NULL,
  PRIMARY KEY (`NOMOR`)
);

CREATE TABLE `SPC_JENIS_ALAT`  (
  `KODE_JENIS_ALAT` varchar(5) NOT NULL,
  `NAMA_JENIS_ALAT` varchar(50) NULL,
  `KET_JENIS_ALAT` varchar(100) NULL,
  PRIMARY KEY (`KODE_JENIS_ALAT`)
);

CREATE TABLE `SPC_PAJAK`  (
  `ID_PAJAK` varchar(22) NOT NULL,
  `NAMA_PAJAK` varchar(100) NULL,
  `PROSENTASE` varchar(5) NULL,
  PRIMARY KEY (`ID_PAJAK`)
);

CREATE TABLE `SPC_STAFF_SPC`  (
  `ID_STAF_SPC` varchar(10) NOT NULL,
  `LEVEL_SPC` varchar(20) NULL,
  `TGL_MASUK` datetime NULL,
  `TGL_KELUAR` datetime NULL,
  `STATUS_STAF` varchar(30) NULL,
  PRIMARY KEY (`ID_STAF_SPC`)
);

CREATE TABLE `SPP_HAK`  (
  `NOMOR` varchar(10) NOT NULL,
  `KETERANGAN` varchar(50) NULL
);

CREATE TABLE `SPP_STATUS`  (
  `NOMOR` decimal(3, 0) NOT NULL,
  `KETERANGAN` varchar(30) NULL
);

CREATE TABLE `SPPD_BANDARA`  (
  `ID_BANDARA` decimal(10, 0) NOT NULL,
  `ID_KOTA` decimal(10, 0) NOT NULL,
  `NAMA_BANDARA` varchar(100) NULL,
  `KODE_ICAO` varchar(20) NULL,
  `KODE_IATA` varchar(20) NULL,
  `PANJANG_RUNWAY` decimal(10, 0) NULL,
  `PENGELOLA_BANDARA` varchar(100) NULL,
  PRIMARY KEY (`ID_BANDARA`),
  INDEX `KOTA_PUNYA_BANDARA_FK`(`ID_KOTA` ASC)
);

CREATE TABLE `SPPD_BIAYA_PEMETIAN`  (
  `ID_PEMETIAN` decimal(20, 0) NOT NULL,
  `TINGKAT_PEGAWAI` varchar(20) NULL,
  `BIAYA_PEMETIAN` decimal(20, 0) NULL,
  `PENGANGKUTAN_PETI` decimal(20, 0) NULL,
  PRIMARY KEY (`ID_PEMETIAN`)
);

CREATE TABLE `SPPD_DATA_TRANSAKSI_UANG`  (
  `ID_KWITANSI` decimal(22, 0) NOT NULL,
  `ID_SPPD` decimal(22, 0) NOT NULL,
  `ID_TTD` decimal(3, 0) NULL,
  `KW1_TGL_PENYERAHAN` varchar(100) NULL,
  `KW1_JUMLAH_TOTAL` decimal(22, 0) NULL,
  `TRANS_JENIS_KW` varchar(50) NULL,
  `TRANS_TERIMA_DARI` decimal(22, 0) NULL,
  `TRANS_DISETUJUI` decimal(22, 0) NULL,
  `PP_BERDASAR` varchar(50) NULL,
  `STATUS_BAYAR` varchar(30) NULL,
  `ID_DANA` decimal(22, 0) NULL,
  `MAK_DANA` varchar(50) NULL,
  `NO_KWITANSI` varchar(50) NULL,
  `TAHUN_DANA` decimal(4, 0) NULL,
  PRIMARY KEY (`ID_KWITANSI`),
  INDEX `KWITANSI_SPPD_FK`(`ID_SPPD` ASC),
  INDEX `TTD_TRANSAKSI_FK`(`ID_TTD` ASC)
);

CREATE TABLE `SPPD_DETAIL_KW1`  (
  `ID_DETAIL_TRANSAKSI` decimal(22, 0) NOT NULL,
  `ID_KWITANSI` decimal(22, 0) NOT NULL,
  `DETAIL_PEMBAYARAN` varchar(100) NULL,
  `DETAIL_URAIAN` varchar(100) NULL,
  `DETAIL_JUMLAH` decimal(22, 0) NULL,
  `DETAIL_KET` varchar(100) NULL,
  `KETERANGAN` varchar(100) NULL,
  PRIMARY KEY (`ID_DETAIL_TRANSAKSI`),
  INDEX `DETAIL_KWITANSI_FK`(`ID_KWITANSI` ASC)
);

CREATE TABLE `SPPD_DETAIL_TUJUAN`  (
  `ID_DETAIL_TUJUAN` decimal(22, 0) NOT NULL,
  `ID_SPPD` decimal(22, 0) NOT NULL,
  `TEMPAT_BERANGKAT` varchar(50) NULL,
  `ALAT_ANGKUT` varchar(50) NULL,
  `TGL_BRGKT_DETAIL` varchar(50) NULL,
  `TGL_TIBA_DETAIL` varchar(50) NULL,
  `ID_KOTA` decimal(10, 0) NOT NULL,
  `ALAT_ANGKUT_PULANG` varchar(50) NULL,
  `JML_HARI` decimal(5, 0) NULL,
  `ID_SURAT_TUGAS` decimal(22, 0) NULL,
  PRIMARY KEY (`ID_DETAIL_TUJUAN`),
  INDEX `KOTA_TUJUAN_FK`(`ID_KOTA` ASC),
  INDEX `SPPD_DETAIL_TUJUAN_FK`(`ID_SPPD` ASC)
);

CREATE TABLE `SPPD_FAS_PENGINAPAN`  (
  `ID_FAS_HOTEL` decimal(10, 0) NOT NULL,
  `PANGKAT_PEJABAT_INAP` varchar(100) NULL,
  `TINGKAT_PERJALANAN_INAP` varchar(10) NULL,
  `FASILITAS_HOTEL` varchar(50) NULL,
  `KELAS_HOTEL` varchar(50) NULL,
  `GOLONGAN` varchar(10) NULL,
  PRIMARY KEY (`ID_FAS_HOTEL`)
);

CREATE TABLE `SPPD_FAS_TRANSPORT`  (
  `ID_FAS_TRANSPORT` decimal(10, 0) NOT NULL,
  `PANGKAT_PEJABAT` varchar(100) NULL,
  `TINGKAT_PERJALANAN` varchar(10) NULL,
  `PESAWAT_UDARA` varchar(50) NULL,
  `KAPAL_LAUT` varchar(50) NULL,
  `KERETA_API_BUS` varchar(50) NULL,
  `LAINNYA` varchar(50) NULL,
  PRIMARY KEY (`ID_FAS_TRANSPORT`)
);

CREATE TABLE `SPPD_JADWAL_KEGIATAN`  (
  `ID_JADWAL` decimal(22, 0) NOT NULL,
  `ACARA_JADWAL` varchar(100) NULL,
  `WAKTU` varchar(25) NULL,
  `TEMPAT` varchar(100) NULL,
  `KET_JADWAL_KEG` varchar(100) NULL,
  `ID_SURAT_TUGAS` decimal(22, 0) NOT NULL,
  PRIMARY KEY (`ID_JADWAL`)
);

CREATE TABLE `SPPD_KOTA`  (
  `ID_KOTA` decimal(10, 0) NOT NULL,
  `ID_PROPINSI` decimal(5, 0) NOT NULL,
  `NAMA_KOTA` varchar(100) NULL,
  `KET_KOTA` varchar(100) NULL,
  `KABUPATEN` decimal(1, 0) NULL,
  PRIMARY KEY (`ID_KOTA`),
  INDEX `TERDIRI_DARI_KOTA_FK`(`ID_PROPINSI` ASC)
);

CREATE TABLE `SPPD_PANGKAT_PEGAWAI`  (
  `GOL` varchar(10) NOT NULL,
  `PANGKAT_PEG` varchar(50) NOT NULL,
  `JABATAN_PEG` varchar(50) NULL,
  PRIMARY KEY (`GOL`)
);

CREATE TABLE `SPPD_PENANDA_TANGAN`  (
  `ID_TTD` decimal(3, 0) NOT NULL,
  `NAMA_TTD` varchar(100) NULL,
  `NIP_TTD` varchar(15) NULL,
  `JABATAN_TTD` varchar(100) NULL,
  `STATUS_TTD` decimal(1, 0) NULL,
  `KET_TTD` varchar(100) NULL
);

CREATE TABLE `SPPD_PENANDA_TANGAN1`  (
  `ID_TTD` decimal(3, 0) NOT NULL,
  `NAMA_TTD` varchar(100) NULL,
  `NIP_TTD` varchar(15) NULL,
  `JABATAN_TTD` varchar(100) NULL,
  `STATUS_TTD` decimal(1, 0) NULL,
  `KET_TTD` varchar(100) NULL,
  PRIMARY KEY (`ID_TTD`)
);

CREATE TABLE `SPPD_PP_BERDASAR`  (
  `ID_PP` decimal(22, 0) NOT NULL,
  `NOMOR_PP` varchar(100) NULL,
  `STATUS_PP` varchar(50) NULL
);

CREATE TABLE `SPPD_PROPINSI`  (
  `ID_PROPINSI` decimal(5, 0) NOT NULL,
  `NAMA_PROPINSI` varchar(100) NULL,
  `IBUKOTA_PROPINSI` varchar(100) NULL,
  `UANG_HARIAN` decimal(22, 0) NULL,
  `HOTEL_SUITE` decimal(22, 0) NULL,
  `HOTEL_LIMA` decimal(22, 0) NULL,
  `HOTEL_EMPAT` decimal(22, 0) NULL,
  `HOTEL_TIGA` decimal(22, 0) NULL,
  `HOTEL_DUA` decimal(22, 0) NULL,
  `HOTEL_SATU` decimal(22, 0) NULL,
  PRIMARY KEY (`ID_PROPINSI`)
);

CREATE TABLE `SPPD_SEKRETARIS`  (
  `ID_PEGAWAI` decimal(22, 0) NOT NULL,
  `AKTIF` decimal(1, 0) NOT NULL
);

CREATE TABLE `SPPD_SPPD`  (
  `ID_SPPD` decimal(22, 0) NOT NULL,
  `ID_SURAT_TUGAS` decimal(22, 0) NOT NULL,
  `ID_TTD` decimal(3, 0) NOT NULL,
  `TGL_SPPD` datetime NULL,
  `KET_LAIN_SPPD` varchar(100) NULL,
  `TGL_KEMBALI_SPPD` datetime NULL,
  `STATUS_SPPD` varchar(30) NULL,
  `LAMPIRAN_SPPD` varchar(10) NULL,
  `LEMBAR_KE_SPPD` varchar(10) NULL,
  `NOMOR_SPPD` varchar(20) NULL,
  `MAKSUD_B_SPPD` varchar(100) NULL,
  `TINGKAT_SPPD` varchar(3) NULL,
  `ANGKUT_A` varchar(50) NULL,
  `ANGKUT_B` varchar(50) NULL,
  PRIMARY KEY (`ID_SPPD`),
  INDEX `MEMPUNYAI_SPPD_FK`(`ID_SURAT_TUGAS` ASC),
  INDEX `TANDA_TGN_SPPD_FK`(`ID_TTD` ASC)
);

CREATE TABLE `SPPD_SUMBER_DANA`  (
  `ID_DANA` decimal(22, 0) NOT NULL,
  `JENIS_SUMBER_DANA` varchar(50) NULL,
  `KODE_PROGRAM` varchar(50) NULL,
  `KEGIATAN` varchar(50) NULL,
  `SUB_KEGIATAN` varchar(50) NULL,
  `MAK_DANA` varchar(50) NULL,
  `PAGU_DANA` decimal(22, 0) NULL,
  `JML_REALISASI_DANA` decimal(22, 0) NULL,
  `SISA_PAGU_DANA` decimal(22, 0) NULL,
  `PERSEN_PENYERAPAN` double NULL,
  `MIN_PENYERAPAN` decimal(22, 0) NULL,
  `STATUS_DANA` varchar(50) NULL,
  `TAHUN_ANGGARAN` decimal(4, 0) NULL,
  `URUT_DANA` decimal(1, 0) NULL,
  `PERSEN_SISA_PAGU` double NULL
);

CREATE TABLE `SPPD_SURAT_TUGAS`  (
  `ID_SURAT_TUGAS` decimal(22, 0) NOT NULL,
  `ID_TTD` decimal(3, 0) NOT NULL,
  `NO_SURAT_TUGAS` varchar(100) NULL,
  `NOMOR_PEG` decimal(8, 0) NULL,
  `PANGKAT_PEG` varchar(100) NULL,
  `JABATAN_PEG` varchar(100) NULL,
  `TGL_SURAT_SPPD` varchar(50) NULL,
  `ST_TUGAS` varchar(100) NULL,
  `TEMPAT_TUGAS` varchar(100) NULL,
  `JANGKA_WAKTU` decimal(5, 0) NULL,
  `TGL_BERANGKAT` varchar(50) NULL,
  `TGL_HARUS_KEMBALI` varchar(50) NULL,
  `KET_LAIN` varchar(100) NULL,
  `STATUS_SURAT_TUGAS` varchar(50) NULL,
  PRIMARY KEY (`ID_SURAT_TUGAS`),
  INDEX `TANDA_TGN_TUGAS_FK`(`ID_TTD` ASC)
);

CREATE TABLE `SPPD_TIBA_TTD`  (
  `ID_TIBA` decimal(10, 0) NOT NULL,
  `ID_SURATTUGAS` decimal(10, 0) NULL,
  `TIBA_DI` varchar(50) NULL,
  `TGL_TIBA` varchar(50) NULL,
  `BERANGKAT_DARI` varchar(50) NULL,
  `TGL_BERANGKAT` varchar(50) NULL,
  `JABATAN_PEG_TIBA` varchar(100) NULL,
  `NAMA_PEG_TIBA` varchar(50) NULL,
  `NIP_PEG_TIBA` varchar(50) NULL,
  `JABATAN_PEG_BERANGKAT` varchar(100) NULL,
  `NAMA_PEG_BERANGKAT` varchar(50) NULL,
  `NIP_PEG_BERANGKAT` varchar(50) NULL,
  `TUJUAN_KE` varchar(50) NULL
);

CREATE TABLE `SPPD_TIKET`  (
  `ID_TIKET` decimal(22, 0) NOT NULL,
  `URAIAN_TIKET` varchar(100) NOT NULL,
  `HARGA_TIKET` decimal(10, 0) NOT NULL,
  `ID_SURAT_TUGAS` decimal(22, 0) NOT NULL
);

CREATE TABLE `STAFF`  (
  `NOMOR` decimal(3, 0) NOT NULL,
  `STAFF` varchar(50) NOT NULL,
  PRIMARY KEY (`NOMOR`)
);

CREATE TABLE `STATUS`  (
  `KODE` char(1) NOT NULL,
  `STATUS` varchar(20) NOT NULL,
  `KODE_EPSBED` varchar(10) NULL,
  PRIMARY KEY (`KODE`)
);

CREATE TABLE `STATUS_BUKU`  (
  `NOMOR` decimal(2, 0) NOT NULL,
  `STATUS` varchar(20) NULL,
  PRIMARY KEY (`NOMOR`)
);

CREATE TABLE `STATUS_KARYAWAN`  (
  `NOMOR` decimal(2, 0) NOT NULL,
  `STATUS` varchar(50) NULL,
  `URUT` varchar(20) NULL,
  PRIMARY KEY (`NOMOR`)
);

CREATE TABLE `STATUS_KAWIN`  (
  `KODE` char(1) NOT NULL,
  `STATUS` varchar(50) NULL,
  PRIMARY KEY (`KODE`)
);

CREATE TABLE `STATUS_PEGAWAI`  (
  `NOMOR` decimal(2, 0) NOT NULL,
  `STATUS` varchar(50) NULL,
  PRIMARY KEY (`NOMOR`)
);

CREATE TABLE `STATUS_TUNJANGAN`  (
  `NOMOR` decimal(1, 0) NOT NULL,
  `STATUS` varchar(30) NOT NULL,
  PRIMARY KEY (`NOMOR`)
);

CREATE TABLE `SURAT_KELUAR`  (
  `NOMOR_URUT` decimal(10, 0) NOT NULL,
  `NOMOR_BERKAS` varchar(50) NOT NULL,
  `ALAMAT_PENERIMA` text NULL,
  `TANGGAL` datetime NULL,
  `PERIHAL` text NULL,
  `NOMOR_PETUNJUK` varchar(100) NULL,
  `NOMOR` varchar(50) NULL,
  `SISIPAN` decimal(10, 0) NULL,
  `PESAN` varchar(1) NULL,
  `NOMOR_BERKAS_ASLI` varchar(50) NOT NULL
);

CREATE TABLE `SURAT_MASUK`  (
  `NOMOR_URUT` decimal(10, 0) NOT NULL,
  `NOMOR_BERKAS` varchar(100) NULL,
  `ALAMAT_PENGIRIM` text NULL,
  `TANGGAL` datetime NULL,
  `NOMER` varchar(100) NULL,
  `PERIHAL` varchar(250) NULL,
  `NOMOR_PETUNJUK` varchar(100) NULL,
  `NOMOR_PAKKET` varchar(100) NULL,
  `TANGGAL_TERIMA` datetime NULL
);

CREATE TABLE `TA_KETERANGAN`  (
  `KODE` decimal(1, 0) NOT NULL,
  `KETERANGAN` varchar(30) NOT NULL,
  PRIMARY KEY (`KODE`)
);

CREATE TABLE `TANGGAL`  (
  `TANGGAL` datetime NULL,
  `LIBUR` decimal(1, 0) NULL
);

CREATE TABLE `TANGGAL_BUKA_JADWAL_UJIAN`  (
  `NOMOR` decimal(10, 0) NOT NULL,
  `TAHUN` decimal(4, 0) NULL,
  `SEMESTER` decimal(1, 0) NULL,
  `TANGGAL` datetime NULL,
  `JENIS` decimal(1, 0) NULL,
  PRIMARY KEY (`NOMOR`)
);

CREATE TABLE `TANGGAL_DAFTAR_ULANG_MABA`  (
  `NOMOR` decimal(10, 0) NOT NULL,
  `TANGGAL_AWAL` datetime NOT NULL,
  `TANGGAL_AKHIR` datetime NOT NULL,
  `TAHUN` decimal(4, 0) NOT NULL,
  `SEMESTER` decimal(1, 0) NOT NULL,
  `EXTEND` decimal(1, 0) NOT NULL,
  `MAHASISWA_JALUR_PENERIMAAN` decimal(10, 0) NOT NULL,
  `FULL_ONLINE` decimal(10, 0) NULL,
  PRIMARY KEY (`NOMOR`)
);

CREATE TABLE `TANGGAL_ENTRI_NILAI`  (
  `NOMOR` decimal(10, 0) NOT NULL,
  `TAHUN` decimal(4, 0) NULL,
  `SEMESTER` decimal(1, 0) NULL,
  `TANGGAL_AWAL` datetime NULL,
  `TANGGAL_AKHIR` datetime NULL,
  `JENIS` decimal(1, 0) NULL,
  PRIMARY KEY (`NOMOR`)
);

CREATE TABLE `TANGGAL_KERJA1`  (
  `TANGGAL` datetime NULL,
  `LIBUR` decimal(1, 0) NULL
);

CREATE TABLE `TANGGAL_PENTING_DAFTAR_ULANG`  (
  `NOMOR` decimal(10, 0) NOT NULL,
  `TANGGAL_AWAL` datetime NOT NULL,
  `TANGGAL_AKHIR` datetime NOT NULL,
  `PROGRAM` decimal(10, 0) NULL,
  `TAHUN` decimal(4, 0) NOT NULL,
  `SEMESTER` decimal(1, 0) NOT NULL,
  `EXTEND` decimal(1, 0) NOT NULL,
  `JURUSAN` decimal(10, 0) NULL,
  `ANGKATAN` decimal(4, 0) NULL,
  `SUBKAMPUS` decimal(10, 0) NULL
);

CREATE TABLE `TRANSKRIP`  (
  `NOMOR` varchar(25) NULL,
  `NRP` varchar(20) NULL,
  `NAMA` varchar(100) NULL,
  `JURUSAN` varchar(50) NULL,
  `KODE` varchar(20) NULL,
  `MATAKULIAH` varchar(100) NULL,
  `JAM` decimal(5, 0) NULL,
  `NH` varchar(10) NULL,
  `MKGRUP` varchar(50) NULL,
  `NO` decimal(4, 0) NULL,
  `TGL_MASUK` datetime NULL,
  `TGL_LULUS` datetime NULL,
  `LAMA_STUDI` decimal(2, 0) NULL,
  `IPK` varchar(10) NULL,
  `PL` varchar(30) NULL,
  `JUDUL_TA` text NULL,
  `TTD` datetime NULL,
  `SKS` decimal(5, 0) NULL,
  `IP` varchar(50) NULL
);

CREATE TABLE `UMMB`  (
  `NOMOR` decimal(8, 0) NOT NULL,
  `TANGGAL_DAFTAR` datetime NULL,
  `TANGGAL_AKHIR` datetime NULL,
  `TEMPAT_DAFTAR` varchar(50) NULL,
  `TANGGAL_TEST` datetime NULL,
  `TEMPAT_TEST` varchar(50) NULL,
  `BIAYA` decimal(8, 0) NULL,
  `PENDAFTAR` decimal(8, 0) NULL,
  `TEST` decimal(8, 0) NULL,
  `DITERIMA` decimal(8, 0) NULL,
  `TEMPAT_DAFTAR_ULANG` varchar(50) NULL,
  `TELEPHONE` varchar(20) NULL,
  `KETERANGAN` varchar(200) NULL,
  `TAHUN` decimal(4, 0) NULL,
  PRIMARY KEY (`NOMOR`)
);

CREATE TABLE `UNIT`  (
  `NOMOR` decimal(4, 0) NOT NULL,
  `UNIT` varchar(100) NOT NULL,
  `KEPALA` decimal(10, 0) NULL,
  PRIMARY KEY (`NOMOR`)
);

CREATE TABLE `UPM_IKM_RATA`  (
  `NOMOR` decimal(10, 0) NOT NULL,
  `UPM_KRITERIA_IKM` decimal(5, 0) NULL,
  `NILAI` double NULL,
  `TAHUN` decimal(4, 0) NULL,
  `JUMLAH_DATA` decimal(5, 0) NULL,
  PRIMARY KEY (`NOMOR`)
);

CREATE TABLE `UPM_JAWABAN_IKM`  (
  `NOMOR` decimal(10, 0) NOT NULL,
  `UPM_KRITERIA_IKM` decimal(5, 0) NULL,
  `JAWABAN` decimal(2, 0) NULL,
  `PEGAWAI` decimal(8, 0) NULL,
  `TAHUN` decimal(4, 0) NULL,
  `KELAS` decimal(8, 0) NULL,
  `NRP` varchar(10) NULL,
  `SEMESTER` decimal(1, 0) NULL
);

CREATE TABLE `UPM_JAWABAN_PBM_A`  (
  `NOMOR` decimal(30, 0) NOT NULL,
  `IDENTITAS` decimal(30, 0) NULL,
  `KRITERIA` decimal(30, 0) NULL,
  `JAWABAN` decimal(5, 0) NULL,
  PRIMARY KEY (`NOMOR`)
);

CREATE TABLE `UPM_JAWABAN_PBM_B`  (
  `NOMOR` decimal(30, 0) NOT NULL,
  `IDENTITAS` decimal(30, 0) NULL,
  `KRITERIA` decimal(30, 0) NULL,
  `JAWABAN` decimal(5, 0) NULL,
  PRIMARY KEY (`NOMOR`)
);

CREATE TABLE `UPM_JAWABAN_PRAKTIKUM_A`  (
  `NOMOR` decimal(30, 0) NOT NULL,
  `IDENTITAS` decimal(30, 0) NOT NULL,
  `KRITERIA` decimal(30, 0) NOT NULL,
  `JAWABAN` decimal(5, 0) NOT NULL
);

CREATE TABLE `UPM_JAWABAN_PRAKTIKUM_B`  (
  `NOMOR` decimal(30, 0) NOT NULL,
  `IDENTITAS` decimal(30, 0) NOT NULL,
  `KRITERIA` decimal(30, 0) NOT NULL,
  `JAWABAN` decimal(5, 0) NOT NULL
);

CREATE TABLE `UPM_JAWABAN_PRAKTIKUM_C`  (
  `NOMOR` decimal(30, 0) NULL,
  `IDENTITAS` decimal(30, 0) NULL,
  `KRITERIA` decimal(30, 0) NULL,
  `JAWABAN` decimal(5, 0) NULL
);

CREATE TABLE `UPM_JAWABAN_PRAKTIKUM_D`  (
  `NOMOR` decimal(30, 0) NOT NULL,
  `IDENTITAS` decimal(30, 0) NOT NULL,
  `KRITERIA` decimal(30, 0) NOT NULL,
  `JAWABAN` decimal(5, 0) NOT NULL
);

CREATE TABLE `UPM_JAWABAN_PRAKTIKUM_E`  (
  `NOMOR` decimal(30, 0) NOT NULL,
  `IDENTITAS` decimal(30, 0) NOT NULL,
  `KRITERIA` decimal(30, 0) NOT NULL,
  `JAWABAN` decimal(5, 0) NOT NULL
);

CREATE TABLE `UPM_JENIS_KRITERIA`  (
  `NOMOR` decimal(5, 0) NULL,
  `NAMA_JENIS_KRITERIA` varchar(75) NULL
);

CREATE TABLE `UPM_JENIS_SKOR`  (
  `NOMOR` decimal(8, 0) NULL,
  `UPM_JENIS_KRITERIA` decimal(5, 0) NULL,
  `SKOR_PENILAIAN` decimal(5, 0) NULL
);

CREATE TABLE `UPM_KRITERIA_IKM`  (
  `NOMOR` decimal(5, 0) NOT NULL,
  `UPM_JENIS_KRITERIA` decimal(5, 0) NULL,
  `UPM_LAYANAN` decimal(5, 0) NULL,
  PRIMARY KEY (`NOMOR`)
);

CREATE TABLE `UPM_LAYANAN`  (
  `NOMOR` decimal(5, 0) NOT NULL,
  `NAMA_LAYANAN` varchar(75) NOT NULL,
  PRIMARY KEY (`NOMOR`)
);

CREATE TABLE `UPM_PBM_A`  (
  `NOMOR` decimal(30, 0) NOT NULL,
  `KRITERIA` text NULL,
  PRIMARY KEY (`NOMOR`)
);

CREATE TABLE `UPM_PBM_B`  (
  `NOMOR` decimal(5, 0) NOT NULL,
  `KRITERIA` text NULL,
  PRIMARY KEY (`NOMOR`)
);

CREATE TABLE `UPM_PBM_IDENTITAS`  (
  `NOMOR` decimal(30, 0) NOT NULL,
  `TAHUN` decimal(30, 0) NOT NULL,
  `JURUSAN` decimal(30, 0) NOT NULL,
  `KELAS` decimal(30, 0) NOT NULL,
  `MATA_KULIAH` decimal(30, 0) NOT NULL,
  `DOSEN` decimal(30, 0) NOT NULL,
  `PARAREL` varchar(30) NOT NULL,
  `SEMESTER` decimal(30, 0) NOT NULL,
  `PROGRAM` decimal(30, 0) NOT NULL,
  `MK` varchar(30) NOT NULL,
  `PENGISI` varchar(30) NULL,
  PRIMARY KEY (`NOMOR`)
);

CREATE TABLE `UPM_PRAKTIKUM_A`  (
  `NOMOR` decimal(30, 0) NOT NULL,
  `KRITERIA` text NOT NULL
);

CREATE TABLE `UPM_PRAKTIKUM_B`  (
  `NOMOR` decimal(30, 0) NOT NULL,
  `KRITERIA` text NOT NULL
);

CREATE TABLE `UPM_PRAKTIKUM_C`  (
  `NOMOR` decimal(30, 0) NOT NULL,
  `KRITERIA` text NOT NULL
);

CREATE TABLE `UPM_PRAKTIKUM_D`  (
  `NOMOR` decimal(30, 0) NOT NULL,
  `KRITERIA` text NOT NULL
);

CREATE TABLE `UPM_PRAKTIKUM_E`  (
  `NOMOR` decimal(30, 0) NOT NULL,
  `KRITERIA` text NOT NULL
);

CREATE TABLE `UPM_PRAKTIKUM_IDENTITAS`  (
  `NOMOR` decimal(30, 0) NOT NULL,
  `TAHUN` decimal(30, 0) NULL,
  `JURUSAN` decimal(30, 0) NULL,
  `KELAS` decimal(30, 0) NULL,
  `MATA_KULIAH` decimal(30, 0) NULL,
  `DOSEN` decimal(30, 0) NULL,
  `PARAREL` varchar(30) NULL,
  `ASISTEN` decimal(30, 0) NULL,
  `SEMESTER` decimal(30, 0) NULL,
  `PROGRAM` decimal(30, 0) NULL,
  `MK` varchar(30) NULL,
  `PENGISI` decimal(30, 0) NULL,
  PRIMARY KEY (`NOMOR`)
);

CREATE TABLE `UPM_SKOR_PENILAIAN`  (
  `NOMOR` decimal(5, 0) NULL,
  `NAMA_SKOR_PENILAIAN` varchar(20) NULL,
  `BOBOT` varchar(2) NULL
);

CREATE TABLE `URAIANRAPAT`  (
  `NRP` varchar(15) NULL,
  `TAHUN` varchar(10) NULL,
  `PROGRAM` decimal(2, 0) NULL,
  `JURUSAN` decimal(2, 0) NULL,
  `KELAS` decimal(2, 0) NULL,
  `PARALEL` char(1) NULL,
  `URAIAN` text NULL,
  `MATAKULIAH` varchar(100) NULL,
  `NILAI_SBL` varchar(3) NULL,
  `NILAI` varchar(3) NULL,
  `SEMESTER` decimal(1, 0) NULL
);

CREATE TABLE `VALIDASI_KOREKSI`  (
  `NOMOR` decimal(10, 0) NOT NULL,
  `MATAKULIAH` decimal(10, 0) NULL,
  `KELAS` decimal(10, 0) NULL,
  `JURUSAN` decimal(10, 0) NULL,
  `PROGRAM` decimal(10, 0) NULL,
  `DOSEN` decimal(10, 0) NULL,
  `TAHUN` varchar(10) NULL,
  `SEMESTER` varchar(2) NULL,
  `KEGIATAN` decimal(2, 0) NULL,
  `PENERIMAAN` decimal(10, 0) NULL,
  `PAJAK` decimal(10, 0) NULL,
  `SEMESTER_TEMPUH` decimal(10, 0) NULL,
  `GOLONGAN` varchar(10) NULL,
  `JUMLAH_MAHASISWA` decimal(5, 0) NULL,
  `BAGI` decimal(2, 0) NULL,
  `DOSEN_KE` decimal(2, 0) NULL,
  INDEX `INDX_VK`(`NOMOR` ASC, `KEGIATAN` ASC, `JURUSAN` ASC, `PROGRAM` ASC, `KELAS` ASC, `MATAKULIAH` ASC, `SEMESTER` ASC, `TAHUN` ASC),
  INDEX `VALIDASI_KOREKSI`(`DOSEN` ASC, `MATAKULIAH` ASC, `KELAS` ASC, `JURUSAN` ASC, `PROGRAM` ASC, `KEGIATAN` ASC, `SEMESTER` ASC, `TAHUN` ASC)
);

CREATE TABLE `VALIDASI_KOREKSI_TEMP`  (
  `NOMOR` decimal(10, 0) NOT NULL,
  `MATAKULIAH` decimal(10, 0) NULL,
  `KELAS` decimal(10, 0) NULL,
  `JURUSAN` decimal(10, 0) NULL,
  `PROGRAM` decimal(10, 0) NULL,
  `DOSEN` decimal(10, 0) NULL,
  `TAHUN` varchar(10) NULL,
  `SEMESTER` varchar(2) NULL,
  `KEGIATAN` decimal(2, 0) NULL,
  `PENERIMAAN` decimal(10, 0) NULL,
  `PAJAK` decimal(10, 0) NULL,
  `SEMESTER_TEMPUH` decimal(10, 0) NULL,
  `GOLONGAN` varchar(10) NULL,
  `JUMLAH_MAHASISWA` decimal(5, 0) NULL,
  `BAGI` decimal(2, 0) NULL,
  `DOSEN_KE` decimal(2, 0) NULL,
  INDEX `VALIDASI_KOREKSI_TEMP`(`DOSEN` ASC, `MATAKULIAH` ASC, `KELAS` ASC, `JURUSAN` ASC, `PROGRAM` ASC, `SEMESTER` ASC, `TAHUN` ASC, `KEGIATAN` ASC)
);

CREATE TABLE `VALIDASI_PEGAWAI`  (
  `NOMOR` decimal(10, 0) NOT NULL,
  `BULAN` decimal(3, 0) NULL,
  `TAHUN` decimal(4, 0) NULL,
  `STATUS` decimal(2, 0) NULL,
  INDEX `INDX_VP`(`NOMOR` ASC, `BULAN` ASC, `TAHUN` ASC)
);

CREATE TABLE `VALIDASI_SOAL`  (
  `NOMOR` decimal(10, 0) NOT NULL,
  `MATAKULIAH` decimal(10, 0) NULL,
  `KELAS` decimal(10, 0) NULL,
  `JURUSAN` decimal(10, 0) NULL,
  `PROGRAM` decimal(10, 0) NULL,
  `DOSEN` decimal(10, 0) NULL,
  `TAHUN` varchar(10) NULL,
  `SEMESTER` varchar(2) NULL,
  `KEGIATAN` decimal(2, 0) NULL,
  `PENERIMAAN` decimal(10, 0) NULL,
  `PAJAK` decimal(10, 0) NULL,
  `SEMESTER_TEMPUH` decimal(10, 0) NULL,
  `GOLONGAN` varchar(10) NULL,
  `BAGI` decimal(2, 0) NULL,
  `DOSEN_KE` decimal(2, 0) NULL,
  INDEX `INDX_VS`(`NOMOR` ASC, `KEGIATAN` ASC, `JURUSAN` ASC, `PROGRAM` ASC, `KELAS` ASC, `MATAKULIAH` ASC, `SEMESTER` ASC, `TAHUN` ASC),
  INDEX `VALIDASI_SOAL`(`DOSEN` ASC, `MATAKULIAH` ASC, `KELAS` ASC, `JURUSAN` ASC, `PROGRAM` ASC, `KEGIATAN` ASC, `SEMESTER` ASC, `TAHUN` ASC),
  INDEX `VALIDASI_SOAL_TEMP`(`DOSEN` ASC, `MATAKULIAH` ASC, `KELAS` ASC, `JURUSAN` ASC, `PROGRAM` ASC, `SEMESTER` ASC, `TAHUN` ASC, `KEGIATAN` ASC)
);

CREATE TABLE `VALIDASI_SOAL_TEMP`  (
  `NOMOR` decimal(10, 0) NOT NULL,
  `MATAKULIAH` decimal(10, 0) NULL,
  `KELAS` decimal(10, 0) NULL,
  `JURUSAN` decimal(10, 0) NULL,
  `PROGRAM` decimal(10, 0) NULL,
  `DOSEN` decimal(10, 0) NULL,
  `TAHUN` varchar(10) NULL,
  `SEMESTER` varchar(2) NULL,
  `KEGIATAN` decimal(2, 0) NULL,
  `PENERIMAAN` decimal(10, 0) NULL,
  `PAJAK` decimal(10, 0) NULL,
  `SEMESTER_TEMPUH` decimal(10, 0) NULL,
  `GOLONGAN` varchar(10) NULL,
  `BAGI` decimal(2, 0) NULL,
  `DOSEN_KE` decimal(2, 0) NULL
);

CREATE TABLE `WARNA`  (
  `KODE` decimal(2, 0) NOT NULL,
  `WARNA` varchar(20) NULL,
  PRIMARY KEY (`KODE`)
);

CREATE TABLE `XBAYAR`  (
  `ID_TELLER` varchar(15) NULL,
  `TANGGAL` datetime NULL,
  `NO` decimal(12, 0) NULL,
  `SEMESTER` decimal(2, 0) NULL,
  `XSTATUS` char(1) NULL,
  `T_AJARAN` varchar(5) NULL,
  `KURANG` decimal(12, 0) NULL,
  `NRP` varchar(15) NULL,
  `NO_TRANS` decimal(12, 0) NULL,
  `SPP` decimal(12, 0) NULL,
  `IKOMA` decimal(12, 0) NULL,
  `KEMAHASISWAAN` decimal(12, 0) NULL,
  `BAYAR_DI` decimal(1, 0) NULL,
  `PENDAFTAR` decimal(12, 0) NULL,
  `SPI` decimal(12, 0) NULL,
  `TAHUN_BAYAR` decimal(4, 0) NULL,
  `SEMESTER_BAYAR` decimal(1, 0) NULL,
  `KETERANGAN` varchar(100) NULL,
  `PERPANJANG_KELAS` decimal(1, 0) NULL,
  `KETERANGAN2` varchar(100) NULL,
  `SCAN_SPP` longtext NULL,
  `TANGGAL_TRANSFER` datetime NULL,
  `SIMPAN_SEMESTER` decimal(1, 0) NULL,
  `KIRIM_EMAIL` decimal(1, 0) NULL,
  `KIRIM_EMAIL_SALAH` decimal(1, 0) NULL,
  `KIRIM_SMS` decimal(1, 0) NULL,
  `TANGGAL_UPLOAD_SCAN` datetime NULL,
  `PESAN` varchar(200) NULL,
  `TANGGAL_SIMPAN` datetime NULL
);

CREATE TABLE `XBAYAR_PENDAFTAR`  (
  `NOMOR` decimal(12, 0) NULL,
  `PENDAFTAR` decimal(12, 0) NULL,
  `SPI` decimal(12, 0) NULL,
  `SPP` decimal(12, 0) NULL,
  `IKOMA` decimal(12, 0) NULL,
  `KEMAHASISWAAN` decimal(12, 0) NULL,
  `BAYAR_DI` decimal(1, 0) NULL,
  `STATUS` decimal(1, 0) NULL,
  `TGLSTATUS` datetime NULL,
  `ID_TELLER` varchar(15) NULL,
  `NO_TRANS` decimal(12, 0) NULL,
  `SEMESTER` decimal(2, 0) NULL,
  `T_AJARAN` varchar(5) NULL
);

CREATE TABLE `XCICILAN`  (
  `NOMOR` decimal(10, 0) NOT NULL,
  `MAHASISWA` decimal(10, 0) NULL,
  `TOTAL_PEMBAYARAN` decimal(10, 0) NOT NULL,
  `TANGGAL_ENTRI` datetime NOT NULL,
  `TOTAL_CICILAN` decimal(2, 0) NOT NULL,
  `PEGAWAI` decimal(10, 0) NOT NULL,
  `SELANG_WAKTU` decimal(2, 0) NOT NULL,
  `TAHUN` decimal(4, 0) NOT NULL,
  `SEMESTER` decimal(1, 0) NOT NULL,
  `HAPUS` decimal(1, 0) NOT NULL,
  `XCICILAN_JENIS` decimal(10, 0) NOT NULL,
  `PENDAFTAR` decimal(10, 0) NULL
);

CREATE TABLE `XCICILAN_DETIL`  (
  `NOMOR` decimal(10, 0) NOT NULL,
  `XCICILAN` decimal(10, 0) NOT NULL,
  `TANGGAL_TAGIHAN_AWAL` datetime NOT NULL,
  `NOMINAL_TAGIHAN` decimal(10, 0) NOT NULL,
  `TANGGAL_BAYAR` datetime NULL,
  `NOMINAL_BAYAR` decimal(10, 0) NULL,
  `TEMPAT_BAYAR` decimal(10, 0) NULL,
  `PEGAWAI_BAYAR` decimal(10, 0) NULL,
  `TANGGAL_TAGIHAN_AKHIR` datetime NOT NULL,
  `STATUS_BAYAR` decimal(1, 0) NOT NULL,
  `CICILAN_KE` decimal(2, 0) NOT NULL,
  `TAGIH_H2H` decimal(1, 0) NOT NULL
);

CREATE TABLE `XCICILAN_JENIS`  (
  `NOMOR` decimal(10, 0) NOT NULL,
  `KETERANGAN` varchar(50) NOT NULL,
  `KODE_BILL_DETAILS_DATA` varchar(2) NOT NULL,
  `BILL_NAME` varchar(225) NOT NULL,
  `BILL_SHORT_NAME` varchar(225) NOT NULL
);

CREATE TABLE `XCICILAN_LAMPAU`  (
  `NOMOR` decimal(10, 0) NOT NULL,
  `MAHASISWA` decimal(10, 0) NULL,
  `JUMLAH` decimal(10, 0) NULL,
  `STATUS` decimal(1, 0) NULL
);

CREATE TABLE `XCICILAN_TEMPAT`  (
  `NOMOR` decimal(10, 0) NOT NULL,
  `KETERANGAN` varchar(50) NOT NULL
);

ALTER TABLE `ABSENSI_SHIFT` ADD CONSTRAINT `SYS_C0028161` FOREIGN KEY (`PEGAWAI`) REFERENCES `PEGAWAI` (`NOMOR`);
ALTER TABLE `CUTI_DO` ADD CONSTRAINT `K_CUTIDO_1` FOREIGN KEY (`KATAGORI`) REFERENCES `STATUS` (`KODE`);
ALTER TABLE `CUTI_DO` ADD CONSTRAINT `NRP_CUTIDO_1` FOREIGN KEY (`NRP`) REFERENCES `MAHASISWA` (`NRP`);
ALTER TABLE `CUTI_DO` ADD CONSTRAINT `PEGAWAI_CUTIDO_1` FOREIGN KEY (`PEGAWAI`) REFERENCES `PEGAWAI` (`NOMOR`);
ALTER TABLE `KULIAH` ADD CONSTRAINT `KULIAH_FK1` FOREIGN KEY (`MATAKULIAH`) REFERENCES `MATAKULIAH` (`NOMOR`);
ALTER TABLE `NILAI` ADD CONSTRAINT `NILAI_FK1` FOREIGN KEY (`KULIAH`) REFERENCES `KULIAH` (`NOMOR`);
ALTER TABLE `SETTING_SATPAM_DETAIL` ADD CONSTRAINT `SYS_C0011823` FOREIGN KEY (`PEGAWAI`) REFERENCES `PEGAWAI` (`NOMOR`);