@extends('template.main')

@section('title', 'Detail Makanan')

@section('content')
    <div class="container mt-5">
        <div class="card mb-4">
            <div class="card-header text-center">{{ $data->nama_makanan }}</div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="card mb-4">
                    <img src="{{ $data->img ? asset('foto/' . $data->img) : asset('foto/default.jpg') }}" alt="{{ $data->nama_makanan }}" class="img-fluid rounded" style="width: 100%; height: auto; object-fit: cover;">
                </div>

                <div class="card">
                    <div class="card-header">Informasi Lainnya</div>
                    <div class="card-body">
                        <h4><strong>Harga:</strong></h4>
                        <p>Rp{{ number_format($data->harga, 0, ',', '.') }}</p>

                        <h4><strong>Tipe:</strong></h4>
                        <p>{{ $data->tipe }}</p> <!-- Assuming 'tipe' exists in your $data -->
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

                <div class="card">
                    <div class="card-header">Bahan Bahan</div>
                    <div class="card-body">
                        <p>{{ $data->bahan }}</p>
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