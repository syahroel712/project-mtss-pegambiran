<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SliderModel extends Model
{
    protected $table = "tb_slider";
    protected $primaryKey = 'slider_id';
    protected $fillable = [
        'slider_nama', 
        'slider_foto', 
    ];
}