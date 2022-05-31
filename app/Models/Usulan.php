<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usulan extends Model
{
    protected $table = 'usulan';
    protected $fillable = ['nama', 'nim', 'judul', 'tipe', 'anggota1', 'anggota2', 'anggota3', 'user_id', 'angkatan', 'status'];
    
    public function users()
    {
        return $this->belongsToMany(User::class,'usulan_user');
    }
}
