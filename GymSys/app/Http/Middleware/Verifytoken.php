<?php

namespace GymSys\Http\Middleware;

use Closure;

class Verifytoken
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
      if (true) {
        return $next($request);
      }

      return response('Error, No puedes Continuar' , 404);

    }
}
