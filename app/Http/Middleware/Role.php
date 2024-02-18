<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role): Response
    {
        if ($request->user()->role->role !== $role) {
            $redirectTo = '';

            if ($request->user()->role->role === 'admin') {
                $redirectTo = RouteServiceProvider::ADMIN;
            } elseif ($request->user()->role->role === 'professor') {
                $redirectTo = RouteServiceProvider::PROFESSOR;
            } elseif ($request->user()->role->role === 'researcher') {
                $redirectTo = RouteServiceProvider::HOME;
            }
            return redirect($redirectTo);
        }
        return $next($request);
    }
}
