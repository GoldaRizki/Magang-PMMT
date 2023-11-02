<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Teknisi
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(auth()->guest() || !(auth()->user()->level === 'Superuser' || auth()->user()->level == 'Admin' || auth()->user()->level == 'Manager' || auth()->user()->level == 'Supervisor' || auth()->user()->level == 'Teknisi')){
            abort(403);
        }
        return $next($request);
    }
}
