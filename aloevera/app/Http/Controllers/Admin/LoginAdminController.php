<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AuthRequest;
use Auth;

class LoginAdminController extends Controller
{
    public function CheckLogin(AuthRequest $request){
        $credentials = [
            'username' => $request->input('username'),
            'password' => $request->input('password'),
        ];
 
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
 
            return redirect()->route('admin.product')->with('success','Đăng nhập thành công');
        }
 
        return redirect()->route('home')->with('error','Username hoặc mật khẩu không chính xác');
    }
    public function logout(Request $request)
        {
            Auth::logout();
        
            $request->session()->invalidate();
        
            $request->session()->regenerateToken();
        
            return redirect()->route('home')->with('success','Đăng xuất thành công');
        }
}
