<?php

$app->get('/customer', function($request, $response) {
    $sql = "SELECT * FROM customer;";
    $stmt = $this->db->query($sql);
    $customers = $stmt->fetchAll();

    return $response->withJson($customers);
});
