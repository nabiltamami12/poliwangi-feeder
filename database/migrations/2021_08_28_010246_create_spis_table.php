<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('spi', function (Blueprint $table) {
            $table->id();
            $table->integer('tahun');
            $table->integer('id_mahasiwa');
            $table->integer('tarif');
            $table->integer('pembayaran');
            $table->date('tanggal_pembyaran');
            $table->integer('piutang');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('spis');
    }
}
