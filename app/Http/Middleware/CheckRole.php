<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        // Thử auth:api trước, sau đó mới thử auth default
        $user = null;
        if (auth('api')->check()) {
            $user = auth('api')->user();
        } elseif (Auth::check()) {
            $user = Auth::user();
        }

        if (!$user) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        // Kiểm tra xem user có bất kỳ role nào được yêu cầu không
        foreach ($roles as $role) {
            if ($user->hasRole($role)) {
                return $next($request);
            }
        }

        return response()->json(['error' => 'Forbidden - Insufficient permissions'], 403);
    }
}
