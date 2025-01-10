<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\makanan;
use App\Models\tipe;


class makanancontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *  
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['makanan'] = Makanan::with('tipe')->get();
        return view('makanan.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipe = Tipe::all(); // Ambil semua data tipe
        return view('makanan.create', compact('tipe'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
{
    // Validasi input
    $request->validate([
        'nama_makanan' => 'required|string|max:255',
        'deskripsi' => 'required',
        'sejarah' => 'required',
        'harga' => 'required',
        'bahan' => 'required',
        'id_tipe' => 'required',
        'img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    if ($request->hasFile('img')) {
        $imageName = time() . '-' . $request->img->extension();
        $request->img->move(public_path('/foto'), $imageName);
    } else {
        $imageName = null;
    }

    // Set default value for dilihat
    $dilihat = 1; // Set nilai dilihat default 0

    // Simpan data ke database
    makanan::create([
        'nama_makanan' => $request->nama_makanan,
        'deskripsi' => $request->deskripsi,
        'sejarah' => $request->sejarah,
        'harga' => $request->harga,
        'bahan' => $request->bahan,
        'id_tipe' => $request->id_tipe,
        'img' => $imageName,
        'dilihat' => $dilihat, // Menggunakan nilai dilihat yang sudah didefinisikan
    ]);

    // Redirect ke halaman makanan dengan pesan sukses
    return redirect('/makanan');
}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
{
    $data = makanan::findOrFail($id);
   
    return view('makanan.detail', compact('data'));
}



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
{
    $tipe = Tipe::all(); // Ambil semua data tipe
    $makanan = makanan::findOrFail($id); // Ambil data makanan berdasarkan ID, gunakan findOrFail untuk error handling
    return view('makanan.edit', compact('tipe', 'makanan')); // Kirim kedua variabel ke view
}

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Cari data makanan berdasarkan ID
        $makanan = makanan::find($id);
    
        // Validasi input
        $request->validate([
            'nama_makanan' => 'required|string|max:255',
            'deskripsi' => 'required',
            'sejarah' => 'required',
            'harga' => 'required',
            'bahan' => 'required',
            'id_tipe' => 'required',
            'dilihat' => 'required|numeric',
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // gambar opsional
        ]);
    
        // Jika ada gambar yang diunggah, simpan gambar baru
        if ($request->hasFile('img')) {
            // Generate nama gambar baru dan simpan file
            $imageName = time() . '-' . $request->img->extension();
            $request->img->move(public_path('/foto'), $imageName);
        } else {
            // Jika tidak ada gambar baru, gunakan gambar lama yang sudah ada
            $imageName = $makanan->img;
        }
    
        // Perbarui data makanan
        $makanan->update([
            'nama_makanan' => $request->nama_makanan,
            'deskripsi' => $request->deskripsi,
            'sejarah' => $request->sejarah,
            'harga' => $request->harga,
            'bahan' => $request->bahan,
            'id_tipe' => $request->id_tipe,
            'dilihat' => $request->dilihat,
            'img' => $imageName,  // Gunakan gambar baru atau gambar lama
        ]);
    
        // Redirect ke halaman makanan dengan pesan sukses
        return redirect('/makanan');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Temukan data berdasarkan ID
        $makanan = makanan::find($id);
    
        // Jika data ditemukan
        if ($makanan) {
            // Hapus file gambar jika ada
            if ($makanan->img && file_exists(public_path('foto/' . $makanan->img))) {
                unlink(public_path('foto/' . $makanan->img));
            }
    
            // Hapus data dari database
            $makanan->delete();
    
            // Redirect ke halaman makanan dengan pesan sukses
            return redirect('makanan');
        }
    }
    
    public function showKategori($tipe)
{
    $makanan = makanan::where('tipe', $tipe)->get(); 
    return view('makanan.kategori', compact('makanan', 'tipe'));
}



}
