<?php

namespace Database\Seeders;

use App\Models\Admin; // Pastikan model Admin diimpor dengan benar
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run()
    {
        Admin::create([
            'name' => 'petugas',
            'email' => 'petugas@petugas.com',
            'password' => Hash::make('123'), // Password dienkripsi
        ]);
    }
}
