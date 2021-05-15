<?php

namespace App\Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AdminLoginRequest;
use Auth;
use Session;
use App\Models\Admin;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function login() {
        if (Auth()->guard('admin')->user()) {
            return redirect(route('admin.dashboard'));
        }
        return view('admin::auth.login');
    }

    public function signIn(AdminLoginRequest $request) {
        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];
        $remember = isset($request->remember) ? true : false;

        if ( Auth()->guard('admin')->attempt($credentials, $remember) ) {
            return redirect(route('admin.dashboard'));
        } else {
            $request->session()->flash('login-error', 'Sai tài khoản hoặc mật khẩu');
            return redirect()->back();
        }
    }

    public function logout() {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }
}
