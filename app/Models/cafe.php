<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cafe extends Model
{
    use HasFactory;
    protected $table = 'cafe';
    protected $primaryKey = 'id_cafe';
    protected $fillable=array('nama_cafe','deskripsi','fasilitas','jam_buka','jam_tutup','id_tipe','alamat','img','dilihat');

    public $timestamps = false;

    public function tipe(){
        return $this->belongsTo(tipe::class,'id_tipe');
    }
}
