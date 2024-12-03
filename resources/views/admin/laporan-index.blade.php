@extends('admin.admin-layout')

@section('title', 'Daftar Laporan')

@section('content')
    <h1>Daftar Laporan</h1>
    <table border="1">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Deskripsi</th>
                <th>Foto</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($laporans as $laporan)
                <tr>
                    <td>{{ $laporan->nama }}</td>
                    <td>{{ $laporan->deskripsi }}</td>
                    <td>
                        @if($laporan->foto)
                            <img src="{{ asset('storage/' . $laporan->foto) }}" width="100">
                        @else
                            Tidak ada foto
                        @endif
                    </td>
                    <td>{{ $laporan->status }}</td>
                    <td>
                        <form action="{{ route('laporan.updateStatus', $laporan->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <select name="status">
                                <option value="diproses" {{ $laporan->status == 'diproses' ? 'selected' : '' }}>Diproses</option>
                                <option value="selesai" {{ $laporan->status == 'selesai' ? 'selected' : '' }}>Selesai</option>
                            </select>
                            <button type="submit">Update Status</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
