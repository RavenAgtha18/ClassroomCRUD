<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OrangTua extends Model
{
    use HasFactory;
    protected $table = "orang_tuas";
    protected $fillable = ['name'];
}
