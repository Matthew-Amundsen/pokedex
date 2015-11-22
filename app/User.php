<?php

namespace App;

use App\Pokemon;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract,
									AuthorizableContract,
									CanResetPasswordContract
{
	use Authenticatable, Authorizable, CanResetPassword;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['name', 'email', 'password', 'team_slot_1', 'team_slot_2', 'team_slot_3', 'team_slot_4', 'team_slot_5', 'team_slot_6',];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['password', 'remember_token'];

	public function team_slot($id) {
		return $this->belongsTo(Pokemon::class, 'team_slot_' . $id);
	}

	public function team_slot_1() {
		return $this->team_slot(1);
	}
	public function team_slot_2() {
		return $this->team_slot(2);
	}
	public function team_slot_3() {
		return $this->team_slot(3);
	}
	public function team_slot_4() {
		return $this->team_slot(4);
	}
	public function team_slot_5() {
		return $this->team_slot(5);
	}
	public function team_slot_6() {
		return $this->team_slot(6);
	}

	static public function addPokemon($user, $slot, $pokemon)
	{
		$newSlot = 'team_slot_' . $slot;
		$currentUser = User::findOrFail($user);
		$currentUser->$newSlot = $pokemon;
		$currentUser->save();
	}

	public static function getPokemon($id)
	{
		$allPokemon = [];
		$currentUser = User::findOrFail($id);
		
		for($i = 1; $i < 7; $i ++) {
			if($currentUser->{"team_slot_" . $i}) {
				$pokemon = Pokemon::findOrFail($currentUser->{"team_slot_" . $i});
			}
			else {
				$pokemon = null;
			}
			array_push($allPokemon, $pokemon);
		}
		return $allPokemon;
	}
}
