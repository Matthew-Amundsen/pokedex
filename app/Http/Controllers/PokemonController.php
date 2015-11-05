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

	// private function addWeatherConditionToView()
	// {
	// 	$condition = Cache::get('weatherCondition', function() {
	// 		return $this->updateWeatherConditionCache();
	// 	});

	// 	view()->share('weatherCondition', $condition->text);
	// 	view()->share('weatherTemp', $condition->temp);
	// }

	// private function updateWeatherConditionCache()
	// {
	// 	$client = new GuzzleHttp\Client();
	// 	$weatherUrl = "https://query.yahooapis.com/v1/public/yql?q=select%20*%20from%20weather.forecast%20where%20woeid%20in%20(select%20woeid%20from%20geo.places(1)%20where%20text%3D%22Wellington%2C%20New%20Zealand%22)%20and%20u%3D%22c%22&format=json&env=store%3A%2F%2Fdatatables.org%2Falltableswithkeys&callback=";
	// 	$res = $client->get($weatherUrl);
	// 	$json = $res->getBody();
	// 	$weatherData = json_decode($json);
	// 	$condition = $weatherData->query->results->channel->item->condition;
	// 	Debugbar::info('Updated Weather from Yahoo API', $condition);
	// 	Cache::put('weatherCondition', $condition, 30);

	// 	return $condition;
	// }
}