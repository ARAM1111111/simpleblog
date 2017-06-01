<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
	//restricts colums from modifying
    protected $guarded = [];

    //post has many comments return all comments on that post
    public function comments(){
    	return $this->hasMany('App\Comments','on_post');
    }

    //return user who is author that post
    public function author(){
    	return $this->belongsTo('App\User','author_id');
    }
}
