<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kurikulum extends Model
{
    use HasFactory;
    public $timestamps = false;
    public $table = "kurikulum";
    protected $fillable = [
        'id',
        'kurikulum',
        'status',
    ];
}
