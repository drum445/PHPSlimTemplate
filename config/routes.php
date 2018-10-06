<?php

// Allow options call on all routes
$app->options('/{routes:.+}', function ($request, $response, $args) {
    return $response;
});


$app->get('/', 'HomeController:landing');

$app->post('/person', 'PersonController:login');
$app->get('/person', 'PersonController:check');
$app->delete('/person', 'PersonController:logout');

$app->get('/customer', 'CustomerController:getAll');
