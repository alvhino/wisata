@extends('template.main')

@section('title', 'Edit Data makanan')

@section('content')
    <h1 class="text-center mb-4">Edit Data makanan</h1>
    
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form action="{{ url('/makanan/update/' . $makanan->id_makanan) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
               
                    <label for="nama_makanan" class="form-label">Nama makanan</label>
                    <input type="text" class="form-control " id="nama_makanan" name="nama_makanan" value="{{ $makanan->nama_makanan }}" required>
                </div>
                <div class="mb-3">
                    <label for="deskripsi" class="form-label">Deskripsi</label>
                    <textarea class="form-control " id="deskripsi" name="deskripsi" rows="3" required>{{ $makanan->deskripsi }}</textarea>
        
                </div>
                <div class="mb-3">
                    <label for="sejarah" class="form-label">Sejarah</label>
                    <textarea class="form-control " id="sejarah" name="sejarah" rows="3" required>{{ $makanan->sejarah }}</textarea>

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
                    <input type="number" class="form-control " id="harga" name="harga" value="{{ $makanan->harga }}" required>
                 
                </div>
                <div class="mb-3">
                    <label for="bahan" class="form-label">Bahan Bahan</label>
                    <textarea class="form-control " id="bahan" name="bahan" rows="3" required>{{ $makanan->bahan }}</textarea>
        
                </div>
                <div class="mb-3">
                    <label for="dilihat" class="form-label">Berapa kali dilihat</label>
                    <input type="number" class="form-control " id="dilihat" name="dilihat" value="{{ $makanan->dilihat }}" required>
                 
                </div>
        <div class="mb-3">~
                    <label for="img" class="form-label">Upload Gambar</label>
                    <input type="file" class="form-control" id="img" name="img" accept="image/*">
                    <small class="form-text text-muted">Biarkan kosong jika tidak ingin mengganti gambar.</small>
                   
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{url('/makanan')}}" class="btn btn-primary" style=" text-decoration:none;">Kembali</a>
            </form>
        </div>
    </div>
@endsection
