<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class desa extends Model
{
    use HasFactory;
    protected $table = 'desa';
    protected $primaryKey = 'id_desa';
protected $fillable=array('nama_desa','deskripsi','sejarah','fasilitas','id_tipe','alamat','img','dilihat');

    public $timestamps = false;

    public function tipe(){
        return $this->belongsTo(tipe::class,'id_tipe');
    }
}
