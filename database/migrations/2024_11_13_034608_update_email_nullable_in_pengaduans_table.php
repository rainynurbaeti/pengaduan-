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
        // Hapus baris ini jika sudah ada kolom `deskripsi`
        // $table->text('deskripsi')->after('email');

        $table->string('email')->nullable()->change();
    });
}

public function down()
{
    Schema::table('pengaduans', function (Blueprint $table) {
        $table->string('email')->nullable(false)->change();
    });
}

};
