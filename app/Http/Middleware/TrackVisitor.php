<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Visitor;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;

class TrackVisitor
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $ip = $request->ip();
        $session_id = Session::getId();
        $now = Carbon::now('Asia/Bangkok');

        $visitor = Visitor::where('session_id', $session_id)
            ->orWhere('ip_address', $ip) // ตรวจสอบทั้ง session_id และ ip_address
            ->first();

        if (!$visitor) {
            Visitor::create([
                'ip_address' => $ip,
                'session_id' => $session_id,
                'last_activity' => $now,
            ]);
        } else {
            $visitor->update(['last_activity' => $now]);
        }

        return $next($request);
    }
}
