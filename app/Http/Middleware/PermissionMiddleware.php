<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class PermissionMiddleware {

    public function handle($request, Closure $next) {
        if (Auth::user()->hasRole('Admin')) //If user has admin role
        {
            return $next($request);
        }
        if (Auth::user()->hasRole('User')) //If user has user role
        {
            if ($request->is('employees/create'))//If user is creating a post
            {
                if (!Auth::user()->hasPermissionTo('addEmployee'))
                {
                   abort('401');
                }
                else {
                   return $next($request);
                }
            }
        }
        return $next($request);
    }
}
