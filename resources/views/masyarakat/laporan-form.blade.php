@extends('masyarakat.masyarakat-layout')

@section('title', 'Form Laporan')

@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-10"> <!-- Ubah lebar kolom ke col-md-10 untuk memperbesar card -->
            <div class="card shadow-lg">
                <div class="card-header bg-primary text-white text-center">
                    <h4 class="mb-0">Form Pengaduan</h4>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('laporkan.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="nama" class="form-label fw-bold">Nama</label>
                            <input type="text" name="nama" id="nama" class="form-control form-control-lg" placeholder="Masukkan nama Anda" required value="{{ old('nama') }}">
                            @error('nama')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="deskripsi" class="form-label fw-bold">Deskripsi Pengaduan</label>
                            <textarea name="deskripsi" id="deskripsi" rows="4" class="form-control form-control-lg" placeholder="Jelaskan masalah Anda" required>{{ old('deskripsi') }}</textarea>
                            @error('deskripsi')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="foto" class="form-label fw-bold">Foto Pengaduan (Opsional)</label>
                            <input type="file" name="foto" id="foto" class="form-control" accept="image/*">
                            @error('foto')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary btn-lg">Kirim Laporan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
