<?php

namespace Colegio\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            //return redirect('/');
            switch ($this->auth->user()->role) 
            {
                case 'administrador':
                    return redirect()->to('administrador');
                    break;
                case 'alumno':
                    return redirect()->to('alumno');
                    break;
                case 'padre':
                    return redirect()->to('padre');
                    break;
                case 'profesor':
                    return redirect()->to('profesor');
                    break;
                default:
                    return redirect()->to('/');
                    break;
            }

        }

        return $next($request);
    }
}
