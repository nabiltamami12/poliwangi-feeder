<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AksesUntuk
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $akses_untuk)
    {
        $request->attributes->add(['akses_untuk' => $akses_untuk]);
        return $next($request);
    }
}
