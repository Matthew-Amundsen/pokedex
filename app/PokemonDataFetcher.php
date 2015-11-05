<?php

namespace App;
use GuzzleHttp;

class PokemonDataFetcher {
	
	// GOTTA FETCH EM ALL

	const API_URL = "http://pokeapi.co/api/v1/pokemon/";

	public $id;

	public $data = null;

	public function __construct($id) {
		$this->id = intval($id);
	}

	public function fetch() {

		if ($this->data) {
			return $this->data;
		}
		
		$client = new GuzzleHttp\Client();
		
		$res = $client->get(static::API_URL . $this->id);
		
		$json = $res->getBody();

		$this->data = json_decode($json);

		return $this->data;
	}

}