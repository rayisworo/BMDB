<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    protected $primaryKey = 'comment_id';

    protected $fillable = [
        'movie_id',
        'user_id',
        'comment',
    ];

    
    public function movie(){
        return $this->hasOne('App\Movie','movie_id','movie_id');
    }
    public function user(){
        return $this->hasOne('App\User','user_id','user_id');
    }
}
