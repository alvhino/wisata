<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Destinasi desa Jepara</title>
    <!-- Link to Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-image: url('https://i.pinimg.com/736x/bf/20/62/bf2062653ee6816525b7711b8b1cdff5.jpg');
            background-size: cover; /* Menutupi seluruh halaman */
            background-repeat: no-repeat; /* Tidak mengulangi gambar */
            background-position: center; /* Pusatkan gambar */
            color: #fff;
            margin: 0;
            padding: 0;
        }

        /* Navbar Styling */
        nav.navbar {
            background-color: rgba(255, 255, 255, 0.8);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        nav.navbar a.navbar-brand {
            font-size: 24px;
            font-weight: 600;
            color: #333;
        }

        nav .navbar-nav .nav-item .nav-link {
            font-weight: 500;
            color: #333;
        }

        /* Heading */
        h1.text-center {
            font-size: 36px;
            font-weight: 700;
            color: #fff;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.6);
            margin-top: 20px;
        }

        /* Card Styling */
        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
            overflow: hidden;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 16px 30px rgba(0, 0, 0, 0.3);
        }

        .card-img-top {
            object-fit: cover;
            height: 200px;
        }

        .card-body {
            background-color: rgba(255, 255, 255, 0.85);
            padding: 20px;
            border-radius: 10px;
        }

        .card-body h1.card-title {
            font-size: 18px;
            font-weight: 600;
            color: #333;
        }

        .card-body p {
            font-size: 14px;
            line-height: 1.5;
            color: #555;
        }

        .card-footer {
            background-color: rgba(255, 255, 255, 0.9);
            border-top: 1px solid #ddd;
            padding: 15px;
            border-radius: 0 0 15px 15px;
            text-align: center;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            font-weight: 600;
            padding: 8px 16px;
            border-radius: 30px;
            transition: background-color 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }

        /* Back Button Styling */
.btn-back {
    background: linear-gradient(135deg, #ff6f61, #ff4c38);
    border: none;
    padding: 12px 24px;
    border-radius: 50px;
    font-weight: 600;
    color: white;
    font-size: 16px;
    text-decoration: none;
    display: inline-block;
    box-shadow: 0 6px 15px rgba(0, 0, 0, 0.2);
    transition: all 0.3s ease-in-out;
}

.btn-back:hover {
    background: linear-gradient(135deg, #ff4c38, #ff6f61);
    box-shadow: 0 8px 18px rgba(0, 0, 0, 0.3);
    transform: translateY(-4px); /* Lift effect on hover */
    text-decoration: none; /* Remove underline when hovered */
}

.btn-back:focus, .btn-back:active {
    outline: none;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.4); /* Focus effect with larger shadow */
}

        /* Responsive Styles */
        .container {
            margin-top: 40px;
        }

        footer {
            padding: 20px;
            background-color: rgba(0, 0, 0, 0.6);
            text-align: center;
            color: #fff;
        }
    </style>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="navbar-brand">Destinasi desa Jepara</a>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-5">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Kategori 
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('dashboard.showkategori', 'pantai') }}">Pantai</a>
                            <a class="dropdown-item" href="{{ route('dashboard.showkategori', 'pegunungan') }}">Pegunungan</a>
                            <a class="dropdown-item" href="{{ route('dashboard.showkategori', 'museum') }}">Museum</a>
                            <a class="dropdown-item" href="{{ route('dashboard.showkategori', 'taman-bermain') }}">Taman Bermain</a>
                            <a class="dropdown-item" href="{{ route('dashboard.showkategori', 'makanan') }}">makanan</a>
                            <a class="dropdown-item" href="{{ route('dashboard.showkategori', 'desa') }}">desa</a>
                            <a class="dropdown-item" href="{{ route('dashboard.showkategori', 'cafe') }}">cafe</a>

                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <section>
        <h1 class="text-center mb-4">Kategori: {{ ucfirst($tipe) }}</h1>

        <div class="container">
            <div class="row">
                @foreach($desa as $data)
                    <div class="col-md-4 mb-4">
                        <div class="card h-100">
                            @if($data->img)
                                <img src="{{ asset('foto/' . $data->img) }}" class="card-img-top" alt="{{ $data->nama_desa }}">
                            @else
                                <img src="{{ asset('foto/default.jpg') }}" class="card-img-top" alt="{{ $data->nama_desa }}">
                            @endif
                            
                            <div class="card-body">
                                <h1 class="card-title text-center">{{ $data->nama_desa }}</h1>
                                <p>{{ Str::limit($data->deskripsi, 100) }}</p>
                                <p><strong>Alamat:</strong> {{ $data->alamat }}</p>
                            </div>

                            <div class="card-footer">
                                <a href="{{ url('dashboard/detail', $data->id_desa) }}" class="btn btn-primary">Detail</a>
                                <p class="mb-0 text-dark"><i class="fa-regular fa-eye"></i>Dilihat sebanyak : {{ $data->dilihat }}</p>   
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

<!-- Back Button -->
<div class="text-center mt-5">
    <a href="{{ url('/') }}" class="btn-back">Kembali</a>
</div>

    </section>

    <footer>
        <p>&copy; 2024 Destinasi desa Jepara</p>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
