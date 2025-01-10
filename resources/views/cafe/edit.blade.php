@extends('template.main')

@section('title', 'Edit Data cafe')

@section('content')
    <h1 class="text-center mb-4">Edit Data cafe</h1>
    
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form action="{{ url('/cafe/update/' . $cafe->id_cafe) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="nama_cafe" class="form-label">Nama cafe</label>
                    <input type="text" class="form-control " id="nama_cafe" name="nama_cafe" value="{{ $cafe->nama_cafe }}" required>
                </div>
                <div class="mb-3">
                    <label for="deskripsi" class="form-label">Deskripsi</label>
                    <textarea class="form-control " id="deskripsi" name="deskripsi" rows="3" required>{{ $cafe->deskripsi }}</textarea>
        
                </div>
                <div class="mb-3">
                    <label for="fasilitas" class="form-label">Fasilitas</label>
                    <textarea class="form-control " id="fasilitas" name="fasilitas" rows="3" required>{{ $cafe->fasilitas }}</textarea>
                </div>
                <div class="mb-3">
                    <label for="jam_buka" class="form-label">Nama cafe</label>
                    <input type="time" class="form-control " id="jam_buka" name="jam_buka" value="{{ $cafe->jam_buka }}" required>
                </div>
                <div class="mb-3">
                    <label for="jam_tutup" class="form-label">Nama cafe</label>
                    <input type="time" class="form-control " id="jam_tutup" name="jam_tutup" value="{{ $cafe->jam_tutup }}" required>
                </div>
                <div class="mb-3">
                    <label for="alamat" class="form-label">alamat</label>
                    <textarea class="form-control " id="alamat" name="alamat" rows="3" required>{{ $cafe->alamat }}</textarea>
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
                    <label for="dilihat" class="form-label">Berapa kali dilihat</label>
                    <input type="number" class="form-control " id="dilihat" name="dilihat" value="{{ $cafe->dilihat }}" required>
                 
                </div>
        <div class="mb-3">~
                    <label for="img" class="form-label">Upload Gambar</label>
                    <input type="file" class="form-control" id="img" name="img" accept="image/*">
                    <small class="form-text text-muted">Biarkan kosong jika tidak ingin mengganti gambar.</small>
                   
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{url('/cafe')}}" class="btn btn-primary" style=" text-decoration:none;">Kembali</a>
            </form>
        </div>
    </div>
@endsection
