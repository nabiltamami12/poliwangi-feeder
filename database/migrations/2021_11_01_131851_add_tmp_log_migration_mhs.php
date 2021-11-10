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
            $table->string('nama', 100)->nullable()->default(null);
            $table->smallInteger('kelas')->nullable()->default(null);
            $table->smallInteger('kelas_lama')->nullable()->default(null);
            $table->integer('program_studi')->nullable()->default(null);
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->nullable()->default(null)->useCurrentOnUpdate();
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
