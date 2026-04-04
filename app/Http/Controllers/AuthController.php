<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthFormRequest;
use App\Http\Requests\SignUpFormRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    public function getLoginPage()
    {
        return view("pages.auth.login");
    }

    public function getSignUpPage()
    {
        return view("pages.auth.signup");
    }

    public function login(AuthFormRequest $request)
    {
        $credentials = $request->validated();

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route("home");
        }

        return back()->withErrors([
            "login" => "неверный логин или пароль",
        ]);
    }

    public function signup(SignUpFormRequest $request)
    {
        $credentials =  $request->validated();
        $user = User::create([
            "login" => $credentials["login"],
            "password" => $credentials["password"],
        ]);

        Auth::login($user);

        return redirect()->route("home");
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route("home");
    }
}
