<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class customauth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        // echo('hii this is middleware');
        $path = $request->path();

    //    if($path == 'adminpanel'){

    //       return redirect('admin');

    //    }
        
        return $next($request);
    }
}
