<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminModel extends Model
{
    protected $table = "tb_admin";
    protected $primaryKey = 'admin_id';
    protected $fillable = [
        'admin_nama', 
        'admin_username', 
        'admin_password', 
        'admin_jk', 
        'admin_notelp', 
        'admin_alamat', 
    ];
}
