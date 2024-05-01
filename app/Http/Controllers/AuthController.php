<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
  public function showRegistrationForm()
  {
    return view('auth.register');
  }

  public function register(Request $request)
  {
    // Валидация данных
    $request->validate([
      'name' => 'required|string|max:255',
      'email' => 'required|string|email|unique:users,email',
      'password' => 'required|string|min:8|confirmed',
    ]);

    User::create([
      'name' => $request->name,
      'email' => $request->email,
      'password' => Hash::make($request->password),
    ]);

    Auth::attempt($request->only('email', 'password'));

    return redirect()->route('pages-home')->with('success', 'Тіркеу сәтті аяқталды.');
  }

  public function showLoginForm()
  {
    return view('auth.login');
  }

  public function login(Request $request)
  {
    $credentials = $request->validate([
      'email' => 'required|string|email',
      'password' => 'required|string',
    ]);

    if (Auth::attempt($credentials)) {
      return redirect()->intended(route('pages-home'));
    } else {
      return back()->withErrors([
        'email' => '
Жарамсыз электрондық пошта немесе құпия сөз.',
      ]);
    }
  }

  public function logout()
  {
    Auth::logout();

    // Перенаправление на страницу входа с сообщением о выходе
    return redirect()->route('login')->with('success', '
Сіз жүйеден сәтті шықтыңыз.');
  }
}
