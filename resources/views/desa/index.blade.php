@extends('template.main')

@section('title', 'Daftar Desa')

@section('content')
    <h1 class="text-center mb-4">Daftar Desa</h1>

    <div class="container">
        <a class="btn btn-primary mb-3" href="{{ url('/desa/create') }}">Tambah Data Desa</a>

        <!-- Tabel Daftar Desa -->
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th style="width: 20%;">Gambar</th>
                    <th>Nama Desa</th>
                    <th>Alamat</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @if($desa->isEmpty())
                    <tr>
                        <td colspan="5" class="text-center">Tidak ada data desa.</td>
                    </tr>
                @else
                    @foreach($desa as $data)
                        <tr>
                            <td>
                                @if($data->img)
                                    <img src="{{ asset('foto/' . $data->img) }}" alt="{{ $data->nama_desa }}" style="height: 100px; object-fit: cover; width: 100%;">
                                @else
                                    <img src="{{ asset('foto/default.jpg') }}" alt="Gambar Default" style="height: 100px; object-fit: cover; width: 100%;">
                                @endif
                            </td>
                            <td>{{ $data->nama_desa }}</td>
                            <td>{{ $data->alamat }}</td>
                            <td>
                                <a href="{{ url('/desa/edit/'.$data->id_desa) }}" class="btn btn-success btn-sm me-2">Edit</a>
                                <a href="{{ url('/desa/show/'.$data->id_desa) }}" class="btn btn-primary btn-sm me-2">Detail</a>
                                <form action="{{ url('/desa/destroy/'.$data->id_desa) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus?');">
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