<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Pengaduan; // Pastikan model ini ada dan terhubung dengan database

class DashboardController extends Controller
{
    public function index()
    {
        $total = Pengaduan::all(); // Mengambil semua data pengaduan
        $selesai = DB::table('pengaduans')->where('status', 'selesai')->count(); // Hitung data status selesai
        $belumDiproses = DB::table('pengaduans')->where('status', 'belum diproses')->count(); // Hitung data belum diproses
        $diproses = DB::table('pengaduans')->where('status', 'sedang diproses')->count(); // Hitung data sedang diproses

        return view('dashboard', compact('total', 'selesai', 'belumDiproses', 'diproses'));
    }
}
