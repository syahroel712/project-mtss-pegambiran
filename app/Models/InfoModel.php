<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InfoModel extends Model
{
    protected $table = "tb_info";
    protected $primaryKey = 'info_id';
    protected $fillable = [
        'info_judul', 
        'info_slug', 
        'info_tipe', 
        'info_tipe_slug', 
        'info_foto', 
        'info_desk', 
        'info_tgl', 
    ];
}