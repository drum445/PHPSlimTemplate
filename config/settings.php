<?php

$settings = [];

// Slim settings
$settings['displayErrorDetails'] = true;
$settings['determineRouteBeforeAppMiddleware'] = true;

// Path settings
$settings['root'] = dirname(__DIR__);
$settings['temp'] = $settings['root'] . '/tmp';
$settings['public'] = $settings['root'] . '/public';

$settings['db']['host']   = 'localhost';
$settings['db']['user']   = 'root';
$settings['db']['pass']   = 'password';
$settings['db']['dbname'] = 'slimapp';

return $settings;