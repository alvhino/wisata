<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\desa;
use App\Models\tipe;


class desaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['desa'] = desa::get();
        return view('desa.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipe = Tipe::all(); // Ambil semua data tipe
        return view('desa.create', compact('tipe'));
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
        'nama_desa' => 'required|string|max:255',
        'deskripsi' => 'required',
        'sejarah' => 'required',
        'fasilitas' => 'required',
        'alamat' => 'required',
        'id_tipe' => 'required',
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
    desa::create([
        'nama_desa' => $request->nama_desa,
        'deskripsi' => $request->deskripsi,
        'sejarah' => $request->sejarah,
        'fasilitas' => $request->fasilitas,
        'alamat' => $request->alamat,
        'id_tipe' => $request->id_tipe,
        'img' => $imageName,
        'dilihat' => $dilihat, // Menggunakan nilai dilihat yang sudah didefinisikan
    ]);

    // Redirect ke halaman desa dengan pesan sukses
    return redirect('/desa');
}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
{
    $data = desa::findOrFail($id);
   
    return view('desa.detail', compact('data'));
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
        $desa = desa::findOrFail($id); // Ambil data desa berdasarkan ID, gunakan findOrFail untuk error handling
        return view('desa.edit', compact('tipe', 'desa'));
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
        // Cari data desa berdasarkan ID
        $desa = desa::find($id);
    
        // Validasi input
        $request->validate([
            'nama_desa' => 'required|string|max:255',
            'deskripsi' => 'required',
            'sejarah' => 'required',
            'fasilitas' => 'required',
            'alamat' => 'required',
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
            $imageName = $desa->img;
        }
    
        // Perbarui data desa
        $desa->update([
            'nama_desa' => $request->nama_desa,
            'deskripsi' => $request->deskripsi,
            'sejarah' => $request->sejarah,
            'fasilitas' => $request->fasilitas,
            'alamat' => $request->alamat,
            'id_tipe' => $request->id_tipe,
            'dilihat' => $request->dilihat,
            'img' => $imageName,  // Gunakan gambar baru atau gambar lama
        ]);
    
        // Redirect ke halaman desa dengan pesan sukses
        return redirect('/desa');
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
        $desa = desa::find($id);
    
        // Jika data ditemukan
        if ($desa) {
            // Hapus file gambar jika ada
            if ($desa->img && file_exists(public_path('foto/' . $desa->img))) {
                unlink(public_path('foto/' . $desa->img));
            }
    
            // Hapus data dari database
            $desa->delete();
    
            // Redirect ke halaman desa dengan pesan sukses
            return redirect('desa');
        }
    }
    
    public function showKategori($id_tipe)
{
    $desa = desa::where('id_tipe', $id_tipe)->get(); 
    return view('desa.kategori', compact('desa', 'id_tipe'));
}



}
