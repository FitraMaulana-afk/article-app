<?php

namespace App\Http\Controllers\Landing\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public string $landingLoginView = 'landing-page.auth.';

    public function create(): View
    {
        $landingLoginView = $this->landingLoginView;
        return view($landingLoginView . 'login');
    }


    public function store(LoginRequest $request)
    {
        $credentials = $request->validated();

        if (Auth::attempt($credentials)) {
            // Jika login berhasil
            return redirect()->intended('/');
        } else {
            // Jika login gagal
            return back()->withErrors([
                'email' => 'Email atau password salah',
            ]);
        }
    }

    public function destroy(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
