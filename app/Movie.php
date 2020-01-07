<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    //
    protected $primaryKey = 'movie_id';

    protected $fillable = [
        'title',
        'genre_id',
        'description',
        'rating',
        'image',
    ];
}
