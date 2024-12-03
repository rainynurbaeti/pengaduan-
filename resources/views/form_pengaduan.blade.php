@extends('masyarakat.masyarakat-layout')

@section('title', 'Form Laporan')

@section('content')
    <h1>Form Pengaduan</h1>

    <!-- Tampilkan pesan error jika ada -->
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

    <!-- Tampilkan pesan sukses jika ada -->
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="form-laporan">
        <form method="POST" action="{{ route('laporkan.store') }}" enctype="multipart/form-data">
            @csrf
            <div>
                <label for="nama">Nama</label>
                <input type="text" name="nama" id="nama" required>
            </div>
            <div>
                <label for="deskripsi">Deskripsi Pengaduan</label>
                <textarea name="deskripsi" id="deskripsi" rows="4" required></textarea>
            </div>

            <div>
                <label for="foto">Foto Pengaduan (Opsional)</label>
                <input type="file" name="foto" id="foto" accept="image/*">
            </div>

            <div>
                <button type="submit">Kirim Pengaduan</button>
            </div>
        </form>


