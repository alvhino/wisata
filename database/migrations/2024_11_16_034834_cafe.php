<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Cafe extends Migration
{
    /**
     * Run the migrations.
     *php
     * @return void
     */
    public function up()
    {
        Schema::create('cafe', function (Blueprint $table) {
            $table->id('id_cafe'); // Primary key dengan nama id_cafe
            $table->string('nama_cafe'); // Kolom nama_cafe dengan tipe string
            $table->string('deskripsi'); // Kolom deskripsi dengan tipe string
            $table->string('sejarah'); // Kolom sejarah dengan tipe string
            $table->string('fasilitas'); // Kolom fasilitas dengan tipe stringg
            $table->integer('id_tipe');
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
        Schema::dropIfExists('cafe');
    }
}
