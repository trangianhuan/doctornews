<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class AdminLogin
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
        $response = $next($request);

        if (!Auth::check())
        {
            return redirect('admin/login');            
        }
        
        if ($user = Auth::user()) {
            if (!$user->isAdmin()) {
                return response('Unauthorized.', 401);
            }
        }
        return $response;
    }
}
