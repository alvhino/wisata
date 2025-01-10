@extends('template.main')

@section('title', 'Edit Data desa')

@section('content')
    <h1 class="text-center mb-4">Edit Data desa</h1>
    
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form action="{{ url('/desa/update/' . $desa->id_desa) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
               
                    <label for="nama_desa" class="form-label">Nama desa</label>
                    <input type="text" class="form-control " id="nama_desa" name="nama_desa" value="{{ $desa->nama_desa }}" required>
                </div>
                <div class="mb-3">
                    <label for="deskripsi" class="form-label">Deskripsi</label>
                    <textarea class="form-control " id="deskripsi" name="deskripsi" rows="3" required>{{ $desa->deskripsi }}</textarea>
        
                </div>
                <div class="mb-3">
                    <label for="sejarah" class="form-label">Sejarah</label>
                    <textarea class="form-control " id="sejarah" name="sejarah" rows="3" required>{{ $desa->sejarah }}</textarea>

                </div>
                <div class="mb-3">
                    <label for="fasilitas" class="form-label">Fasilitas</label>
                    <textarea class="form-control " id="fasilitas" name="fasilitas" rows="3" required>{{ $desa->fasilitas }}</textarea>
                   
                </div>
                <div class="mb-3">
                    <label for="alamat" class="form-label">alamat</label>
                    <textarea class="form-control " id="alamat" name="alamat" rows="3" required>{{ $desa->alamat }}</textarea>
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
                    <input type="number" class="form-control " id="dilihat" name="dilihat" value="{{ $desa->dilihat }}" required>
                 
                </div>
        <div class="mb-3">~
                    <label for="img" class="form-label">Upload Gambar</label>
                    <input type="file" class="form-control" id="img" name="img" accept="image/*">
                    <small class="form-text text-muted">Biarkan kosong jika tidak ingin mengganti gambar.</small>
                   
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{url('/desa')}}" class="btn btn-primary" style=" text-decoration:none;">Kembali</a>
            </form>
        </div>
    </div>
@endsection
