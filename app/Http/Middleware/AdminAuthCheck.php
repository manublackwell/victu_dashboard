<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminAuthCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(!session()->has('AdminUser') || !session()->has('is_admin')){
            return redirect(route('login'))->with('fail', 'Accesso negato.');
        }
        return $next($request);
    }
}
