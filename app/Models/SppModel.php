<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SppModel extends Model
{
    protected $table = "tb_spp";
    protected $primaryKey = 'spp_id';
    protected $fillable = [
        'spp_id',
        'siswa_id', 
        'kelas_id', 
        'tahun_ajar_id', 
        'spp_tgl_bayar', 
        'spp_bayar', 
    ];
}