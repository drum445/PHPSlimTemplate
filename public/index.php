<?php
$app = require __DIR__ . '/../config/bootstrap.php';

// Allow options call on all routes
$app->options('/{routes:.+}', function ($request, $response, $args) {
    return $response;
});

// Routes
require '../src/routes/home.php';
require '../src/routes/customer.php';
require '../src/routes/person.php';

// Still return 404s
$app->map(['GET', 'POST', 'PUT', 'DELETE', 'PATCH'], '/{routes:.+}', function($req, $res) {
    $handler = $this->notFoundHandler;
    return $handler($req, $res);
});

$app->run();
