@extends('template.main')

@section('title', 'Daftar Wisata')

@section('content')
    <h1 class="text-center mb-4">Daftar Wisata</h1>

    <div class="container">
        <!-- Tombol Tambah Data Wisata -->
        <a class="btn btn-primary mb-3" href="{{ url('wisata/create') }}">Tambah Data Wisata</a>

        <!-- Dropdown Pilihan Kategori -->
        <button class="btn btn-primary dropdown-toggle mb-3" type="button" id="dropdownKategori" data-bs-toggle="dropdown" aria-expanded="false">
            {{ isset($selectedTipe) ? $selectedTipe->nama_tipe : 'Pilih Kategori Wisata' }}
        </button>
        <ul class="dropdown-menu" aria-labelledby="dropdownKategori">
            @foreach ($tipe as $item)
                @if (in_array($item->id_tipe, [4, 5, 6, 7]))  <!-- Hanya menampilkan tipe dengan id 4, 5, 6, 7 -->
                    <li>
                        <a class="dropdown-item" href="{{ url('wisata/kategori', ['id_tipe' => $item->id_tipe]) }}">
                            {{ $item->nama_tipe }}
                        </a>
                    </li>
                @endif
            @endforeach
        </ul>

        <!-- Tabel Daftar Wisata -->
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th style="width: 20%;">Gambar</th>
                    <th>Nama Wisata</th>
                    <th>Alamat</th>
                    <th>Harga Tiket</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @if($wisata->isEmpty())
                    <tr>
                        <td colspan="5" class="text-center">Tidak ada data wisata.</td>
                    </tr>
                @else
                    @foreach($wisata as $data)
                        <tr>
                            <td>
                                @if($data->img)
                                    <img src="{{ asset('foto/' . $data->img) }}" alt="{{ $data->nama_wisata }}" style="height: 100px; object-fit: cover; width: 100%;">
                                @else
                                    <img src="{{ asset('foto/default.jpg') }}" alt="Gambar Default" style="height: 100px; object-fit: cover; width: 100%;">
                                @endif
                            </td>
                            <td>{{ Str::limit($data->nama_wisata, 18) }}</td>
                            <td>{{ Str::limit($data->alamat, 50) }}</td>
                            <td>Rp{{ number_format($data->harga_tiket, 0, ',', '.') }}</td>
                            <td>
                                <a href="{{ url('wisata/edit', $data->id_wisata) }}" class="btn btn-success btn-sm me-2">Edit</a>
                                <a href="{{ url('wisata/show', $data->id_wisata) }}" class="btn btn-primary btn-sm me-2">Detail</a>
                                <form action="{{ url('wisata/destroy', $data->id_wisata) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus?');">
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