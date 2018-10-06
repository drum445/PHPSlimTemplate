<?php
$app = require __DIR__ . '/../config/bootstrap.php';


$all = $app->getContainer()->get('router')->getRoutes();

$GLOBALS['routes'] = [];
foreach ($all as $route) {
	$r = substr($route->getPattern(), 1);
	if($r != "{routes:.+}") {
		array_push($GLOBALS['routes'], $r);
	}
}

// Still return 404 and 405s
$app->map(['GET', 'POST', 'PUT', 'DELETE', 'PATCH'], '/{routes:.+}', function($request, $response) {
    $path = $request->getUri()->getPath();

    // if the request path is a registered route return a 405
    // as if it's got this far it hasn't been registered with that method
    // if path is not a route, 404
	if(!in_array($path, $GLOBALS['routes'])) {
	    $handler = $this->notFoundHandler;
	    return $handler($request, $response);
	} else {
	    $handler = $this->notAllowedHandler;
	    return $handler($request, $response);
	}
});

$app->run();