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

$app->run();
