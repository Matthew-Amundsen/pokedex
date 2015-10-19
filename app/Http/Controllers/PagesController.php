<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class PagesController extends Controller
{
	function home() {
		return view('home');
	}

	function pokemon() {
		return view('pokemon');
	}

	function search() {
		return view('search');
	}
}