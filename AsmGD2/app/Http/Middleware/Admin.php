<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Admin
{
    public function handle(Request $request, Closure $next)
    {
        // Kiểm tra xem người dùng đã đăng nhập chưa
        if (!Auth::check()) {
            // Nếu chưa đăng nhập, chuyển hướng về trang đăng nhập
            return redirect()->route('login')->with('error', 'Vui lòng đăng nhập để truy cập trang này.');
        }

        // Kiểm tra role của người dùng
        if (Auth::user()->role != 1) {
            // Nếu role không phải 1, chuyển hướng về trang chủ
            return redirect('/')->with('error', 'Bạn không có quyền truy cập trang này.');
        }

        // Nếu role = 1, cho phép truy cập
        return $next($request);
    }
}