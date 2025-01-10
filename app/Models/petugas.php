<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class petugas extends Model
{
    use HasFactory;
    protected $table = 'petugas';
    protected $primaryKey = 'id';
    protected $fillable=array('username','password','remember_token');

    public $timestamps = false;
}
