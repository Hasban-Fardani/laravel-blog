<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //
    public function __invoke(LoginRequest $request)
    {
        $credentials = $request->validated();
        if (Auth::attempt($credentials)) {
            Helper::createAlert('success', 'Login success!');
            if (Auth::user()->role == 'admin') {
                return redirect('/admin');
            }
            return redirect('/');
        }
        Helper::createAlert('error', 'Login failed!');
        return redirect('/')->with('error', 'Login failed!');
    }
}
