<?php

namespace App\Http\Middleware;

use App\Models\Role;
use Closure;
use Illuminate\Http\Request;


class Afiliado
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

        if(auth()->user()->role_id != Role::where('name','afiliado')->first()->id){
            return redirect()->route('/')->with('error', 'Permiso denegado');
        }
        return $next($request);
    }
}
