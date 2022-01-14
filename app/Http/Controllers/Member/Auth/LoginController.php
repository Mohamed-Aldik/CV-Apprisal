<?php

namespace App\Http\Controllers\Member\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Member\Auth\LoginRequest;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function getLogin()
    {
        if (Auth::guard('member')->check()) 
        return redirect()->route('member');

        return view('member.auth.login');
    }

    public function postLogin(LoginRequest $request)
    {
		$rememberme = request('rememberme') == 1?true:false;
        if (Auth::guard('member')->attempt(['email' => request('email'), 'password' => request('password')], $rememberme)) {
            return redirect('member');
        } else {
            session()->flash('error', 'بيانات الدخول غير صحيحة');
            return redirect('member/login');
        }
    }
}
