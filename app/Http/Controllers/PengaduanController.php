<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use Illuminate\Http\Request;

class PengaduanController extends Controller
{
    // Menampilkan semua pengaduan (untuk masyarakat)
    public function index(Request $request)
    {
        $query = Pengaduan::query();

        // Logika pencarian
        if ($request->has('search') && $request->input('search')) {
            $search = $request->input('search');
            $query->where('nama', 'like', "%{$search}%")
                  ->orWhere('deskripsi', 'like', "%{$search}%");
        }

        // Ambil data pengaduan
        $pengaduans = $query->get();

        // Kirim data ke view masyarakat
        return view('masyarakat.isi_pengaduan', compact('pengaduans'));
    }

    // Menyimpan pengaduan baru
    public function store(Request $request)
    {
        // Validasi data yang masuk
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Membuat objek pengaduan baru
        $data = new Pengaduan;
        $data->nama = $request->input('nama');
        $data->deskripsi = $request->input('deskripsi');

        // Jika ada foto, simpan ke storage
        if ($request->hasFile('foto')) {
            $data->foto = $request->file('foto')->store('public/fotos');
        }

        // Simpan data ke database
        $data->save();

        // Redirect dengan pesan sukses
        return redirect()->back()->with('success', 'Pengaduan berhasil dikirim!');
    }

    // Menampilkan pengaduan untuk admin (laporan)
    public function laporan()
    {
        $pengaduans = Pengaduan::all();
        return view('admin.laporan', compact('pengaduans'));
    }

    // Menampilkan pengaduan untuk laporan admin
    public function showLaporanAdmin(Request $request)
    {
        $query = Pengaduan::query();  // Gunakan model Pengaduan, bukan laporan

        // Logika pencarian
        if ($request->has('search') && $request->input('search')) {
            $search = $request->input('search');
            $query->where('nama', 'like', "%{$search}%")
                  ->orWhere('deskripsi', 'like', "%{$search}%");
        }

        $pengaduans = $query->get();  // Ambil data pengaduan
        return view('admin.isi_laporan', compact('pengaduans'));  // Kirim data ke tampilan
    }

    // Menampilkan form edit status pengaduan
    public function editStatus($id)
    {
        $pengaduan = Pengaduan::findOrFail($id);
        return view('admin.edit_status', compact('pengaduan'));
    }

    // Memperbarui status pengaduan
    public function updateStatus(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'status' => 'required|string|max:255',
        ]);

        // Temukan pengaduan berdasarkan ID
        $pengaduan = Pengaduan::findOrFail($id);

        // Update status
        $pengaduan->status = $request->input('status');
        $pengaduan->save();

        // Redirect ke halaman laporan admin
        return redirect()->route('pengaduan.showLaporanAdmin')->with('success', 'Status berhasil diperbarui.');
    }

    // Menghapus pengaduan
    public function destroy($id)
    {
        $pengaduan = Pengaduan::findOrFail($id);
        $pengaduan->delete();

        // Redirect ke halaman laporan admin dengan pesan sukses
        return redirect()->route('pengaduan.showLaporanAdmin')->with('success', 'Pengaduan berhasil dihapus.');
    }
}
