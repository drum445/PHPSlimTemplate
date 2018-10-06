<?php

namespace App\Controllers;

class PersonController extends Controller {

	public function check($request, $response) {
	    if(isset($_SESSION["id"])) {
			return $response->withJson($this->getToken());
	    }

	    return $response->withStatus(401);		
	}

	public function login($request, $response) {
	    $body = $request->getParsedBody();

	    if($body["username"] == "drum") {
	        $_SESSION["id"] = $body["username"];
	        $_SESSION["username"] = $body["username"];
	        return $response->withJson($this->getToken());
	    }

	    return $response->withStatus(401);		
	}

	public function logout($request, $response) {
	    session_destroy();
	    return $response->withStatus(204);		
	}

	private function getToken() {
        return array(
                "token" => session_id(),
                "username" => $_SESSION["username"]
            );
	}
}