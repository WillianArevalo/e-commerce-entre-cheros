<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

        if (!Auth::check()) {
            if ($request->is("admin/*") || $request->is("admin")) {
                return redirect("/admin/login");
            }
            return redirect("/login");
        }

        $user = Auth::user();

        if ($user->role != $role) {
            if ($role === "admin") {
                return redirect("/");
            }
        }
        return $next($request);
    }
}
