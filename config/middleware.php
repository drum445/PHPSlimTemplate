<?php
// auth middleware
$app->add(function ($request, $response, callable $next) {
    $uri = $request->getUri();
    $path = $uri->getPath();

    # if not auth'd and route requires auth: 401
    if(!isset($_SESSION["id"]) && !can_skip($path)) {
        return $response->withStatus(401);
    }

    return $next($request, $response);
});

function can_skip($path) {
    # paths that do not need auth
    $skip = ["", "person"];

    $arr = explode("/", $path, 2);
    $base = $arr[0];

    return in_array($base, $skip);
}


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