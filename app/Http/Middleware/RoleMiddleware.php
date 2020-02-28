<?php

namespace App\Http\Middleware;

use Closure;
use Sentinel;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
        if(Sentinel::check() && in_array(Sentinel::getUser()->roles()->first()->slug, explode('-', $role)))
        {
            return $next($request);
        }else{
            return redirect('/login');
        }    }
}
