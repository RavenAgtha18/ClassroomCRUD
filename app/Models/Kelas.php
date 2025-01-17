<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Guru;
use App\Models\Siswa;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kelas extends Model
{
    use HasFactory;

    protected $table = 'kelas';

    protected $fillable = ['kelas'];
    public function gurus()
    {
        return $this->hasMany(Guru::class, 'kelas', 'kelas');
    }

    public function siswas()
    {
        return $this->hasMany(Siswa::class, 'kelas', 'kelas');
    }
}
