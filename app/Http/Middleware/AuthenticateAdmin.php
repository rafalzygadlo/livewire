<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Closure;
use Auth;

class AuthenticateAdmin extends Middleware
{
    
    
    public function handle($request, Closure $next, ...$guards)
    {
        if(!Auth::guard('admin')->check())
        {
            return redirect()->route('admin.login');
        }

        return $next($request);
    }
    
    
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            return route('admin.login');
        }
    }
}
