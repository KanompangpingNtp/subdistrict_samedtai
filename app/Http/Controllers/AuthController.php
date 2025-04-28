<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function Login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($request->only('email', 'password'))) {
            $request->session()->regenerate();

            $status = Auth::user()->status;

            if ($status == 1) {
                return redirect()->route('PressReleaseHome');
            } elseif ($status == 2) {
                return redirect()->route('EserviceAdminAccount');
            } elseif ($status == 3) {
                return redirect()->route('EserviceUserAccount');
            } else {
                Auth::logout(); // ถ้าสถานะไม่ตรงตามที่กำหนด ให้ออกจากระบบ
                return redirect()->route('showLoginForm')->withErrors(['status' => 'ไม่มีสิทธิ์เข้าถึงระบบ']);
            }
        }

        return back()->withErrors([
            'email' => 'อีเมลหรือรหัสผ่านไม่ถูกต้อง',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('HomeIndex');
    }
}
