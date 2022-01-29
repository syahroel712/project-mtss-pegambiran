<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MapelModel extends Model
{
    protected $table = "tb_mapel";
    protected $primaryKey = 'mapel_id';
    protected $fillable = [
        'mapel_nama', 
    ];
}
