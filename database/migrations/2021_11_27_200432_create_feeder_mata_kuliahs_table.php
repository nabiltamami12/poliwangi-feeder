<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeederMataKuliahsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('feeder_mata_kuliahs', function (Blueprint $table) {
            $table->id();
                        $table->string('nama_mk')->nullable();
            $table->string('jenis_mata_kuliah')->nullable();
            $table->integer('bobot_mk')->nullable();
            $table->integer('bobot_tatap_muka')->nullable();
            $table->integer('bobot_pratikum')->nullable();
            $table->integer('bobot_praktek_lapangan')->nullable();
            $table->integer('bobot_simulasi')->nullable();
            $table->string('id_mk')->nullable();
            $table->string('kode_mk')->nullable();
            $table->string('prodi_mk')->nullable();
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
        Schema::dropIfExists('feeder_mata_kuliahs');
    }
}
