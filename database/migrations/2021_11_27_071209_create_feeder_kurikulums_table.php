<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeederKurikulumsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('feeder_kurikulums', function (Blueprint $table) {
            $table->id();
            $table->integer('kode_kurikulum')->nullable();
            $table->string('nama_kurikulum')->nullable();
            $table->string('kode_jurusan')->nullable();
            $table->integer('kode_thn_ajaran')->nullable();
            $table->integer('jum_sks')->nullable();
            $table->integer('jum_sks_wajib')->nullable();
            $table->integer('jum_sks_pilihan')->nullable();
            $table->integer('status_kurikulum')->nullable();
            $table->string('id_kurikulum')->nullable();
            $table->string('id_prodi')->nullable();
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
        Schema::dropIfExists('feeder_kurikulums');
    }
}
