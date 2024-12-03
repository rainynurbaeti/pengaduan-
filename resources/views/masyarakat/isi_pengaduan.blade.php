@extends('masyarakat.masyarakat-layout')

@section('title', 'Isi Pengaduan')

@section('content')
    <h1>Isi Pengaduan</h1>

    <!-- Link Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- Form Pencarian -->
    <form action="{{ route('masyarakat.pengaduan.index') }}" method="GET" class="mb-3 d-flex justify-content-end">
        <div class="input-group input-group-sm" style="max-width: 300px;">
            <input type="text" name="search" class="form-control" placeholder="Cari pengaduan..." value="{{ request('search') }}">
            <button type="submit" class="btn btn-primary">Cari</button>
        </div>
    </form>


    <!-- Tampilkan pesan sukses jika ada -->
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Tabel untuk menampilkan data pengaduan -->
    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th scope="col">Nama</th>
                <th scope="col">Deskripsi</th>
                <th scope="col">Foto</th>
                <th scope="col">Status</th>
            </tr>
        </thead>
        <tbody>
            @if ($pengaduans->isEmpty())
                <tr>
                    <td colspan="4" class="text-center">Tidak ada pengaduan yang sesuai dengan pencarian.</td>
                </tr>
            @else
                @foreach ($pengaduans as $pengaduan)
                    <tr>
                        <td>{{ $pengaduan->nama }}</td>
                        <td>{{ $pengaduan->deskripsi }}</td>
                        <td>
                            @if ($pengaduan->foto)
                                <img src="{{ asset('storage/' . str_replace('public/', '', $pengaduan->foto)) }}" alt="Foto Pengaduan" width="100" class="img-thumbnail">
                            @else
                                Tidak ada foto
                            @endif
                        </td>
                        <td>{{ $pengaduan->status ?? 'Belum diproses' }}</td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
@endsection
