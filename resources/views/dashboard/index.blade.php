<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Destinasi Wisata Jepara</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" rel="stylesheet">


<style>

        body {
            font-family: Arial, sans-serif;
            background-image: url('https://i.pinimg.com/736x/bf/20/62/bf2062653ee6816525b7711b8b1cdff5.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
        }
        .hero {
            position: relative;
            height: 90vh;
            text-align: center;
        }

        .carousel-item {
            height: 90vh;
            transition: transform 1s ease, opacity 2s ease-in-out;
        }

        .carousel-item img {
            object-fit: cover;
            width: 100%;
            height: 100%;
        }
        .card img {
            min-height: 200px;
            min-width: 346px;
            max-height: 200px;
            max-width: 348px;
        }  
        .informasi {
            background-color: #242322;
        }
        #scrollBtn {
            bottom: 20px;
            position: fixed;
            right: 30px;    
            z-index: 99;
            border: none;
            background-color: #008CBA;
            color: white;
            padding: 15px;
            border-radius: 10px;
            font-size: 18px;
            text-decoration: none;
        }

        #scrollBtn:hover {
            background-color: #555;
        }

        <!-- Gaya CSS tambahan -->

    body {
        font-family: 'Poppins', sans-serif;
        color: #1F2937;
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

    .navbar-brand {
    color: white !important;
    }

    /* Hero Section */
    .judul-slide {
        position: relative;
        background: linear-gradient(135deg, rgba(30, 58, 138, 0.9), rgba(37, 99, 235, 0.9));
        color: white;
        padding: 4rem 2rem;
        text-shadow: 1px 1px 6px rgba(0, 0, 0, 0.5);
        margin-top:55px;
    }

    .judul-slide h1 {
        font-size: 3rem;
        font-weight: 700;
    }

    .judul-slide p {
        color:white;
    }

    /* Card Styling */
    .card {
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .card:hover {
        transform: translateY(-10px);
        box-shadow: 0 15px 30px rgba(0, 0, 0, 0.2);
    }

    .card img {
        height: 200px;
        object-fit: cover;
    }

    /* Buttons */
    .btn-primary {
        background: linear-gradient(90deg, #2563EB, #3B82F6);
        border: none;
        border-radius: 25px;
        padding: 10px 20px;
        transition: all 0.3s ease-in-out;
    }

    .btn-primary:hover {
        background: linear-gradient(90deg, #3B82F6, #2563EB);
        transform: scale(1.05);
    }

    /* Footer */
    footer {
        background: #1F2937;
        color: white;
        padding: 2rem 0;
        font-size: 0.875rem;
        text-align: center;
        border-top: 4px solid #2563EB;
    }

    footer a {
        color: #3B82F6;
        text-decoration: none;
    }

    footer a:hover {
        color: #FFD700;
    }

    /* Scroll Button */
    #scrollBtn {
        font-size: 1.5rem;
        background: linear-gradient(90deg, #2563EB, #3B82F6);
        border: none;
        padding: 15px;
        border-radius: 50%;
        transition: all 0.3s ease;
    }

    #scrollBtn:hover {
        transform: scale(1.1);
        background: linear-gradient(90deg, #3B82F6, #2563EB);
    }

    /* Section Titles */
    h2 {
        font-weight: 700;
        font-size: 2.5rem;
        color: #2563EB;
        text-align: center;
        margin-bottom: 2rem;
    }

    </style>
</head>
<body>
<a name="kembali-keatas"></a>
    <header>
    <nav class="navbar navbar-expand-lg">
    <a class="navbar-brand">Destinasi Wisata Jepara</a>
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

    </header>

    <section class="judul-slide text-center bg-light py-4">
        <div class="container">
            <h1 class="fw-semibold">Welcome To Website Destinasi Jepara</h1>
            <p class="text">Jepara, kota ukir dan kota sejuta tempat wisata</p>
        </div>
    </section>

    <section id="heroCarousel" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#heroCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#heroCarousel" data-slide-to="1"></li>
            <li data-target="#heroCarousel" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="https://ksmtour.com/media/images/articles4/taman-nasional-karimun-jawa-jawa-tengah.jpg" class="d-block w-100" alt="Karimunjawa Beach">
                <div class="carousel-caption d-none d-md-block">
                </div>
            </div>  
            <div class="carousel-item">
                <img src="https://upload.wikimedia.org/wikipedia/commons/3/3b/Tanjung_Gelam%2C_Taman_Nasional_Karimunjawa.jpg" class="d-block w-100" alt="Kuta Beach Sunset">
            </div>
            <div class="carousel-item">
                <img src="https://jeparaourlandpark.co.id/wp-content/uploads/slider/cache/0037f426f1d31ee9723b72d40e5e60af/Central-Slide-1.jpg" class="d-block w-100" alt="Parangtritis Beach">
            </div>
        </div>
        <a class="carousel-control-prev" href="#heroCarousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#heroCarousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </section>

    <!-- Rekomendasi Wisata Jepara -->
    <section class="rekomendasi-wisata container mt-5">
    <h2 class="fade-in">Rekomendasi Wisata di Jepara</h2>
        <div class="row mt-4">
            @foreach($wisata as $data)
                <div class="col-md-4 text-center mb-4">
                    <div class="card h-100">
                        @if($data->img) 
                            <img src="{{ asset('foto/' . $data->img) }}" class="card-img-top" alt="{{ $data->nama_wisata }}" style="height: 200px; object-fit: cover;">
                        @else
                            <img src="{{ asset('foto/default.jpg') }}" class="card-img-top" alt="{{ $data->nama_wisata }}" style="height: 200px; object-fit: cover;">
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
    </section>

    <!-- Desa -->
    <section class="desa container mt-5">
        <h2 class="text-center">Desa wisata di Jepara</h2>
        <div class="row mt-4">
            @foreach($desa as $data)
                <div class="col-md-4 text-center mb-4">
                    <div class="card h-100">
                        @if($data->img) 
                            <img src="{{ asset('foto/' . $data->img) }}" class="card-img-top" alt="{{ $data->nama_desa }}" style="height: 200px; object-fit: cover;">
                        @else
                            <img src="{{ asset('foto/default.jpg') }}" class="card-img-top" alt="{{ $data->nama_desa }}" style="height: 200px; object-fit: cover;">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $data->nama_desa }}</h5> 
                            <p class="card-text">{{ Str::limit($data->deskripsi, 100) }}</p> 
                        </div>
                        <div class="card-footer">
                            <a class="btn btn-primary me-2" href="{{ url('dashboard/detail_desa', $data->id_desa) }}">Detail</a>
                            <i class="fa-regular fa-eye"></i> {{ $data->dilihat }}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    <!-- Cafe -->
    <section class="cafe container mt-5">
        <h2 class="text-center">Cafe terbaik di Jepara</h2>
        <div class="row mt-4">
            @foreach($cafe as $data)
                <div class="col-md-4 text-center mb-4">
                    <div class="card h-100">
                        @if($data->img) 
                            <img src="{{ asset('foto/' . $data->img) }}" class="card-img-top" alt="{{ $data->nama_cafe }}" style="height: 200px; object-fit: cover;">
                        @else
                            <img src="{{ asset('foto/default.jpg') }}" class="card-img-top" alt="{{ $data->nama_cafe }}" style="height: 200px; object-fit: cover;">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $data->nama_cafe }}</h5> 
                            <p class="card-text">{{ Str::limit($data->deskripsi, 100) }}</p> 
                        </div>
                        <div class="card-footer">
                            <a class="btn btn-primary me-2" href="{{ url('dashboard/detail_cafe', $data->id_cafe) }}">Detail</a>
                            <i class="fa-regular fa-eye"></i> {{ $data->dilihat }}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    <!-- Makanan -->
    <section class="makanan container mt-5">
        <h2 class="text-center">Makanan Khas Jepara</h2>
        <div class="row mt-4">
            @foreach($makanan as $data)
                <div class="col-md-4 text-center mb-4">
                    <div class="card h-100">
                        @if($data->img) 
                            <img src="{{ asset('foto/' . $data->img) }}" class="card-img-top" alt="{{ $data->nama_makanan }}" style="height: 200px; object-fit: cover;">
                        @else
                            <img src="{{ asset('foto/default.jpg') }}" class="card-img-top" alt="{{ $data->nama_makanan }}" style="height: 200px; object-fit: cover;">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $data->nama_makanan }}</h5> 
                            <p class="card-text">{{ Str::limit($data->deskripsi, 100) }}</p> 
                        </div>
                        <div class="card-footer">
                            <a class="btn btn-primary me-2" href="{{ url('dashboard/detail_makanan', $data->id_makanan) }}">Detail</a>
                            <i class="fa-regular fa-eye"></i> {{ $data->dilihat }}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    <!-- sejarah jepara -->
    <section class="sejarah-jepara container mt-5 p-5">
        <h2 class="text-center">Sejarah Jepara</h2>
        <p class="mt-4">Sebelum berdirinya kerajaan-kerajaan di Jawa, kawasan Jepara telah dihuni oleh penduduk yang diperkirakan berasal dari Yunnan, Tiongkok Selatan. Jepara saat itu terpisah oleh Selat Juwana. Nama "Jepara" diyakini berasal dari kata "Ujung Para" atau "Jumpara," yang berarti tempat pemukiman pedagang.</p>
        <p>Jepara dikenal dalam catatan Tiongkok pada abad ke-7 sebagai bagian dari Kerajaan Kalingga yang dipimpin oleh Ratu Shima. Pada abad ke-15, Jepara mulai dikenal sebagai kota perdagangan kecil di bawah kepemimpinan Aryo Timur dan kemudian Pati Unus, yang terkenal melawan Portugis di Malaka. Setelah Pati Unus wafat, kekuasaan Jepara berpindah ke Ratu Kalinyamat, yang memimpin dari 1549 hingga 1579.</p>
        <p>Ratu Kalinyamat dikenal sebagai pemimpin yang patriotik, mengirim armada besar untuk menyerang Portugis di Malaka pada tahun 1551 dan 1574. Walaupun serangan ini gagal, keberaniannya diakui, dan Jepara tetap bebas dari penjajahan Portugis. Di bawah pemerintahannya, Jepara berkembang sebagai pusat niaga dan seni ukir, yang menjadi ciri khas daerah hingga sekarang.</p>
        <p>Ratu Kalinyamat wafat pada tahun 1579 dan dimakamkan di Jepara, meninggalkan warisan besar dalam bidang ekonomi, seni, dan militer.</p>
    </section>

    <!-- Lokasi dan Kontak -->
    <section class="informasi container-fluid mt-5 text-white p-5">
        <div class="container">
            <div class="row">
 <div class="col-md-6">
                <h3>Lokasi Jepara</h3>
                <p>Jepara, terletak di pesisir utara pulau Jawa, dikenal dengan keindahan pantainya dan seni ukir kayunya.</p>
                <h5>Koordinat:</h5>
                <p>6°35'23.0"S 110°40'02.0"E</p>
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d121383.08119790931!2d110.58389060544488!3d-6.580941053762342!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7118d34b9ae3ab%3A0x9d3067f98797ae0f!2sJepara%2C%20Kec.%20Jepara%2C%20Kabupaten%20Jepara%2C%20Jawa%20Tengah!5e1!3m2!1sid!2sid!4v1727248885741!5m2!1sid!2sid"
                        width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            <div class="col-md-6">
                <h3>About</h3>
                <p>Jepara adalah kabupaten yang kaya akan budaya dan sejarah. Dikenal dengan seni ukir kayunya, Jepara juga menawarkan berbagai tempat wisata alam yang menakjubkan.</p>
                
                <h3>Contact</h3>
                <p>Untuk informasi lebih lanjut, silakan hubungi kami:</p>
                <p>Email: alvhinojepara84@gmail.com</p>
                <p>Telepon:</p> 
                <p>+62 895 0166 0048 (Alvhino)</p> 
                <p>+62 882 2778 0845 (Firda)</p> 
            </div>
        </div>
    </div>
    </section>
    <a href="#kembali-keatas" id="scrollBtn" title="Kembali ke Atas"><i class="fa-solid fa-arrow-up"></i></a>

    
<footer>
    &copy; 2024 Destinasi Wisata Jepara. All Rights Reserved.
</footer>

</body>



<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</html>