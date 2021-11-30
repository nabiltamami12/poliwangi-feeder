<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeederMkKurikulumsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('feeder_mk_kurikulums', function (Blueprint $table) {
            $table->id();
            $table->integer('kode_mk_kurikulum')->nullable();
            $table->string('kode_mk')->nullable();
            $table->string('nama_mk')->nullable();
            $table->string('kode_kurikulum')->nullable();
            $table->string('nama_kurikulum')->nullable();
            $table->string('bobot_mk')->nullable();
            $table->string('jenis_mata_kuliah')->nullable();
            $table->string('nama_program_studi')->nullable();
            $table->integer('semester')->nullable();
            $table->integer('status_mk')->nullable();
            $table->string('id_prodi_feeder')->nullable();
            $table->string('id_matkul')->nullable();
            $table->integer('status_upload_mk_kurikulum')->nullable();
            $table->string('keterangan_upload_mk_kurikulum')->nullable();
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
        Schema::dropIfExists('feeder_mk_kurikulums');
    }
}
