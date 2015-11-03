<?php

namespace App\Http\Controllers;

use App\Pokemon;
use App\Comment;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PokemonController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$pokemon = Pokemon::all();

		return view('pokemon.index', compact('pokemon'));
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		$pokemon = Pokemon::findOrFail($id);
		$comments = Comment::where('pokemon_id', $id)->get();
			
		$newComment = new Comment;
			
		return view('pokemon.show', compact('pokemon', 'comments', 'newComment'));
	}

	public function search(Request $request)
	{
		$pokemon = Pokemon::all();
		$result = Pokemon::search($request->input('search'))->get(); 
		
		// return $request->input('search');
		return view('pokemon.search', compact('result'));
	}
}