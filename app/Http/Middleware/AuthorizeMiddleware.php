<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class AuthorizeMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // dd(Auth::check());
        // Kiểm tra xem người dùng đã xác thực hay chưa
        if (!Auth::check()) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        // Kiểm tra quyền truy cập tại đây
        // Ví dụ: Kiểm tra nếu người dùng có vai trò admin
        if (!Auth::user()->isAdmin()) {
            return response()->json(['message' => 'Access denied'], 403);
        }
        return $next($request);
    }
}
