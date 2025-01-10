<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $data->nama_makanan }}</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Background styling */
        body {
            background: linear-gradient(135deg, #f5f7fa, #dfe9f3, #c3cfe2);
            font-family: Arial, sans-serif;
            position: relative;
            min-height: 100vh;
            overflow-y: auto; /* Enable scrolling */
        }

        /* Optional subtle pattern overlay */
        body::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-image: url('https://www.transparenttextures.com/patterns/cubes.png');
            opacity: 0.05; /* Adjust opacity for subtle effect */
            z-index: 0;
        }

        /* Container styling */
        .container {
            position: relative;
            z-index: 1;
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.1);
            min-height: 100vh; /* Ensure full height for content */
            overflow: hidden;
        }

        /* Card styling */
        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            background-color: #f8f9fa;
            font-weight: bold;
            border-bottom: 1px solid #ddd;
            text-align: center;
            font-size: 1.5rem;
        }

        .card-body {
            padding: 20px;
        }

        .card-body p {
            font-size: 1.1rem;
            line-height: 1.5;
        }

        .image-border {
            border: 5px solid #ddd;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
            width: 100%;
            height: auto;
            object-fit: cover;
        }

        .btn-secondary {
            background-color: #333;
            border-color: #333;
        }

        .btn-secondary:hover {
            background-color: #555;
            border-color: #555;
        }
    </style>
</head>
<body>
    
<div class="container mt-5">
    <div class="card mb-4">
        <div class="card-header">{{ $data->nama_makanan }}</div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="card mb-4">
                <img src="{{ $data->img ? asset('foto/' . $data->img) : asset('foto/default.jpg') }}" alt="{{ $data->nama_makanan }}" class="image-border">
            </div>

            <div class="card">
                <div class="card-header">Informasi Lainnya</div>
                <div class="card-body">
                    <p><strong>Harga:</strong> Rp{{ number_format($data->harga, 0, ',', '.') }}</p>
                    <p><strong>Bahan Bahan:</strong> {{ $data->bahan }}</p>

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
            <a href="{{ url('/') }}" class="btn btn-primary mr-3 rounded-pill px-4 py-2">Home</a>
            <a href="{{ url()->previous() }}" class="btn btn-outline-secondary rounded-pill px-4 py-2">Back</a>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>