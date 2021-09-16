<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SettingBiaya extends Model
{
    use HasFactory;
    public $timestamps = false;
    public $incrementing = false;
    public $table = "setting";

    protected $primaryKey = 'nama';
    protected $fillable = [
        'nama',
        'nilai',
        'keterangan'
    ];
}
