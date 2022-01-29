<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KepsekModel extends Model
{
    protected $table = "tb_kepsek";
    protected $primaryKey = 'kepsek_id';
    protected $fillable = [
        'guru_id', 
        'kepsek_tahun', 
    ];
}
