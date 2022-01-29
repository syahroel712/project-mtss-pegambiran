<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WalasSiswaModel extends Model
{
    protected $table = "tb_walas_siswa";
    protected $primaryKey = 'walas_siswa_id';
    protected $fillable = [
        'walas_id', 
        'siswa_id', 
    ];
}