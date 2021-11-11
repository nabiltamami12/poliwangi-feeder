<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perwalian extends Model
{
    use HasFactory;
    protected $table = 'perwalian';
    protected $primaryKey = 'id_perwalian';
    protected $fillable = ['periode_id', 'semester', 'mahasiswa_id', 'dosen_id', 'status'];
}
