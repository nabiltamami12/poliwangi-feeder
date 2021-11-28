<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeederKelasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('feeder_kelas', function (Blueprint $table) {
            $table->id();
                      $table->string('id_semester')->nullable();
                      $table->string('nama_semester')->nullable();
            $table->string('kode_mk')->nullable();
            $table->string('nama_mk')->nullable();
            $table->string('nama_kelas')->nullable();
            $table->string('kode_jurusan')->nullable();
            $table->string('nama_jurusan')->nullable();
            $table->string('id_kelas_feeder')->nullable();
            $table->string('kode_ruang')->nullable();
            $table->string('jam')->nullable();
            $table->string('hari')->nullable();
            $table->string('id_master_kurikulum')->nullable();
            $table->integer('status_error')->nullable();
            $table->string('keterangan')->nullable();
            $table->string('bahasan_case')->nullable();
            $table->string('tgl_mulai_kelas')->nullable();
            $table->string('tgl_selesai_kelas')->nullable();
            $table->string('sks_mata_kuliah')->nullable();
            $table->string('keterangan_upload_kelas')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('feeder_kelas');
    }
}
