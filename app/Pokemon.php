<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pokemon extends Model
{

	protected $table = "pokemon";

	public function comments()
	{
		return $this->hasMany(Comment::class);
	}
}
