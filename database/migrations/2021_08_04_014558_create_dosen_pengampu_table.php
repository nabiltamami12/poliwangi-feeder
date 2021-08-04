<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDosenPengampuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {        
        Schema::dropIfExists('dosen_pengampu');
        Schema::create('dosen_pengampu', function (Blueprint $table) {
            $table->bigIncrements('nomor');
            $table->integer('dosen');
            $table->integer("matakuliah");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dosen_pengampu');
    }
}
