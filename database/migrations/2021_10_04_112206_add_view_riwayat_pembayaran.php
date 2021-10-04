<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class AddViewRiwayatPembayaran extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("
            CREATE VIEW v_riwayat_pembayaran AS
            SELECT s.id, s.id_mahasiswa, m.nama, m.nrp, s.pembayaran as nominal, s.keterangan, 'SPI' as kategori, null as semester, s.created_at, s.updated_at, 'spi' as tabel FROM spi s
            LEFT JOIN mahasiswa m on s.id_mahasiswa = m.nomor
            UNION
            SELECT kp.id, kp.id_mahasiswa, mm.nama, mm.nrp, kp.nominal, kp.keterangan, 'UKT' as kategori, kp.semester, kp.created_at, kp.updated_at, 'keuangan_pembayaran' as tabel FROM keuangan_pembayaran kp
            LEFT JOIN mahasiswa mm on kp.id_mahasiswa = mm.nomor
            WHERE kp.status = '1'
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('DROP VIEW v_riwayat_pembayaran');
    }
}
