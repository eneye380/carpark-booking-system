<?php

namespace App\Http\Middleware;

use Closure;
use Sentinel;

class VisitorsMiddleware
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
        if (!Sentinel::check()) {
            return $next($request);
        }
        else{
            if(strcasecmp('admin@admin.com', Sentinel::check()->email)){
                return redirect('/carowner');
            }else{
                return redirect('/admin-view');
            }
            
        }
    }
}
