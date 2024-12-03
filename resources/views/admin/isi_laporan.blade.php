@extends('admin.admin-layout')

@section('title', 'Isi Laporan')

@section('content')
    <h1>Isi Laporan</h1>

    <!-- Pesan sukses jika ada -->
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Form pencarian -->
    <form action="{{ route('pengaduan.showLaporanAdmin') }}" method="GET" class="mb-3 d-flex justify-content-end">
        <div class="input-group input-group-sm" style="max-width: 300px;">
            <input type="text" name="search" class="form-control" placeholder="Cari laporan..." value="{{ request('search') }}">
            <button type="submit" class="btn btn-primary">Cari</button>
        </div>
    </form>

    <!-- Tabel untuk menampilkan data laporan -->
    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th scope="col">Nama</th>
                <th scope="col">Deskripsi</th>
                <th scope="col">Foto</th>
                <th scope="col">Status</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pengaduans as $pengaduan)
                <tr>
                    <td>{{ $pengaduan->nama }}</td>
                    <td>{{ $pengaduan->deskripsi }}</td>
                    <td>
                        @if($pengaduan->foto)
                            <img src="{{ asset('storage/' . str_replace('public/', '', $pengaduan->foto)) }}" alt="Foto Laporan" width="100" class="img-thumbnail">
                        @else
                            Tidak ada foto
                        @endif
                    </td>
                    <td>{{ $pengaduan->status ?? 'Belum diproses' }}</td>
                    <td>
                        <!-- Ganti tombol Edit dengan ikon -->
                        <a href="{{ route('pengaduan.editStatus', $pengaduan->id) }}" class="btn btn-sm btn-warning">
                            <i class="fas fa-edit"></i> Edit
                        </a>

                        <!-- Ganti tombol Hapus dengan ikon -->
                        <form action="{{ route('pengaduan.destroy', $pengaduan->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus pengaduan ini?')">
                                <i class="fas fa-trash-alt"></i> Hapus
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
