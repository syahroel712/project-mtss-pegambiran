<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GuruModel extends Model
{
    protected $table = "tb_guru";
    protected $primaryKey = 'guru_id';
    protected $fillable = [
        'guru_nip', 
        'guru_nama', 
        'guru_tgl_lahir', 
        'guru_jk', 
        'guru_notelp', 
        'guru_alamat', 
        'guru_username', 
        'guru_password', 
        'guru_jabatan', 
        'guru_status', 
        'id_mapel', 
    ];
}
