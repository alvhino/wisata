<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Semua Cafe di Jepara</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" rel="stylesheet">
    <style>
    body {
        background-color: #f8f9fa; /* Latar belakang abu terang */
        font-family: 'Arial', sans-serif;
    }

    .navbar {
        position: fixed;
        top: 0;
        width: 100%;
        z-index: 10;
        background: #1d3557; /* Biru gelap */ 
        color: #ffffff;
        box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
    }

    .navbar .nav-link {
    color: white !important;
    }

    .navbar .navbar-brand {
        color: white !important;
    }

    .content {
        padding-top: 80px; /* Menghindari navbar */
    }

    h2 {
        font-weight: bold;
        color: #1d3557; /* Biru gelap */
    }

    .card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        border: none;
        background-color: #ffffff;
    }

    .card:hover {
        transform: translateY(-10px);
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
    }

    .card-footer {
        background-color: white;
        border-top: none;
    }

    .btn-primary {
        background-color: #1d3557; /* Biru gelap */
        border: none;
        transition: background-color 0.3s ease;
    }

    .btn-primary:hover {
        background-color: #457b9d; /* Biru sedang */
    }

    .btn-secondary {
        background-color: #a8dadc; /* Biru terang */
        border: none;
        color: #1d3557; /* Biru gelap */
        transition: background-color 0.3s ease, color 0.3s ease;
    }

    .btn-secondary:hover {
        background-color: #457b9d; /* Biru sedang */
        color: white;
    }

    footer {
        margin-top: 50px;
        text-align: center;
        padding: 20px;
        background-color: #1d3557; /* Biru gelap */
        border-top: 1px solid #457b9d;
        font-size: 0.9rem;
        color: #ffffff;
    }

    footer a {
        color: #a8dadc; /* Biru terang */
        text-decoration: none;
        transition: color 0.3s ease;
    }

    footer a:hover {
        color: #ffffff;
        text-decoration: underline;
    }
</style>

</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light">
    <a class="navbar-brand" href="#">Destinasi Wisata Jepara</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="{{ url('dashboard/all_wisata') }}">Wisata</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('dashboard/all_desa') }}">Desa</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('dashboard/all_cafe') }}">Cafe</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('dashboard/all_makanan') }}">Makanan</a>
            </li>
        </ul>
    </div>
</nav>

<div class="container content">
    <h2 class="text-center mb-4">Semua makanan di Jepara</h2>
    <div class="text-left mb-4">
        <a href="{{ url('/') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>
    </div>
    <div class="row mt-4">
        @foreach($makanan as $data)
            <div class="col-md-4 text-center mb-4">
                <div class="card h-100 shadow-sm">
                    @if($data->img) 
                        <img src="{{ asset('foto/' . $data->img) }}" class="card-img-top" alt="{{ $data->nama_makanan }}" style="height: 200px; object-fit: cover;">
                    @else
                        <img src="{{ asset('foto/default.jpg') }}" class="card-img-top" alt="{{ $data->nama_makanan }}" style="height: 200px; object-fit: cover;">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $data->nama_makanan }}</h5> 
                        <p class="card-text">{{ Str::limit($data->deskripsi, 100) }}</p> 
                    </div>
                    <div class="card-footer d-flex justify-content-between align-items-center">
                        <a class="btn btn-primary btn-sm" href="{{ url('dashboard/detail_makanan', $data->id_makanan) }}">Detail</a>
                        <span><i class="fa-regular fa-eye"></i> {{ $data->dilihat }}</span>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

<footer>
    &copy; 2024 Destinasi Wisata Jepara. All Rights Reserved.
</footer>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
