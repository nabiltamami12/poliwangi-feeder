<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterKeuanganPembayaran1 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('keuangan_pembayaran', function (Blueprint $table) {
            $table->string('semester', '2')->after('bulan')->nullable()->default(null);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('keuangan_pembayaran', function (Blueprint $table) {
            $table->dropColumn('semester');
        });
    }
}
