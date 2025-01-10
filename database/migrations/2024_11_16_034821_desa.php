<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Desa extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('desa', function (Blueprint $table) {
            $table->id('id_desa'); // Primary key dengan nama id_desa
            $table->string('nama_desa'); // Kolom nama_desa dengan tipe string
            $table->string('deskripsi'); // Kolom deskripsi dengan tipe string
            $table->string('sejarah'); // Kolom sejarah dengan tipe string
            $table->string('fasilitas'); // Kolom fasilitas dengan tipe string
            $table->integer('id_tipe');
            $table->string('img'); 
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
        Schema::dropIfExists('desa');
    }
}
