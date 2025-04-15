<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class isRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {

        // dd(auth()->user()->role_id); // This will show the role_id and stop execution here
        if(!auth()->check()) {
            return redirect()->route('login');
        }

        $user = auth()->user();


        if(in_array($user->role_id, $roles) || ($user->role_id === 2 && in_array(1, $roles))){
            return $next($request);
        }

        return match ($user->role_id) {
            1 => redirect()->route('roles.admin'),
            2 => redirect()->route('roles.manager'),
            default => redirect()->route('home'),
        };

    }
}
