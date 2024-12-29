<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle($request, Closure $next)
    {
        if (Auth::guard('court_business')->check()) {
            return $next($request);
        }

        return redirect('/court-business/login');
    }
}
