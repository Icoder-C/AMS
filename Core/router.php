<?php

$uri=parse_url($_SERVER['REQUEST_URI'])["path"];

$routes=[
    '/'=> basePath('/App/controllers/index.php'),
    '/sign-in'=> basePath('/App/controllers/sign-in.php'),
    '/sign-up'=> basePath('/App/controllers/sign-up.php'),
];

function routeToController($uri, $routes)
{
    if (array_key_exists($uri, $routes)) {
        require $routes[$uri];
    } else {
        abort();
    }
}

function abort($code = 404)
{
    http_response_code($code);

    require view("errors/{$code}");

    die();
}

routeToController($uri, $routes);

