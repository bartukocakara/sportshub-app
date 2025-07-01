<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class SetDefaultPerPage
{
    public function handle(Request $request, Closure $next)
    {
        // Eğer per_page query parametresi yoksa 15 olarak set et
        if (!$request->has('per_page')) {
            $request->merge(['per_page' => 15]);
        } else {
            // İstersen maksimum sınır koyabilirsin
            $perPage = (int) $request->input('per_page');
            $max = 100;
            if ($perPage > $max) {
                $request->merge(['per_page' => $max]);
            }
        }

        return $next($request);
    }
}
