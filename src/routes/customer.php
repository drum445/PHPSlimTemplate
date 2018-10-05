<?php

require_once __DIR__ . '/../handlers/customer.php';

$app->get('/customer', function($request, $response) {
	$customers = CustomerHandler::getAll($this->db);

    return $response->withJson($customers);
});
