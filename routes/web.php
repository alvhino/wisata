<?php
use App\Http\controller\logincontroller;
use App\Http\Controllers\WisataController;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\makananController;
use App\Http\Controllers\desaController;        
use App\Http\Controllers\cafeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/','App\Http\Controllers\dashboardcontroller@index');


Route::get('/template', function () {
    return view('template.main');
});


//dashboard
    Route::get('/dashboard/all_wisata', [dashboardcontroller::class, 'allWisata'])->name('dashboard.allWisata');
    Route::get('/dashboard/all_desa', [Dashboardcontroller::class, 'allDesa'])->name('desa.allDesa');
    Route::get('/dashboard/all_cafe', [dashboardcontroller::class, 'allCafe'])->name('cafe.allCafe');
    Route::get('/dashboard/all_makanan', [dashboardcontroller::class, 'allMakanan'])->name('makanan.allMakanan');
    Route::get('dashboard/all_wisata', [dashboardcontroller::class, 'allWisata'])->name('wisata.allWisata');
    route::get('/dashboard/kategori/{id_tipe}', 'App\Http\Controllers\dashboardcontroller@showKategori')->name('dashboard.kategori');
    route::get('/dashboard/detail_wisata/{id_wisata}', 'App\Http\Controllers\dashboardcontroller@showWisata')->name('dashboard.showWisata');
    route::get('/dashboard/detail_desa/{id_desa}', 'App\Http\Controllers\dashboardcontroller@showDesa')->name('dashboard.showDesa');
    route::get('/dashboard/detail_cafe/{id_cafe}', 'App\Http\Controllers\dashboardcontroller@showCafe')->name('dashboard.showCafe');
    route::get('/dashboard/detail_makanan/{id_makanan}', 'App\Http\Controllers\dashboardcontroller@showMakanan')->name('dashboard.showMakanan');
    Route::get('/kategori/{tipe}', [DashboardController::class, 'showkategori'])->name('dashboard.showkategori');


//wisata
    Route::get('/wisata', 'App\Http\Controllers\wisataController@index');
    route::get('/wisata/create','App\Http\Controllers\wisataController@create');
    route::post('/wisata/store', 'App\Http\Controllers\wisataController@store');
    route::get('/wisata/edit/{id}', 'App\Http\Controllers\wisataController@edit');
    route::post('/wisata/update/{id}', 'App\Http\Controllers\wisataController@update');
    route::get('/wisata/destroy/{id}', 'App\Http\Controllers\wisataController@destroy');
    route::get('/wisata/show/{id}', 'App\Http\Controllers\wisataController@show')->name('wisata.show');
    route::get('/wisata/kategori/{id_tipe}', 'App\Http\Controllers\wisataController@showKategori')->name('wisata.kategori');

//cafe
    Route::get('/cafe', 'App\Http\Controllers\cafeController@index');
    route::get('/cafe/create','App\Http\Controllers\cafeController@create');
    route::post('/cafe/store', 'App\Http\Controllers\cafeController@store');
    route::get('/cafe/edit/{id}', 'App\Http\Controllers\cafeController@edit');
    route::post('/cafe/update/{id}', 'App\Http\Controllers\cafeController@update');
    route::get('/cafe/destroy/{id}', 'App\Http\Controllers\cafeController@destroy');
    route::get('/cafe/show/{id}', 'App\Http\Controllers\cafeController@show')->name('cafe.show');
    route::get('/cafe/kategori/{tipe}', 'App\Http\Controllers\cafeController@showKategori')->name('cafe.kategori');

//desa
    Route::get('/desa', 'App\Http\Controllers\desaController@index');
    route::get('/desa/create','App\Http\Controllers\desaController@create');
    route::post('/desa/store', 'App\Http\Controllers\desaController@store');
    route::get('/desa/edit/{id}', 'App\Http\Controllers\desaController@edit');
    route::post('/desa/update/{id}', 'App\Http\Controllers\desaController@update');
    route::get('/desa/destroy/{id}', 'App\Http\Controllers\desaController@destroy');
    route::get('/desa/show/{id}', 'App\Http\Controllers\desaController@show')->name('desa.show');
    route::get('/desa/kategori/{tipe}', 'App\Http\Controllers\desaController@showKategori')->name('desa.kategori');

//makanan
    Route::get('/makanan', 'App\Http\Controllers\makanancontroller@index');
    route::get('/makanan/create','App\Http\Controllers\makanancontroller@create');
    route::post('/makanan/store', 'App\Http\Controllers\makanancontroller@store');
    route::get('/makanan/edit/{id_makanan}', 'App\Http\Controllers\makanancontroller@edit');
    route::post('/makanan/update/{id_makanan}', 'App\Http\Controllers\makanancontroller@update');
    route::get('/makanan/destroy/{id_makanan}', 'App\Http\Controllers\makanancontroller@destroy');
    route::get('/makanan/show/{id_makanan}', 'App\Http\Controllers\makanancontroller@show')->name('makanan.show');
    route::get('/makanan/kategori/{tipe}', 'App\Http\Controllers\makanancontroller@showKategori')->name('makanan.kategori');

// Login routes
    route::get('/auth','App\Http\Controllers\LoginController@index')->name('login');
    route::post('/login_proses','App\Http\Controllers\LoginController@login_proses');
    Route::middleware('auth')->group(function () {
    Route::get('wisata', [wisataController::class, 'index']); 
    Route::get('wisata/create', [wisataController::class, 'create']);
    Route::get('wisata/edit/{id_wisata}', [wisataController::class, 'edit']);
    Route::get('wisata/destroy/{id_wisata}', [wisataController::class, 'destroy']);
    Route::get('wisata/show/{id_wisata}', [wisataController::class, 'show']);
    Route::get('wisata/kategori/{id_wisata}', [wisataController::class, 'kategori']);
    route::get('/wisata/show/{id_wisata}', 'App\Http\Controllers\wisataController@show')->name('wisata.show');
    Route::get('desa', [desaController::class, 'index']); 
    Route::get('desa/create', [desaController::class, 'create']);
    Route::get('desa/edit/{id_desa}', [desaController::class, 'edit']);
    Route::get('desa/destroy/{id_desa}', [desaController::class, 'destroy']);
    Route::get('desa/show/{id_desa}', [desaController::class, 'show']);
    Route::get('desa/kategori/{id_desa}', [desaController::class, 'kategori']);
    route::get('/desa/show/{id_desa}', 'App\Http\Controllers\desaController@show')->name('desa.show');
    Route::get('cafe', [cafeController::class, 'index']); 
    Route::get('cafe/create', [cafeController::class, 'create']);
    Route::get('cafe/edit/{id_cafe}', [cafeController::class, 'edit']);
    Route::get('cafe/destroy/{id_cafe}', [cafeController::class, 'destroy']);
    Route::get('cafe/show/{id_cafe}', [cafeController::class, 'show']);
    Route::get('cafe/kategori/{id_cafe}', [cafeController::class, 'kategori']);
    route::get('/cafe/show/{id_cafe}', 'App\Http\Controllers\cafeController@show')->name('cafe.show');
    Route::get('makanan', [makananController::class, 'index']); 
    Route::get('makanan/create', [makananController::class, 'create']);
    Route::get('makanan/edit/{id_makanan}', [makananController::class, 'edit']);
    Route::get('makanan/destroy/{id_makanan}', [makananController::class, 'destroy']);
    Route::get('makanan/show/{id_makanan}', [makananController::class, 'show']);
    Route::get('makanan/kategori/{id_makanan}', [makananController::class, 'kategori']);
    route::get('/makanan/show/{id_makanan}', 'App\Http\Controllers\makananController@show')->name('makanan.show');
    
});

//logout
route::get('/logout','App\Http\Controllers\LoginController@logout')->name('/logout');

