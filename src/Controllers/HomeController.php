<?php

namespace App\Controllers;

class HomeController extends Controller {

	public function landing($request, $response) {
	   $response->getBody()->write("Welcome");

	   return $response;
	}
}