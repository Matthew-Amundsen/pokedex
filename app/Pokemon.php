<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Sofa\Eloquence\Eloquence;

class Pokemon extends Model
{

	use Eloquence;

	protected $fillable = ['pokemon'];

	protected $searchableColumns = [
		'name' => 10,
		'type_1' => 8,
		'type_2' => 5,
	];

	protected $table = "pokemon";

	public function comments()
	{
		return $this->hasMany(Comment::class);
	}
}
