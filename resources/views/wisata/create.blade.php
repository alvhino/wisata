@extends('template.main')

@section('title', 'Tambah Data Wisata')

@section('content')
    <h1 class="text-center mb-4">Tambah Data Wisata</h1>
    
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form action="{{ url('/wisata/store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="nama_wisata" class="form-label">Nama Wisata</label>
                    <input type="text" class="form-control @error('nama_wisata') is-invalid @enderror" id="nama_wisata" name="nama_wisata" required>
                </div>
                <div class="mb-3">
                    <label for="deskripsi" class="form-label">Deskripsi</label>
                    <textarea class="form-control @error('nama_wisata') is-invalid @enderror" id="deskripsi" name="deskripsi" rows="3" required></textarea>
                </div>
                <div class="mb-3">
                    <label for="sejarah" class="form-label">Sejarah</label>
                    <textarea class="form-control @error('nama_wisata') is-invalid @enderror" id="sejarah" name="sejarah" rows="3" required></textarea>
                </div>
                <div class="mb-3">
                    <label for="fasilitas" class="form-label">Fasilitas</label>
                    <textarea class="form-control @error('nama_wisata') is-invalid @enderror" id="fasilitas" name="fasilitas" rows="3" required></textarea>
                </div>
                <div class="mb-3">
                    <label for="alamat" class="form-label">alamat</label>
                    <textarea class="form-control @error('nama_wisata') is-invalid @enderror" id="alamat" name="alamat" rows="3" required></textarea>
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
                    <label for="harga_tiket" class="form-label">Harga Tiket</label>
                    <input type="number" class="form-control @error('nama_wisata') is-invalid @enderror" id="harga_tiket" name="harga_tiket" required>
                </div>
                <div class="mb-3">
                    <label for="img" class="form-label">Upload Gambar</label>
                    <input type="file" class="form-control @error('nama_wisata') is-invalid @enderror" id="img" name="img" accept="img/*">
                </div>
                <input type="hidden" name="dilihat" value="1">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{url('/wisata')}}" class="btn btn-primary" style=" text-decoration:none;">Kembali</a>
            </form>
        </div>
    </div>
@endsection
