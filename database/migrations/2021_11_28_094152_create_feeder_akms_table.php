<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeederAkmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('feeder_akms', function (Blueprint $table) {
            $table->id();
             $table->string('id_registrasi_mahasiswa')->nullable();
             $table->string('semester')->nullable();
            $table->string('nim')->nullable();
            $table->string('nama')->nullable();
            $table->float('ips')->nullable();
            $table->float('ipk')->nullable();
            $table->integer('sks_smt')->nullable();
            $table->integer('sks_total')->nullable();
            $table->string('kode_jurusan')->nullable();
            $table->string('status_kuliah')->nullable();
            $table->integer('status_error')->nullable();
            $table->integer('valid')->nullable();
            $table->string('keterangan')->nullable();
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
        Schema::dropIfExists('feeder_akms');
    }
}
