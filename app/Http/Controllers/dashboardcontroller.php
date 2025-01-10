<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\wisata;
use App\Models\desa;
use App\Models\cafe;
use App\Models\makanan;
use App\Models\tipe;

class dashboardcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        $dataku['wisata'] = wisata::orderBy('dilihat', 'desc')->take(3)->get();
        $dataku['desa'] = desa::orderBy('dilihat', 'desc')->take(3)->get();
        $dataku['cafe'] = cafe::orderBy('dilihat', 'desc')->take(3)->get();
        $dataku['makanan'] = makanan::orderBy('dilihat', 'desc')->take(3)->get();

        return view('dashboard.index',$dataku); 
    }

    public function allWisata()
    {
        $wisata = Wisata::all(); // Data wisata
        $tipe = Tipe::all(); // Data tipe wisata
        return view('dashboard.all_wisata', compact('wisata', 'tipe'));
    }
    public function allDesa()
    {
        $desa = desa::all();
        return view('dashboard.all_desa', compact('desa'));
    }

    public function allCafe()
    {
        $cafe = cafe::all();
        return view('dashboard.all_cafe', compact('cafe'));
    }

    public function allMakanan()
    {
        $makanan = makanan::all();
        return view('dashboard.all_makanan', compact('makanan'));
    }



    public function showWisata($id)
{
    $data = wisata::findOrFail($id);
    $data->increment('dilihat');
    return view('dashboard.detail_wisata', compact('data'));
}

public function showDesa($id)
{
    $data = desa::findOrFail($id);
    $data->increment('dilihat');
    return view('dashboard.detail_desa', compact('data'));
}

public function showCafe($id)
{
    $data = cafe::findOrFail($id);
    $data->increment('dilihat');
    return view('dashboard.detail_cafe', compact('data'));
}

public function showMakanan($id)
{
    $data = makanan::findOrFail($id);
    $data->increment('dilihat');
    return view('dashboard.detail_makanan', compact('data'));
}

public function showKategori($id_tipe)
{
        $wisata = Wisata::where('id_tipe', $id_tipe)->get(); // Filter wisata berdasarkan id_tipe
        $tipe = Tipe::all(); // Ambil semua tipe untuk dropdown
        $selectedTipe = Tipe::find($id_tipe); // Ambil tipe yang dipilih

        return view('dashboard.kategori', compact('wisata', 'tipe', 'selectedTipe'));
}


}
