<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{

    protected $fillable = ['message','user_id','group_id'];

    protected $appends = ['selfMessage'];

    public function getSelfMessageAttribute()
    {
        return $this->user_id === auth()->user()->id;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}