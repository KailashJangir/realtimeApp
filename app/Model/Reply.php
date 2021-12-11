<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    public function question(){
    	return $this->belongsTo(Question::class);
    }

    public function like(){
    	retirn $this->hasMany(Like::class);
    }

    public function user(){
    	$this->belongsTo(user::class);
    }
}
