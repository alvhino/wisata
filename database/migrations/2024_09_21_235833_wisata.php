<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class wisata extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wisata', function (Blueprint $table) {
            $table->id('id_wisata'); // Primary key dengan nama id_wisata
            $table->string('nama_wisata'); // Kolom nama_wisata dengan tipe string
            $table->string('deskripsi'); // Kolom deskripsi dengan tipe string
            $table->string('sejarah'); // Kolom sejarah dengan tipe string
            $table->string('fasilitas'); // Kolom fasilitas dengan tipe string
            $table->string('harga_tiket'); // Kolom harga_tiket dengan tipe string
            $table->integer('id_tipe'); // Kolom harga_tiket dengan tipe string
            $table->string('img'); // Kolom harga_tiket dengan tipe string
            $table->integer('dilihat')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('wisata');
    }
}
