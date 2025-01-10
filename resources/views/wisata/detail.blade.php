@extends('template.main')

@section('title', 'Detail Wisata')

@section('content')
    <div class="container mt-5">
        <div class="card mb-4">
            <div class="card-header">{{ $data->nama_wisata }}</div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="card mb-4">
                    <img src="{{ $data->img ? asset('foto/' . $data->img) : asset('foto/default.jpg') }}" alt="{{ $data->nama_wisata }}" class="img-fluid rounded" style="width: 100%; height: auto; object-fit: cover;">
                </div>

                <div class="card">
                    <div class="card-header">Lainnya</div>
                    <div class="card-body">
                        <p><strong>Fasilitas:</strong> {{ $data->fasilitas }}</p>
                        <p><strong>Alamat:</strong> {{ $data->alamat }}</p>
                        <p><strong>Harga Tiket:</strong> Rp{{ number_format($data->harga_tiket, 0, ',', '.') }}</p>
                        <p><strong>Tipe:</strong> {{ $data->id_tipe }}</p>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card mb-4">
                    <div class="card-header">Deskripsi</div>
                    <div class="card-body">
                        <p>{{ $data->deskripsi }}</p>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">Sejarah</div>
                    <div class="card-body">
                        <p>{{ $data->sejarah }}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="text-center mt-4">
            <div class="d-flex justify-content-center">
                <a href="{{ url()->previous() }}" class="btn btn-outline-secondary rounded-pill px-4 py-2">Back</a>
            </div>
        </div>
    </div>
@endsection