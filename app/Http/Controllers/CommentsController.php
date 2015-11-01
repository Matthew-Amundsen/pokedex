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
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		$user = $request->user();
		$comment = new Comment($request->all());
		$comment->user()->associate($request->user());
		$comment->pokemon_id = 1;
		$comment->save();

		return redirect()->route('pokemon.show', $comment->pokemon_id);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{
		$comment = Comment::findOrFail($id);

		return view('comment.edit', compact('comment'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id)
	{
		$user = $request->user();
		$comment = Comment::findOrFail($id);
		$comment->fill($request->all());
		$comment->save();

		return redirect()->route('pokemon.show', $comment->pokemon_id);

		//Cant copy over an existing comments id.
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		$comment = Comment::findOrFail($id);
		$pokemon_id = $comment->pokemon_id;
		$comment->delete();

		return redirect()->route('pokemon.show', $pokemon_id);
	}
}
