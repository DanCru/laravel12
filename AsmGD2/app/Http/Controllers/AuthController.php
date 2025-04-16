<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function signin()
    {
        // $user = Auth::user();
        // dd($user->name, $user->email, $user->password, $user->user_id);
        // die();
        return view('auth.signin'); // Trả về view chứa form đăng nhập/đăng ký
    }

    public function checkEmail(Request $request)
    {
        try {
            $email = $request->input('email');
            if (!$email) {
                return response()->json([
                    'success' => false,
                    'message' => 'Email không được để trống.'
                ], 400);
            }

            $user = User::where('email', $email)->first();

            return response()->json([
                'exists' => !is_null($user)
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Đã có lỗi xảy ra: ' . $e->getMessage()
            ], 500);
        }
    }

    // Xử lý đăng nhập (AJAX)
    public function signinPost(Request $request)
{
    try {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:1',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Lấy người dùng đã đăng nhập
            $user = Auth::user();

            // Kiểm tra role
            $redirectUrl = $user->role == 1 ? '/admin' : '/'; // '/' là trang chủ

            return response()->json([
                'success' => true,
                'message' => 'Đăng nhập thành công!',
                'redirect' => $redirectUrl // Trả về URL để client xử lý chuyển hướng
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'Email hoặc mật khẩu không đúng.'
        ], 401);
    } catch (\Exception $e) {
        return response()->json([
            'success' => false,
            'message' => 'Đã có lỗi xảy ra: ' . $e->getMessage()
        ], 500);
    }
}

    // Xử lý đăng ký (AJAX)
    public function signupPost(Request $request)
    {
        try {
            $request->validate([
                'email' => 'required|email|unique:users,email',
                'password' => 'required|min:1',
            ]);

            $user = User::create([
                'name' => explode('@', $request->email)[0], // Tạm lấy phần trước @ làm tên
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            Auth::login($user);

            return response()->json([
                'success' => true,
                'message' => 'Đăng ký thành công!'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Đã có lỗi xảy ra: ' . $e->getMessage()
            ], 500);
        }
    }
    // Xử lý đăng nhập (POST /signin)
    // public function signinPost(Request $request)
    // {
    //     // Xác thực dữ liệu đầu vào
    //     $request->validate([
    //         'email' => 'required|email',
    //         'password' => 'required|min:1',
    //     ]);

    //     // Lấy thông tin đăng nhập
    //     $credentials = $request->only('email', 'password');

    //     // Thử đăng nhập
    //     if (Auth::attempt($credentials)) {
    //         // Đăng nhập thành công
    //         return redirect()->route('news.home')->with('success', 'Đăng nhập thành công!');
    //     }

    //     // Đăng nhập thất bại
    //     return redirect()->back()->withErrors(['email' => 'Email hoặc mật khẩu không đúng.'])->withInput();
    // }

    // Hiển thị form đăng ký (GET /signup)
    public function signup()
    {
        return view('auth.signin'); // Trả về cùng view với signin (form kết hợp)
    }

    // Xử lý đăng ký (POST /signup)
    // public function signupPost(Request $request)
    // {
    //     // Xác thực dữ liệu đầu vào
    //     $request->validate([
    //         'name' => 'required|string|max:255',
    //         'email' => 'required|email|unique:users,email',
    //         'password' => 'required|min:1|confirmed', // confirmed đảm bảo password và confirm_password khớp nhau
    //     ]);

    //     // Tạo người dùng mới
    //     $user = User::create([
    //         'name' => $request->name,
    //         'email' => $request->email,
    //         'password' => Hash::make($request->password), // Mã hóa mật khẩu
    //     ]);

    //     // Đăng nhập ngay sau khi đăng ký
    //     Auth::login($user);

    //     return redirect()->route('news.home')->with('success', 'Đăng ký thành công!');
    // }

    // Xử lý đăng xuất (GET /logout)
    public function logout(Request $request)
    {
        Auth::logout(); // Đăng xuất người dùng

        $request->session()->invalidate(); // Hủy session
        $request->session()->regenerateToken(); // Tạo lại CSRF token để bảo mật

        return redirect('/')->with('success', 'Đăng xuất thành công!');
    }










    // Xử lý quên mật khẩu (GET /forgot-password)
    public function showLinkRequestForm()
    {
        return view('auth.forgot-password');
    }

    // Gửi email chứa link reset mật khẩu
    public function sendResetLinkEmail(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status === Password::RESET_LINK_SENT
            ? back()->with('status', __($status))
            : back()->withErrors(['email' => __($status)]);
    }

    public function showResetForm(Request $request, $token)
    {
        return view('auth.reset-password', ['token' => $token, 'email' => $request->email]);
    }

    // Xử lý reset mật khẩu
    public function reset(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:1|confirmed',
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));

                $user->save();
            }
        );

        return $status === Password::PASSWORD_RESET
            ? redirect()->route('news.home')->with('status', __($status))
            : back()->withErrors(['email' => [__($status)]]);
    }
}
