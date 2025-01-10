<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\cafe;
use App\Models\tipe;


class cafeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['cafe'] = cafe::get();
        return view('cafe.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipe = Tipe::all(); // Ambil semua data tipe
        return view('cafe.create', compact('tipe'));
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
        'nama_cafe' => 'required|string|max:255',
        'deskripsi' => 'required',
        'fasilitas' => 'required',
        'jam_buka' => 'required',
        'jam_tutup' => 'required',
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
    cafe::create([
        'nama_cafe' => $request->nama_cafe,
        'deskripsi' => $request->deskripsi,
        'fasilitas' => $request->fasilitas,
        'jam_buka' => $request->jam_buka,
        'jam_tutup' => $request->jam_tutup,
        'alamat' => $request->alamat,
        'id_tipe' => $request->id_tipe,
        'img' => $imageName,
        'dilihat' => $dilihat,
    ]);

    // Redirect ke halaman cafe dengan pesan sukses
    return redirect('/cafe');
}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
{
    $data = cafe::findOrFail($id);
   
    return view('cafe.detail', compact('data'));
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
        $cafe = cafe::findOrFail($id); // Ambil data cafe berdasarkan ID, gunakan findOrFail untuk error handling
        return view('cafe.edit', compact('tipe', 'cafe'));
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
        // Cari data cafe berdasarkan ID
        $cafe = cafe::find($id);
    
        // Validasi input
        $request->validate([
            'nama_cafe' => 'required|string|max:255',
            'deskripsi' => 'required',
            'fasilitas' => 'required',
            'jam_buka' => 'required',
            'jam_tutup' => 'required',
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
            $imageName = $cafe->img;
        }
    
        // Perbarui data cafe
        $cafe->update([
            'nama_cafe' => $request->nama_cafe,
            'deskripsi' => $request->deskripsi,
            'fasilitas' => $request->fasilitas,
            'jam_buka' => $request->jam_buka,
            'jam_tutup' => $request->jam_tutup,
            'alamat' => $request->alamat,
            'id_tipe' => $request->id_tipe,
            'dilihat' => $request->dilihat,
            'img' => $imageName,  // Gunakan gambar baru atau gambar lama
        ]);
    
        // Redirect ke halaman cafe dengan pesan sukses
        return redirect('/cafe');
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
        $cafe = cafe::find($id);
    
        // Jika data ditemukan
        if ($cafe) {
            // Hapus file gambar jika ada
            if ($cafe->img && file_exists(public_path('foto/' . $cafe->img))) {
                unlink(public_path('foto/' . $cafe->img));
            }
    
            // Hapus data dari database
            $cafe->delete();
    
            // Redirect ke halaman cafe dengan pesan sukses
            return redirect('cafe');
        }
    }
    
    public function showKategori($id_tipe)
{
    $cafe = cafe::where('id_tipe', $id_tipe)->get(); 
    return view('cafe.kategori', compact('cafe', 'id_tipe'));
}



}
