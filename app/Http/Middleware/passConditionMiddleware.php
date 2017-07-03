<?php

namespace App\Http\Middleware;

use Closure;

class passConditionMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next,$plan)
    {
        $user = $request->user();
        if($user->getTrueValue($plan)){
            return $next($request);
        }
        return  redirect()->route('home');
    }
}
