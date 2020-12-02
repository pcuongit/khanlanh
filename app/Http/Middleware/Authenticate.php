<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        $requestUri = $request->getRequestURI();
        $isAJAX = strpos($requestUri, 'adminstrator/ajax');
        if (!$request->expectsJson()) {
            if(!$isAJAX)
                return route('adminstrator.login.index');
            else
                abort(403);
        }
    }
}