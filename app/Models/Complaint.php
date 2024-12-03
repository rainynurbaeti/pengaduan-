<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Complaint extends Model
{
    use HasFactory;

    protected $table = 'pengaduans'; // Nama tabel di database
    protected $fillable = ['status']; // Kolom yang dapat diisi
}



