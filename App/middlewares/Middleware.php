<?php

namespace App\middlewares;


class Middleware
{
    const MAP = [
        'guest' => Guest::class,
        'auth' => Auth::class,
        'verified' => Verified::class,
        'admin' => Admin::class
    ];
    public static function resolve($key)
    {
        if (!$key) {
            return;
        }
        $middleware = static::MAP[$key];
        // dd($middleware);

        (new $middleware)->handle();

        if (!$middleware) {
            throw new \Exception("No matching middleware found for key '{$key}'.");
        }
    }
}
