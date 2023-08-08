<?php

namespace App\Http\Middleware;

use App\Http\Controllers\UpdateDbController;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CekUpdate
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

        if(now()->year != 2023){
            return response()->make(view('minta_update'));
        }

        return $next($request);
    }
}
