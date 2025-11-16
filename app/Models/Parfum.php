<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Parfum extends Model
{
    // Ini adalah satu-satunya deklarasi $fillable yang benar.
    protected $fillable = [
        'nama_parfum', 
        'foto', 
        'harga',
        'deskripsi', 
    ];

    protected $casts = [
        'harga' => 'decimal:2'
    ];
}