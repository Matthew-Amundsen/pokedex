<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{

	protected $fillable = ['comment'];

	function user()
	{
		return $this->belongsTo('App\User');
	}

	function pokemon()
	{
		return $this->belongsTo('App\Pokemon');
	}
}
