<?php

namespace App\Http\Middleware;

use Closure;

class IsAdministrator
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (auth()->user() && auth()->user()->role === 'ROLE_ADMINISTRATOR') {
            return $next($request);
        }

        return redirect()->route('welcome')->with('message', 'Brak uprawnień!');
    }
}
