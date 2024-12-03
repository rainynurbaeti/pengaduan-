<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
{
    Schema::table('pengaduans', function (Blueprint $table) {
        $table->text('deskripsi')->after('email'); // Sesuaikan posisi kolom jika perlu
    });
}

public function down()
{
    Schema::table('pengaduans', function (Blueprint $table) {
        $table->dropColumn('deskripsi');
    });
}

};
