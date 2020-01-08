<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    //
    protected $primaryKey = 'movie_id';

    protected $fillable = [
        'user_id',
        'title',
        'genre_id',
        'description',
        'rating',
        'image',
    ];

    
    public function genre(){
        return $this->hasOne('App\Genre','genre_id','genre_id');
    }
    public function user(){
        return $this->hasOne('App\User','user_id','user_id');
    }
}
