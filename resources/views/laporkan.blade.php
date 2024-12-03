@extends('admin.admin-layout')

@section('title', 'Daftar Pengaduan')

@section('content')
    <h2>Daftar Pengaduan</h2>

    <table class="pengaduan-table">
        <thead>
            <tr>
                <th>Foto</th>
                <th>Nama</th>
                <th>Tanggal</th>
                <th>Deskripsi</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pengaduans as $pengaduan)
            <tr>
                <td><img src="{{ asset($pengaduan->foto) }}" alt="Foto Pengadu" class="foto"></td>
                <td>{{ $pengaduan->nama }}</td>
                <td>{{ $pengaduan->created_at->format('d-m-Y') }}</td>
                <td>{{ $pengaduan->deskripsi }}</td>
                <td>{{ $pengaduan->status }}</td>
                <td class="action-buttons">
                    <a href="{{ route('admin.pengaduan.edit', $pengaduan->id) }}" class="edit-status-btn"><i class="fas fa-edit"></i> Edit Status</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection
