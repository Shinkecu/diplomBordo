<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('admin.adminLogin'); // Создайте представление для формы входа
    }
    public function showAdminPanel()
    {
        $username = Auth::user()->name;
        return view('admin.mainAdminPanel',compact('username'));
    }
    public function login(Request $request)
    {
        //$hashedPassword = Hash::make($request->password);
        //dd($hashedPassword);
        $request->validate([
            'login' => 'required|string',
            'password' => 'required|string',
        ]);

        $credentials = $request->only('login', 'password');

        if (Auth::attempt($credentials)) {

            return redirect('/adminPanel');
        }

        // Ошибка входа
        return back()->withErrors([
            'admin.adminLogin' => 'Неверные учетные данные.',
        ]);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('home')->with('success', 'Вы вышли из системы.');
    }
}
