<?php

namespace LaravelSocial\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckUsersPermission
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
        if( !Auth::check() || $request->user != Auth::id()){
            abort(403, 'Access denied.');
        }

        return $next($request);
    }
}
