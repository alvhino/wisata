@extends('template.main')

@section('title', 'Detail Cafe')

@section('content')
    <div class="container mt-5">
        <div class="card mb-4">
            <div class="card-header">{{ $data->nama_cafe }}</div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="card mb-4">
                    <img src="{{ $data->img ? asset('foto/' . $data->img) : asset('foto/default.jpg') }}" alt="{{ $data->nama_cafe }}" class="img-fluid rounded" style="width: 100%; height: auto; object-fit: cover;">
                </div>

                <div class="card">
                    <div class="card-header">Lainnya</div>
                    <div class="card-body">
                        <p><strong>Jam Buka:</strong> {{ $data->jam_buka }}</p>
                        <p><strong>Jam Tutup:</strong> {{ $data->jam_tutup }}</p>
                        <p><strong>Alamat:</strong> {{ $data->alamat }}</p>
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
                    <div class="card-header">Fasilitas</div>
                    <div class="card-body">
                        <p>{{ $data->fasilitas }}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="text-center mt-4">
            <div class="d-flex justify-content-center">
                <a href="{{ url('/') }}" class="btn btn-primary mr-3 rounded-pill px-4 py-2">Home</a>
                <a href="{{ url()->previous() }}" class="btn btn-outline-secondary rounded-pill px-4 py-2">Back</a>
            </div>
        </div>
    </div>
@endsection