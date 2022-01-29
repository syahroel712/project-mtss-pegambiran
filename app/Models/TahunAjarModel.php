<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TahunAjarModel extends Model
{
    protected $table = "tb_tahun_ajar";
    protected $primaryKey = 'tahun_ajar_id';
    protected $fillable = [
        'tahun_ajar_nama', 
    ];
}
