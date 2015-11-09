<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pokemon;
use App\Comment;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class CommentsController extends Controller
{
	function __construct()
	{
		$this->middleware('auth');
	}
	
	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request, $pokemon_id)
	{
		$user = $request->user();
		$pokemon = Pokemon::findOrFail($pokemon_id);
		$comment = new Comment($request->all());
		$comment->pokemon_id = $pokemon_id;
		$comment->user()->associate($request->user());
		$comment->save();

		return redirect()->route('pokemon.show', $comment->pokemon_id);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($pokemon_id, $id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($pokemon_id, $id)
	{
		$pokemon = Pokemon::findOrFail($pokemon_id);
		$comment = Comment::findOrFail($id);

		return view('comment.edit', compact('pokemon', 'comment'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $pokemon_id, $id)
	{
		$user = $request->user();
		$pokemon = Pokemon::findOrFail($pokemon_id);
		$comment = Comment::findOrFail($id);
		$comment->fill($request->all());
		$comment->save();

		return redirect()->route('pokemon.show', $comment->pokemon_id);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($pokemon_id, $id)
	{
		$comment = Comment::findOrFail($id);
		$pokemon_id = $comment->pokemon_id;
		$comment->delete();

		return redirect()->route('pokemon.show', $pokemon_id);
	}
}
