<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.loginRegis');
    }

    public function login(Request $request)
    {
        $request->validate([
            'login' => ['required', 'string'],
            'password' => ['required'],
        ]);

        $fieldType = filter_var($request->login, FILTER_VALIDATE_EMAIL) ? 'email' : 'name';

        $credentials = [
            $fieldType => $request->login,
            'password' => $request->password,
        ];

        if (!Auth::attempt($credentials, $request->filled('remember'))) {
            return back()->withInput()->with('error', 'Login gagal! Email/Username atau password salah.');
        }

        $request->session()->regenerate();
        $user = Auth::user();

        if (isset($user->status) && $user->status !== 'active') {
            Auth::logout();
            return back()->with('error', 'Akun Anda sedang ditangguhkan/tidak aktif.');
        }

        if (in_array($user->role, ['superAdmin', 'admin'])) {
            return redirect()->route('admin.dashboard');
        }

        return redirect()->route('user.home');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
        ], [
            'email.unique' => 'Email sudah terdaftar, gunakan email lain.',
            'password.confirmed' => 'Konfirmasi password tidak sesuai.',
            'password.min' => 'Password minimal 8 karakter.',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'user',
            'status' => 'active',
        ]);

        Auth::login($user);

        return redirect()->route('user.home');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}