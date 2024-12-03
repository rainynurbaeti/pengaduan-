<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::table('pengaduans', function (Blueprint $table) {
        // Misalnya hanya mengubah kolom 'foto' yang sudah ada
        $table->string('foto')->nullable()->change();
    });
}

public function down()
{
    Schema::table('pengaduans', function (Blueprint $table) {
        // Membatalkan perubahan jika dibutuhkan
        $table->dropColumn('foto');
    });
}


};
