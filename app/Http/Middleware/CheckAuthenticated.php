<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class CheckAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  mixed  ...$statuses
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next, ...$statuses): Response
    {
        if (!Auth::check()) {
            return redirect()->route('showLoginForm');
        }

        $status = Auth::user()->status;

        if (!in_array($status, $statuses)) {
            Auth::logout();
            return redirect()->route('showLoginForm')->withErrors(['status' => 'ไม่มีสิทธิ์เข้าถึงระบบ']);
        }

        return $next($request);
    }
}
