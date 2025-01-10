<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class makanan extends Model
{
    use HasFactory;
    protected $table = 'makanan';
    protected $primaryKey = 'id_makanan';
protected $fillable=array('nama_makanan','deskripsi','sejarah','harga','bahan','id_tipe','img','dilihat');

    public $timestamps = false;

    public function tipe(){
        return $this->belongsTo(tipe::class,'id_tipe');
    }
}
