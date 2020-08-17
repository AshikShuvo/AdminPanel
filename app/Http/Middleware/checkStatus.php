<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Closure;

class checkStatus
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
        $response= $next($request);
        if(Auth::check() && Auth::user()->status != '1'){

            Auth::logout();

            $request->session()->flash('alert-danger', 'Your Account is not activated yet.');

            return redirect('/login')->with('erro_login', 'Your error text');

        }
        return $response;

    }
}