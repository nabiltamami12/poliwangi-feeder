<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDosensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dosens', function (Blueprint $table) {
            $table->id();
             $table->string('nip')->nullable();
            $table->string('nidn')->nullable();
            $table->string('nama_dosen')->nullable();
            $table->string('kelamin')->nullable();
            $table->string('agama')->nullable();
            $table->string('tmpt_lahir')->nullable();
            $table->date('tgl_lahir')->nullable();
            $table->integer('id_status_dosen')->nullable();
            $table->string('email')->nullable();
            $table->string('telp')->nullable();
            $table->string('alamat')->nullable();
            $table->string('foto_dosen')->nullable();
            $table->string('id_dosen_feeder')->nullable();

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
        Schema::dropIfExists('dosens');
    }
}
