<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class wisata extends Model
{
    use HasFactory;
    protected $table = 'wisata';
    protected $primaryKey = 'id_wisata';
protected $fillable=array('nama_wisata','deskripsi','sejarah','fasilitas','harga_tiket','id_tipe','alamat','img','dilihat');

    public $timestamps = false;
    public function tipe(){
        return $this->belongsTo(tipe::class,'id_tipe');
    }
}

