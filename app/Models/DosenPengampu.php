<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DosenPengampu extends Model
{
    use HasFactory;
    public $timestamps = false;
    public $table = "dosen_pengampu";
    protected $fillable = [
        
    ];
}
