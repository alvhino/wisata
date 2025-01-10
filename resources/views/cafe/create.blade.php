@extends('template.main')

@section('title', 'Tambah Data cafe')

@section('content')
    <h1 class="text-center mb-4">Tambah Data cafe</h1>

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
            <form action="{{ url('/cafe/store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="nama_cafe" class="form-label">Nama cafe</label>
                    <input type="text" class="form-control @error('nama_cafe') is-invalid @enderror" id="nama_cafe" name="nama_cafe" required>
                </div>
                <div class="mb-3">
                    <label for="deskripsi" class="form-label">Deskripsi</label>
                    <textarea class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" name="deskripsi" rows="3" required></textarea>
                </div>
                <div class="mb-3">
                    <label for="fasilitas" class="form-label">Fasilitas</label>
                    <textarea class="form-control @error('fasilitas') is-invalid @enderror" id="fasilitas" name="fasilitas" rows="3" required></textarea>
                </div>
                <div class="mb-3">
                    <label for="jam_buka" class="form-label">jam_buka</label>
                    <input type="time" class="form-control @error('jam_buka') is-invalid @enderror" id="jam_buka" name="jam_buka" rows="3" required></input type="time">
                </div>
                <div class="mb-3">
                    <label for="jam_tutup" class="form-label">jam_tutup</label>
                    <input type="time" class="form-control @error('jam_tutup') is-invalid @enderror" id="jam_tutup" name="jam_tutup" rows="3" required></input>
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
                <a href="{{url('/cafe')}}" class="btn btn-primary" style=" text-decoration:none;">Kembali</a>
            </form>
        </div>
    </div>
@endsection
