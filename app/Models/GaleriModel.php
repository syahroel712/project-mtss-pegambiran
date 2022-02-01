<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GaleriModel extends Model
{
    protected $table = "tb_galeri";
    protected $primaryKey = 'galeri_id';
    protected $fillable = [
        'galeri_nama', 
        'galeri_foto', 
    ];
}
