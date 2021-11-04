<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddLogMahasiswaStatus extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('log_mahasiswa_status', function (Blueprint $table) {
            $table->id();
            $table->integer('mahasiswa')->nullable()->default(null); // 8
            $table->smallInteger('tahun')->nullable()->default(null); // 4
            $table->tinyInteger('semester')->nullable()->default(null); // 2
            $table->string('status', 2)->nullable()->default(null)->comment('A=Aktif,B=Mahasiswa Baru,C=Cuti,D=DO,H=Punya SPTH,K=Mengundurkan Diri,L=Lulus,M=Meninggal,P=Pendaftar,R=Tugas Akhir,T=Tanpa Keterangan');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->nullable()->default(null)->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('log_mahasiswa_status');
    }
}
