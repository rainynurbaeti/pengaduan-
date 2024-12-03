<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PengaduanController;
use App\Http\Controllers\DashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::get('/dashboard', [DashboardController::class, 'index']);



Route::get('/', function () {
    return view('welcome');
});



// Tambahkan rute ini jika belum ada
Route::get('/form_pengaduan', function () {
    return view('form_pengaduan');
})->name('form_pengaduan');

Route::get('/masyarakat/pengaduan', [PengaduanController::class, 'index'])->name('masyarakat.pengaduan.index');
Route::get('/admin/laporan', [PengaduanController::class, 'showLaporanAdmin'])->name('pengaduan.showLaporanAdmin');
Route::get('/admin/isi-laporan', [PengaduanController::class, 'showLaporanAdmin'])->name('pengaduan.showLaporanAdmin');
Route::get('/admin/pengaduan/{id}/edit-status', [PengaduanController::class, 'editStatus'])->name('pengaduan.editStatus');
Route::put('/admin/pengaduan/{id}/update-status', [PengaduanController::class, 'updateStatus'])->name('pengaduan.updateStatus');
Route::delete('/admin/isi-laporan/{id}', [PengaduanController::class, 'destroy'])->name('pengaduan.destroy');
Route::get('/isi-pengaduan', [PengaduanController::class, 'index'])->name('pengaduan.index');
Route::post('/laporkan', [PengaduanController::class, 'store'])->name('laporkan.store');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');





// Route untuk halaman Laporkan









Route::get('/form_pengaduan', function() {
    return view('masyarakat.laporan-form'); // Halaman form pengaduan
})->name('form_pengaduan');





// Dashboard hanya dapat diakses jika sudah login
// Route::get('/dashboard', function () {
//     return view('dashboard'); // Buat view dashboard jika belum ada
// })->middleware('auth');

