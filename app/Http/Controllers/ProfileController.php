<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use App\User;
use App\Pokemon;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateProfileRequest;

class ProfileController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth', ['except' => ['show']]);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$user = User::findOrFail($id);
		return view('profile.show', compact('user'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @return Response
	 */
	public function edit()
	{
		$user = Auth::user();

		return view('profile.edit', compact('user'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  Request  $request
	 * @return Response
	 */
	public function update(UpdateProfileRequest $request)
	{
		$user = Auth::user();
		$user->fill($request->all());
		$user->password = bcrypt($request->input('password'));
		$user->save();

		return redirect()->route('home')->with('status.success', "Your profile has been updated.");
	}

	public function addPokemon(Request $request)
	{
		$user = Auth::user()->id;
		$slot = $request->input('slot');
		$pokemon = $request->input('id');

		User::addPokemon($user, $slot, $pokemon);
		// dd($user, $slot, $pokemon);
		return redirect()->route('home');
	}

	public function removePokemon(Request $request)
	{
		$user = Auth::user()->id;
		$slot = $request->input('slot');
		$pokemon = null;

		User::addPokemon($user, $slot, $pokemon);
		// dd($user, $slot, $pokemon);
		return redirect()->route('home');
	}
}