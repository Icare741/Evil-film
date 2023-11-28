<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;


    protected $fillable = [
        'title',
        'release_date',
        'poster_path',
        'backdrop_path',
        'overview',
    ];

    protected $casts = [
        'release_date' => 'date',
    ];
}
