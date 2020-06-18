<?php

namespace App\Http\Middleware;

use Closure;

class AggregatorCheckAdmin
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
        $user = \Auth::user();
        if(!isset($user)) {
            return redirect('/aggregator/index.html');
        }
        if((bool)$user->is_admin === true) {
            return $next($request);
        }

        return redirect('/aggregator/index.html');
    }
}
