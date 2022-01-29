<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SemesterModel extends Model
{
    protected $table = "tb_semester";
    protected $primaryKey = 'semester_id';
    protected $fillable = [
        'semester_nama', 
    ];
}
