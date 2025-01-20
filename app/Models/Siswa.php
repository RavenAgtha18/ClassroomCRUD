<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Kelas;
use App\Models\OrangTua;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    protected $table = 'students';

    protected $fillable = ['name','kelas', 'orang_tua_id'];
    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'kelas', 'kelas');
    }
    public function orangTua() // Ubah menjadi belongsTo
    {
        return $this->belongsTo(OrangTua::class, 'orang_tua_id');
    }
}
