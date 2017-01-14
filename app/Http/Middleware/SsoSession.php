<?php

namespace App\Http\Middleware;

use Closure;

class SsoSession
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
            $token = $request->session()->get('sso');
            $uri = $request->input('redirect_url');

            if(!isset($uri) || $uri == '')
            {
                $uri = $request->path();
            }

            return $this->redirectWithToken($uri ,$token);
        }
        
        return $next($request);
    }

    private function redirectWithToken($url , $token)
    {
        if (strpos($url , '?'))
        {
            $url = $url.'&token='. $token[0];
        } 
        else
        {
            $url = $url.'?token='. $token[0];
        }
        return redirect($url);
    }
}
