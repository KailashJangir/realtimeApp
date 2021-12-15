<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Like;
use App\Model\Question;
use App\User;

class Reply extends Model
{
    /*protected static function boot()
    {
        parent::boot();

        static::creating(function ($relpy) {
            $reply->user_id = auth()->id();
        });
    }*/
	protected $guarded = [];

    public function question(){
    	return $this->belongsTo(Question::class);
    }

    public function like(){
    	return $this->hasMany(Like::class);
    }

    public function user(){
    	return $this->belongsTo(User::class);
    }
}
