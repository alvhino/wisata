<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
       <div class="row justify-content-center">
        <div class="col-md-8">
            <form action="{{ url('/tipe/store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="id_tipe" class="form-label">id tipe</label>
                    <input type="text" class="form-control @error('id_tipe') is-invalid @enderror" id="id_tipe" name="id_tipe" required>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{url('/tipe')}}" class="btn btn-primary" style=" text-decoration:none;">Kembali</a>
            </form>
        </div>
    </div>
</body>
</html>
 