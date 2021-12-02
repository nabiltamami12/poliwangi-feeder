<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prodi extends Model
{
    use HasFactory;
    public $timestamps = false;
    public $table = "program_studi";
    protected $primaryKey = 'nomor';
    protected $fillable = [
        'nomor',
        'program',
        'program_studi',
        'kepala',
        'kode_epsbed',
        'jurusan',
        'alias'
    ];

    public function rProgram()
    {
        return $this->belongsTo(Program::class, 'program', 'nomor');
    }
}
