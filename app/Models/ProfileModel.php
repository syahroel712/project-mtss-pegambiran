<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfileModel extends Model
{
    protected $table = "tb_profile";
    protected $primaryKey = 'profile_id';
    protected $fillable = [
        'profile_nama', 
        'profile_slug', 
        'profile_tipe', 
        'profile_desk', 
    ];
}