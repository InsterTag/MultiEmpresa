<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class CompanyAuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.company.login');
    }

    public function showRegisterForm()
    {
        return view('auth.company.register');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        $credentials['role'] = 'company';

        if (Auth::attempt($credentials)) {
            return redirect()->route('dashboard'); // Cambia por tu ruta deseada
        }

        return back()->withErrors(['email' => 'Credenciales inválidas'])->withInput();
    }

    public function register(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users',
            'password' => 'required|string|confirmed|min:6',
        ]);

        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'role'     => 'company',
            'password' => Hash::make($request->password),
        ]);

        Auth::login($user);

        return redirect()->route('dashboard');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
