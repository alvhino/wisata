@extends('template.main')

@section('title', 'Wisata Berdasarkan Kategori')

@section('content')
    <h1 class="text-center mb-4">Wisata Berdasarkan Kategori</h1>

    <a href="{{ url('/wisata') }}" class="btn btn-secondary mb-3">Kembali ke Semua Wisata</a>

    <button class="btn btn-primary dropdown-toggle mb-3" type="button" id="dropdownKategori" data-bs-toggle="dropdown" aria-expanded="false">
    {{ isset($selectedTipe) ? $selectedTipe->nama_tipe : 'Pilih Kategori Wisata' }}
</button>
<ul class="dropdown-menu" aria-labelledby="dropdownKategori">
    @foreach ($tipe as $item)
        @if (in_array($item->id_tipe, [4, 5, 6, 7]))
            <li>
                <a class="dropdown-item" href="{{ url('wisata/kategori', ['id_tipe' => $item->id_tipe]) }}">
                    {{ $item->nama_tipe }}
                </a>
            </li>
        @endif
    @endforeach
</ul>

    <div class="row">
        @if ($wisata->isEmpty())
            <div class="col-12">
                <p class="text-center">Tidak ada wisata pada kategori ini.</p>
            </div>
        @else
            @foreach ($wisata as $item)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="{{ asset('foto/' . $item->img) }}" class="card-img-top" alt="{{ $item->nama_wisata }}" style="height: 200px; object-fit: cover;">
                        <div class="card-body">
                            <h5 class="card-title">{{ $item->nama_wisata }}</h5>
                            <p class="card-text text-truncate">{{ $item->deskripsi }}</p>
                            <a href="{{ url('/wisata/show/' . $item->id_wisata) }}" class="btn btn-primary">Lihat Detail</a>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>

@endsection
