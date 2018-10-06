<?php

namespace App\Controllers;

class PersonController extends Controller {

	public function check($request, $response) {
	    if(isset($_SESSION["id"])) {
	        $resp = array(
	                        "token" => session_id(),
	                        "username" => $_SESSION["username"]
	                    );

	        return $response->withJson($resp);
	    }

	    return $response->withStatus(401);		
	}

	public function login($request, $response) {
	    $body = $request->getParsedBody();

	    if($body["username"] == "drum") {
	        $_SESSION["id"] = $body["username"];
	        $_SESSION["username"] = $body["username"];
	        return $response->withStatus(204);
	    }

	    return $response->withStatus(401);		
	}

	public function logout($request, $response) {
	    session_destroy();
	    return $response->withStatus(204);		
	}
}