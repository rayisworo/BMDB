<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    //

    protected $primaryKey = 'message_id';

    protected $fillable = [
        'sender_id',
        'receiver_id',
        'message',
    ];

    
    public function sender(){
        return $this->hasOne('App\User','user_id','sender_id');
    }
    public function receiver(){
        return $this->hasOne('App\User','user_id','receiver_id');
    }
}
