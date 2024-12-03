<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengaduan extends Model
{
    use HasFactory;

    // Menentukan nama tabel jika tidak sesuai dengan nama model
    protected $table = 'pengaduans';

    // Menentukan kolom yang dapat diisi
    protected $fillable = [
        'nama',
        'deskripsi',
        'foto',
        'status' // Menambahkan status di sini
    ];
}
