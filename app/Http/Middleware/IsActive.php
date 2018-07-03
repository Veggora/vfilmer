<?php

namespace App\Http\Middleware;

use Closure;

class IsActive
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
        if (auth()->check() && auth()->user()->is_banned){
            auth()->logout();
            return redirect()->route('welcome')->with('error', 'Twoje konto zostało zablokowane. Skontaktuj się z administratorem.');
        }

        return $next($request);
    }
}
