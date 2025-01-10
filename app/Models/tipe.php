<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tipe extends Model
{
    use HasFactory;
    protected $table = 'tipe';
    protected $primaryKey = 'id_tipe';
    protected $fillable=array('nama_tipe');

    public function wisata()
    {
        return $this->hasMany(wisata::class,'id_tipe');
    }

    public function desa()
    {
        return $this->hasMany(desa::class,'id_tipe');
    }


    public function cafe()
    {
        return $this->hasMany(cafe::class,'id_tipe');
    }

    public function makanan()
    {
        return $this->hasMany(makanan::class,'id_tipe');
    }

}
