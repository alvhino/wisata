<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kategori Wisata</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f4f4f9; /* Latar belakang abu-abu terang */
            font-family: 'Arial', sans-serif;
        }
        .navbar {
            background-color: #1d3557; /* Biru gelap */
            color: white;
        }
        .navbar .navbar-brand {
            color: white !important;
        }
        .navbar-nav .nav-item .nav-link {
            color: white !important;
        }
        .navbar-nav .nav-item:hover {
            background-color: #457b9d; /* Biru terang saat hover */
        }
        .btn-primary {
            background-color: #457b9d; /* Biru terang */
            border: none;
        }
        .btn-primary:hover {
            background-color: #1d3557; /* Biru gelap saat hover */
        }
        .card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            border-radius: 10px;
            border: none;
        }
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }
        .card-img-top {
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
            object-fit: cover;
            height: 200px;
        }
        .dropdown-item{
            color: white !important;
        }
        .card-body {
            padding: 15px;
        }
        .card-footer {
            background-color: #ffffff;
            border-top: 1px solid #ddd;
            text-align: center;
        }
        .card-title {
            font-size: 1.25rem;
            font-weight: bold;
        }
        .card-text {
            font-size: 0.9rem;
        }
        .dropdown-menu {
            background-color: #1d3557;
        }
        .dropdown-item:hover {
            background-color: #457b9d;
        }
        .text-center {
            color: #1d3557;
        }
        .btn-secondary {
            background-color: #a8dadc; /* Biru muda */
            border: none;
            color: #1d3557;
        }
        .btn-secondary:hover {
            background-color: #457b9d;
            color: white;
        }
        .no-data-message {
            background-color: #fff3cd;
            color: #856404;
            padding: 15px;
            border-radius: 5px;
            margin-top: 20px;
            text-align: center;
        }
        .container {
            padding: 20px;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="#">Destinasi Wisata Jepara</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="{{ url('dashboard/all_wisata') }}">Wisata</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('dashboard/all_desa') }}">Desa</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('dashboard/all_cafe') }}">Cafe</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('dashboard/all_makanan') }}">Makanan</a></li>
            </ul>
        </div>
    </div>
</nav>

<div class="container mt-5">
    <h2 class="text-center">Kategori: {{ $selectedTipe->nama_tipe ?? 'Wisata' }}</h2>
    <div class="mb-4">
        <a href="{{ url('/dashboard/all_wisata') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Kembali melihat semua
        </a>

        <!-- Dropdown Pilihan Kategori -->
        <div class="dropdown d-inline">
            <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownKategori" data-bs-toggle="dropdown" aria-expanded="false">
                {{ isset($selectedTipe) ? $selectedTipe->nama_tipe : 'Pilih Kategori Wisata' }}
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownKategori">
                @foreach ($tipe as $item)
                    @if (in_array($item->id_tipe, [4, 5, 6, 7])) <!-- Hanya menampilkan tipe dengan id 4, 5, 6, 7 -->
                        <li>
                            <a class="dropdown-item" href="{{ url('dashboard/kategori', ['id_tipe' => $item->id_tipe]) }}">
                                {{ $item->nama_tipe }}
                            </a>
                        </li>
                    @endif
                @endforeach
            </ul>
        </div>
    </div>

    <!-- Jika tidak ada data wisata di kategori ini -->
    @if($wisata->isEmpty())
        <div class="no-data-message">
            <p>Tidak ada data wisata untuk kategori ini.</p>
        </div>
    @else
        <div class="row mt-4">
            @foreach($wisata as $data)
                <div class="col-md-4 text-center mb-4">
                    <div class="card h-100">
                        @if($data->img)
                            <img src="{{ asset('foto/' . $data->img) }}" class="card-img-top" alt="{{ $data->nama_wisata }}">
                        @else
                            <img src="{{ asset('foto/default.jpg') }}" class="card-img-top" alt="Gambar Default">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $data->nama_wisata }}</h5>
                            <p class="card-text">{{ Str::limit($data->deskripsi, 100) }}</p>
                            <p class="card-text"><strong>Alamat:</strong> {{ $data->alamat }}</p>
                            <p class="card-text"><strong>Harga Tiket:</strong> Rp{{ number_format($data->harga_tiket, 0, ',', '.') }}</p>
                        </div>
                        <div class="card-footer">
                            <a class="btn btn-primary me-2" href="{{ url('dashboard/detail_wisata', $data->id_wisata) }}">Detail</a>
                            <i class="fa-regular fa-eye"></i> {{ $data->dilihat }}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
