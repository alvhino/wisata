@extends('template.main')

@section('title', 'Tambah Data desa')

@section('content')
    <h1 class="text-center mb-4">Tambah Data desa</h1>

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
            <form action="{{ url('/desa/store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="nama_desa" class="form-label">Nama desa</label>
                    <input type="text" class="form-control @error('nama_desa') is-invalid @enderror" id="nama_desa" name="nama_desa" required>
                </div>
                <div class="mb-3">
                    <label for="deskripsi" class="form-label">Deskripsi</label>
                    <textarea class="form-control @error('dwskripsi') is-invalid @enderror" id="deskripsi" name="deskripsi" rows="3" required></textarea>
                </div>
                <div class="mb-3">
                    <label for="sejarah" class="form-label">Sejarah</label>
                    <textarea class="form-control @error('sejarah') is-invalid @enderror" id="sejarah" name="sejarah" rows="3" required></textarea>
                </div>
                <div class="mb-3">
                    <label for="fasilitas" class="form-label">Fasilitas</label>
                    <textarea class="form-control @error('fasilitas') is-invalid @enderror" id="fasilitas" name="fasilitas" rows="3" required></textarea>
                </div>
                <div class="mb-3">
                    <label for="alamat" class="form-label">alamat</label>
                    <textarea class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" rows="3" required></textarea>
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
                    <label for="img" class="form-label">Upload Gambar</label>
                    <input type="file" class="form-control @error('img') is-invalid @enderror" id="img" name="img" accept="img/*">
                </div>
                <input type="hidden" name="dilihat" value="1">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{url('/desa')}}" class="btn btn-primary" style=" text-decoration:none;">Kembali</a>
            </form>
        </div>
    </div>
@endsection
