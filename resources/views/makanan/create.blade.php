@extends('template.main')

@section('title', 'Tambah Data makanan')

@section('content')
    <h1 class="text-center mb-4">Tambah Data makanan khas jepara</h1>
    @if ($errors->any())
    <div class="alert alert-danger">
        <strong>Terjadi kesalahan!</strong> Silakan periksa kembali input Anda:
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

    <div class="row justify-content-center">
        <div class="col-md-8">
            <form action="{{ url('/makanan/store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="nama_makanan" class="form-label">Nama makanan</label>
                    <input type="text" class="form-control @error('nama_makanan') is-invalid @enderror" id="nama_makanan" name="nama_makanan" required>
                </div>
                <div class="mb-3">
                    <label for="deskripsi" class="form-label">Deskripsi</label>
                    <textarea class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" name="deskripsi" rows="3" required></textarea>
                </div>
                <div class="mb-3">
                    <label for="sejarah" class="form-label">Sejarah</label>
                    <textarea class="form-control @error('sejarah') is-invalid @enderror" id="sejarah" name="sejarah" rows="3" required></textarea>
                </div>
                    <div class="mb-3">
        <label for="id_tipe" class="form-label">Tipe</label>
        <select class="form-control @error('id_tipe') is-invalid @enderror" id="id_tipe" name="id_tipe" required>
            <option value="">Pilih Tipe</option>
            @foreach($tipe as $data)
                <option value="{{ $data->id_tipe }}">{{ $data->nama_tipe }}</option>
            @endforeach
        </select>
        @error('id_tipe')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>


                <div class="mb-3">
                    <label for="harga" class="form-label">Harga</label>
                    <input type="number" class="form-control @error('harga') is-invalid @enderror" id="harga" name="harga" required>
                </div>
                <div class="mb-3">
                    <label for="bahan" class="form-label">Bahan Bahan</label>
                    <textarea class="form-control @error('bahan') is-invalid @enderror" id="bahan" name="bahan" rows="3" required></textarea>
                </div>
                <div class="mb-3">
                    <label for="img" class="form-label">Upload Gambar</label>
                    <input type="file" class="form-control @error('img') is-invalid @enderror" id="img" name="img" accept="img/*">
                </div>  
                <input type="hidden" name="dilihat" value="1">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{url('/makanan')}}" class="btn btn-primary" style=" text-decoration:none;">Kembali</a>
            </form>
        </div>
    </div>
@endsection
