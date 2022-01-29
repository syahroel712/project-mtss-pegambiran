<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KelasModel extends Model
{
    protected $table = "tb_kelas";
    protected $primaryKey = 'kelas_id';
    protected $fillable = [
        'kelas_nama', 
    ];
}
