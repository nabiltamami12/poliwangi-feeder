<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterBerkasAddstatus extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('berkas', function (Blueprint $table) {
            $table->enum('status',  [0, 1])->default(null)->nullable()->after('file');
        });
    }

    /**
     * Reverse the migrations.
     *$table->timestamp('created_at')->useCurrent();
     * @return void
     */
    public function down()
    {
        Schema::table('berkas', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }
}
