<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTmpLogMigrationMhs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tmp_backup_migration_mahasiswa', function (Blueprint $table) {
            $table->increments('nomor');
            $table->string('nrp', 20);
            $table->string('nama', 100);
            $table->smallInteger('kelas');
            $table->smallInteger('kelas_lama');
            $table->integer('program_studi');
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
        Schema::drop('tmp_backup_migration_mahasiswa');
    }
}
