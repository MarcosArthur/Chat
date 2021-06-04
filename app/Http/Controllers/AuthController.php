<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class AuthController extends Controller
{
    public function index()
    {
        return Inertia::render("Auth");
    }

    public function authenticate(AuthRequest $request)
    {

        $credentials = $request->only(['email', 'password']);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return Redirect::route('Chat');
        }

        return Redirect::route('Login')->withErrors([
            'fail_authenticate' => "E-mail e/ou senha errados"
        ]);
    }
}
