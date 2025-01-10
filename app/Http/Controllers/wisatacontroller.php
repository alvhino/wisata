<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\wisata;
use App\Models\tipe;

class wisatacontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $wisata = Wisata::all(); // Data wisata
        $tipe = Tipe::all(); // Data tipe wisata
        return view('wisata.index', compact('wisata', 'tipe'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipe = Tipe::all(); // Ambil semua data tipe
        return view('wisata.create', compact('tipe'));
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
        'nama_wisata' => 'required|string|max:255',
        'deskripsi' => 'required',
        'sejarah' => 'required',
        'fasilitas' => 'required',
        'alamat' => 'required',
        'id_tipe' => 'required',
        'harga_tiket' => 'required|numeric',
        'img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    // Handle file upload
    if ($request->hasFile('img')) {
        $imageName = time() . '-' . $request->img->extension();
        $request->img->move(public_path('/foto'), $imageName);
    } else {
        $imageName = null; // Atur gambar default jika tidak ada upload
    }

    // Set default value for dilihat
    $dilihat = 1; // Set nilai dilihat default 0

    // Simpan data ke database
    wisata::create([
        'nama_wisata' => $request->nama_wisata,
        'deskripsi' => $request->deskripsi,
        'sejarah' => $request->sejarah,
        'fasilitas' => $request->fasilitas,
        'alamat' => $request->alamat,
        'id_tipe' => $request->id_tipe,
        'harga_tiket' => $request->harga_tiket,
        'img' => $imageName,
        'dilihat' => $dilihat, // Menggunakan nilai dilihat yang sudah didefinisikan
    ]);

    // Redirect ke halaman wisata dengan pesan sukses
    return redirect('/wisata');
}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
{
    $data = wisata::findOrFail($id);
   
    return view('wisata.detail', compact('data'));
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
        $wisata = wisata::findOrFail($id); // Ambil data wisata berdasarkan ID, gunakan findOrFail untuk error handling
        return view('wisata.edit', compact('tipe', 'wisata'));
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
        // Cari data wisata berdasarkan ID
        $wisata = wisata::find($id);
    
        // Validasi input
        $request->validate([
            'nama_wisata' => 'required|string|max:255',
            'deskripsi' => 'required',
            'sejarah' => 'required',
            'fasilitas' => 'required',
            'alamat' => 'required',
            'id_tipe' => 'required',
            'harga_tiket' => 'required|numeric',
            'dilihat' => 'required|numeric',
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // gambar opsional
        ]);
    
        if ($request->hasFile('img')) {
            $imageName = time() . '-' . $request->img->extension();
            $request->img->move(public_path('/foto'), $imageName);
        } else {
            $imageName = $wisata->img;
        }
    
        // Perbarui data wisata
        $wisata->update([
            'nama_wisata' => $request->nama_wisata,
            'deskripsi' => $request->deskripsi,
            'sejarah' => $request->sejarah,
            'fasilitas' => $request->fasilitas,
            'alamat' => $request->alamat,
            'id_tipe' => $request->id_tipe,
            'harga_tiket' => $request->harga_tiket,
            'dilihat' => $request->dilihat,
            'img' => $imageName,  // Gunakan gambar baru atau gambar lama
        ]);
    
        // Redirect ke halaman wisata dengan pesan sukses
        return redirect('/wisata');
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
        $wisata = wisata::find($id);
    
        // Jika data ditemukan
        if ($wisata) {
            // Hapus file gambar jika ada
            if ($wisata->img && file_exists(public_path('foto/' . $wisata->img))) {
                unlink(public_path('foto/' . $wisata->img));
            }
    
            // Hapus data dari database
            $wisata->delete();
    
            // Redirect ke halaman wisata dengan pesan sukses
            return redirect('wisata');
        }
    }
    
    public function showKategori($id_tipe)
{
    $wisata = Wisata::where('id_tipe', $id_tipe)->get(); // Filter wisata berdasarkan id_tipe
        $tipe = Tipe::all(); // Ambil semua tipe untuk dropdown
        $selectedTipe = Tipe::find($id_tipe); // Ambil tipe yang dipilih

        return view('wisata.kategori', compact('wisata', 'tipe', 'selectedTipe'));
}



}
