@extends('template.main')

@section('title', 'Daftar Cafe')

@section('content')
    <h1 class="text-center mb-4">Daftar Cafe</h1>

    <div class="container">
        <a class="btn btn-primary mb-3" href="{{ url('/cafe/create') }}">Tambah Data Cafe</a>

        <!-- Tabel Daftar Cafe -->
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th style="width: 20%;">Gambar</th>
                    <th>Nama Cafe</th>
                    <th>Deskripsi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @if($cafe->isEmpty())
                    <tr>
                        <td colspan="6" class="text-center">Tidak ada data cafe.</td>
                    </tr>
                @else
                    @foreach($cafe as $data)
                        <tr>
                            <td>
                                @if($data->img)
                                    <img src="{{ asset('foto/' . $data->img) }}" alt="{{ $data->nama_cafe }}" style="height: 100px; object-fit: cover; width: 100%;">
                                @else
                                    <img src="{{ asset('foto/default.jpg') }}" alt="Gambar Default" style="height: 100px; object-fit: cover; width: 100%;">
                                @endif
                            </td>
                            <td>{{ $data->nama_cafe }}</td>
                            <td>{{ Str::limit($data->deskripsi, 50) }}</td>
                            <td>
                                <a href="{{ url('/cafe/edit/'.$data->id_cafe) }}" class="btn btn-success btn-sm me-2">Edit</a>
                                <a href="{{ url('/cafe/show/'.$data->id_cafe) }}" class="btn btn-primary btn-sm me-2">Detail</a>
                                <form action="{{ url('/cafe/destroy/'.$data->id_cafe) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus?');">
                                    @csrf
                                    @method('get') <!-- Use DELETE here -->
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