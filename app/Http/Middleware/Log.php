<?php

namespace App\Http\Middleware;

use App\Models\LogActivity;
use Closure;
use Illuminate\Http\Request;

class Log
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
        $url = $request->fullUrl();

        if (!str_contains($url, '/table?')) {
            LogActivity::add('-');
        }

        return $next($request);
    }
}
