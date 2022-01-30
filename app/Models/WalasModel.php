<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WalasModel extends Model
{
    protected $table = "tb_walas";
    protected $primaryKey = 'walas_id';
    protected $fillable = [
        'guru_id', 
        'kelas_id', 
        'tahun_ajar_id', 
    ];
}