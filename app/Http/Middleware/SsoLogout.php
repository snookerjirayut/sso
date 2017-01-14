<?php

namespace App\Http\Middleware;

use Closure;

class SsoLogout
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($request->session()->has('sso')) {
            //
            $request->session()->forget('sso');

            return $next($request);
        }

        return $next($request);
    }
}
