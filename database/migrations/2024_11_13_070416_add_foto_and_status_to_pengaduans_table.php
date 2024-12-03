<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFotoAndStatusToPengaduansTable extends Migration
{
    public function up()
    {
        Schema::table('pengaduans', function (Blueprint $table) {
            // Menambahkan kolom foto hanya jika belum ada
            if (!Schema::hasColumn('pengaduans', 'foto')) {
                $table->string('foto')->nullable();
            }

            // Menambahkan kolom status hanya jika belum ada
            if (!Schema::hasColumn('pengaduans', 'status')) {
                $table->string('status')->default('Belum diproses');
            }
        });
    }

    public function down()
    {
        Schema::table('pengaduans', function (Blueprint $table) {
            $table->dropColumn(['foto', 'status']);
        });
    }
}
