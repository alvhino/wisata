<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Makanan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('makanan', function (Blueprint $table) {
            $table->id('id_makanan'); // Primary key dengan nama id_makanan
            $table->string('nama_makanan'); // Kolom nama_makanan dengan tipe string
            $table->string('deskripsi'); // Kolom deskripsi dengan tipe string
            $table->string('sejarah'); // Kolom sejarah dengan tipe string
            $table->string('harga'); // Kolom harga dengan tipe string
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
        Schema::dropIfExists('makanan');
    }
}
