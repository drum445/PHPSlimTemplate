<?php

$app->get('/', function ($request, $response) {
   $response->getBody()->write("Welcome");

    return $response;
});