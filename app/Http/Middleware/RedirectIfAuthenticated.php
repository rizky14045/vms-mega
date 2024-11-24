<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @param  string|null  ...$guards
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                if(Auth::user()->role == 'admin'){
                    return redirect()->route('admin.home.index');
                }
                if(Auth::user()->role == 'supervisor'){
                    return redirect()->route('supervisor.home.index');
                }
                if(Auth::user()->role == 'manajer'){
                    return redirect()->route('manager.home.index');
                }
                if(Auth::user()->role == 'petugas'){
                    return redirect()->route('security.home.index');
                }
            }
        }

        return $next($request);
    }
}
