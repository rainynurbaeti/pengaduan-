<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengaduan;

class LaporkanController extends Controller
{
        public function store(Request $request)
    {
        // Validasi data yang diterima
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048', // Maks 2 MB
        ]);

        // Jika ada foto, simpan ke storage
        if ($request->hasFile('foto')) {
            $path = $request->file('foto')->store('public/fotos');
            $validated['foto'] = str_replace('public/', 'storage/', $path);
        }

        // Simpan pengaduan ke database
        Pengaduan::create($validated);

        return redirect()->route('laporkan')->with('success', 'Laporan berhasil dikirim.');
    }
}
namespace App\Http\Controllers;

use App\Models\Laporan;
use Illuminate\Http\Request;

class LaporanController extends Controller
{



    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $filePath = null;
        if ($request->hasFile('foto')) {
            $filePath = $request->file('foto')->store('laporan', 'public');
        }

        Laporan::create([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'foto' => $filePath,
        ]);

        return redirect()->back()->with('success', 'Laporan berhasil dikirim');
    }

    public function index()
    {
        $laporans = Laporan::all();
        return view('admin.laporan-index', compact('laporans'));
    }

    public function updateStatus(Request $request, $id)
    {
        $laporan = Laporan::findOrFail($id);
        $laporan->status = $request->status;
        $laporan->save();

        return redirect()->back()->with('success', 'Status laporan berhasil diperbarui');
    }
}
