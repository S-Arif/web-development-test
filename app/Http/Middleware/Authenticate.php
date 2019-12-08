<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string
     */
    protected function redirectTo($request)
    {
        $middleware = request()->route()->gatherMiddleware();

        $guard = 'web';

        foreach($middleware as $m)
            if(preg_match("/auth:/",$m))
                list($mid, $guard) = explode(":",$m);

        if (! $request->expectsJson()) {
            switch($guard) {
                case 'admin':
                    $route = 'admin.login';
                    break;
                default:
                    $route = 'login';
                    break;
            }

            return route($route);
        }
    }
}
