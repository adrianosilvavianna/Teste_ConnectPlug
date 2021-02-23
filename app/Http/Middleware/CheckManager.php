<?php

namespace App\Http\Middleware;

use Closure;

class CheckManager
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
        $manager = \Auth::user()->manager;

        if($manager){
            return $next($request);
        }

        //dd('Voce nao tem permissao para acessar');
        return $next($request);
    }
}
