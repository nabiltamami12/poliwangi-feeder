<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kuliah extends Model
{
    use HasFactory;
    public $timestamps = false;
    public $table = "kuliah";
    protected $fillable = [
        
    ];
}
