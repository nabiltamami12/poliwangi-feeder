<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSkalaNilaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('skala_nilais', function (Blueprint $table) {
            $table->id();
            $table->string('nilai_huruf')->nullable();
            $table->string('nilai_indeks')->nullable();
            $table->string('bobot_nilai_min')->nullable();
            $table->string('bobot_nilai_maks')->nullable();
            $table->date('tgl_mulai_efektif')->nullable();
            $table->date('tgl_akhir_efektif')->nullable();
            $table->string('kode_jurusan')->nullable();
            $table->string('id_bobot_nilai')->nullable();
            $table->string('nama_program_studi')->nullable();
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
        Schema::dropIfExists('skala_nilais');
    }
}
