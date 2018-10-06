<?php

namespace App\Controllers;

class CustomerController extends Controller {

	public function getAll($request, $response) {
	    $sql = "SELECT * FROM customer;";
	    $stmt = $this->c->db->query($sql);
	    $customers = $stmt->fetchAll();

	    return $response->withJson($customers);
	}
}