<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureInHouse
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = auth()->user();
        $hasHouse = $user->memberships()
            ->whereNull('left_at')
            ->exists();

        if (!$hasHouse) {
            return redirect()->route('dashboard')->with('error', 'You must be in a house to view that page.');
        }
        return $next($request);
    }
}
