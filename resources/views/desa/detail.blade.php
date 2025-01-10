@extends('template.main')

@section('title', 'Detail desa')

@section('content')
    <div class="container mt-5">
        <div class="card mb-4">
            <div class="card-header">{{ $data->nama_desa }}</div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="card mb-4">
                    <img src="{{ $data->img ? asset('foto/' . $data->img) : asset('foto/default.jpg') }}" alt="{{ $data->nama_desa }}" class="image-border">
                </div>

                <div class="card">
                    <div class="card-header">Lainnya</div>
                    <div class="card-body">
                        <p><strong>Fasilitas:</strong> {{ $data->fasilitas }}</p>
                        <p><strong>Alamat:</strong> {{ $data->alamat }}</p>
                        <p><strong>Tipe:</strong> {{ $data->id_tipe }}</p> <!-- Corrected this line -->
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
                <a href="{{ url('/desa') }}" class="btn btn-primary mr-3 rounded-pill px-4 py-2 mr-5" >Home</a> 
                <a href="{{ url()->previous() }}" class="btn btn-outline-secondary rounded-pill px-4 py-2 mr-5">Back</a>
            </div>
        </div>
    </div>
@endsection