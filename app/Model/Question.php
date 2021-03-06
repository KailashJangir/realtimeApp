<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\User; 
use App\Model\Reply;
use App\Model\Category;

class Question extends Model
{
	/*public function getRouteKeyname();{
		return 'slug';
	}*/

	protected $fillable = ["title", "slug", "body", "category_id", "user_id"];
	//protected $guarded = [];

    protected $with = ['replies'];

    public function user(){
    	return $this->belongsTo(User::class);
    }

    public function replies(){
    	return $this->hasMany(Reply::class);
    }

    public function category(){
    	return $this->belongsTo(Category::class);
    }
    public function getPathAttribute(){
    	return "/question/$this->id";
    }
}
