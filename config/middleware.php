<?php
// auth middleware
$app->add(function ($request, $response, callable $next) {
    $skip = ["", "person"];

    $path = $request->getUri()->getPath();
    $base = explode("/", $path, 2)[0];

    # if not auth'd and route requires auth: 401
    if(!isset($_SESSION["id"]) && !in_array($base, $skip)) {
        return $response->withStatus(401);
    }

    return $next($request, $response);
});

// trailing slash middleware
$app->add(function ($request, $response, callable $next) {
    $uri = $request->getUri();
    $path = $uri->getPath();
    if ($path != '/' && substr($path, -1) == '/') {
        // permanently redirect paths with a trailing slash
        // to their non-trailing counterpart
        $uri = $uri->withPath(substr($path, 0, -1));

        return $next($request->withUri($uri), $response);
    }

    return $next($request, $response);
});

// CORS
$app->add(function ($req, $res, $next) {
    $response = $next($req, $res);
    return $response
            ->withHeader('Access-Control-Allow-Origin', 'https://mysite.com')
            ->withHeader('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization')
            ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, PATCH, OPTIONS');
});