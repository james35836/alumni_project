<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class announcement extends Model
{
    protected $fillable = ['picture','group_id','user_id','content'];


   public function setFirstNameAttribute($value)
    {
        $this->attributes['first_name'] = "llll";
    }

	public function getFullNameAttribute()
	{
	    return "{$this->created_at} {$this->last_name}";
	}

	public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function group()
    {
        return $this->hasMany(Group::class);
    }
}
