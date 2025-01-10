@extends('template.main')

@section('title', 'Daftar Makanan')

@section('content')
    <h1 class="text-center mb-4">Daftar Makanan</h1>

    <div class="container">
        <!-- Tombol Tambah Data makanan -->
        <a class="btn btn-primary mb-3" href="{{ url('makanan/create') }}">Tambah Data makanan</a>

        <!-- Tabel Daftar makanan -->
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th style="width: 20%;">Gambar</th>
                    <th>Nama Makanan</th>
                    <th>Deskripsi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @if($makanan->isEmpty())
                    <tr>
                        <td colspan="5" class="text-center">Tidak ada data makanan.</td>
                    </tr>
                @else
                    @foreach($makanan as $data)
                        <tr>
                            <td>
                                @if($data->img)
                                    <img src="{{ asset('foto/' . $data->img) }}" alt="{{ $data->nama_makanan }}" style="height: 100px; object-fit: cover; width: 100%;">
                                @else
                                    <img src="{{ asset('foto/default.jpg') }}" alt="Gambar Default" style="height: 100px; object-fit: cover; width: 100%;">
                                @endif
                            </td>
                            <td>{{ $data->nama_makanan }}</td>
                            <td>{{ Str::limit($data->deskripsi, 50) }}</td>
                            <td>
                                <a href="{{ url('makanan/edit', $data->id_makanan) }}" class="btn btn-success btn-sm me-2">Edit</a>
                                <a href="{{ url('makanan/show', $data->id_makanan) }}" class="btn btn-primary btn-sm me-2">Detail</a>
                                <form action="{{ url('makanan/destroy', $data->id_makanan) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus?');">
                                    @csrf
                                    @method('get')
                                    <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>
@endsection