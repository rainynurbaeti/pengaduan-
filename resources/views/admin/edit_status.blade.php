<!-- resources/views/admin/edit_status.blade.php -->
@extends('admin.admin-layout')

@section('title', 'Edit Status Pengaduan')

@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <div class="container mt-4">
        <h1>Edit Status Pengaduan</h1>

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

        <!-- Form Edit Status Pengaduan -->
        <div class="card p-4 shadow-sm">
            <form method="POST" action="{{ route('pengaduan.updateStatus', $pengaduan->id) }}">
                @csrf
                @method('PUT')

                <!-- Pilih Status -->
                <div class="form-group mb-3">
                    <label for="status" class="form-label">Status Pengaduan</label>
                    <select name="status" id="status" class="form-control" required>
                        <option value="Belum diproses" {{ $pengaduan->status == 'Belum diproses' ? 'selected' : '' }}>Belum diproses</option>
                        <option value="Sedang diproses" {{ $pengaduan->status == 'Sedang diproses' ? 'selected' : '' }}>Sedang diproses</option>
                        <option value="Selesai" {{ $pengaduan->status == 'Selesai' ? 'selected' : '' }}>Selesai</option>
                    </select>
                </div>

                <!-- Tombol Submit -->
                <div class="d-flex justify-content-between">
                    <button type="submit" class="btn btn-primary btn-lg">Update Status</button>
                    <a href="{{ route('pengaduan.showLaporanAdmin') }}" class="btn btn-secondary btn-lg">Kembali</a>
                </div>
            </form>
        </div>
    </div>
@endsection
