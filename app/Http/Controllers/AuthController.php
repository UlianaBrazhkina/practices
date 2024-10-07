<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
     // Метод для отображения формы входа
     public function showLoginForm()
     {
         return view('auth.login');
     }
 
     // Метод для обработки данных входа
     public function login(Request $request)
     {
         // Валидация данных
         $validated = $request->validate([
             'email' => 'required|email',
             'password' => 'required',
         ]);
 
         // Аутентификация пользователя
         if (Auth::attempt($validated)) {
             // Успешный вход, перенаправление на главную страницу или в панель управления
             return redirect()->intended('dashboard')->with('success', 'Вы успешно вошли!');
         }
 
         // Если аутентификация не удалась, возврат ошибки
         return back()->withErrors(['email' => 'Неверные учетные данные.']);
     }
     public function showRegistrationForm()
     {
         return view('auth.register');
     }
 
     // Метод для обработки данных регистрации
     public function register(Request $request)
     {
         // Валидация данных
         $validated = $request->validate([
             'name' => 'required|string|max:255',
             'email' => 'required|string|email|max:255|unique:users',
             'password' => 'required|string|min:8|confirmed',
         ]);
 
         // Создание пользователя
         User::create([
             'name' => $validated['name'],
             'email' => $validated['email'],
             'password' => Hash::make($validated['password']),
         ]);
 
         return redirect()->route('login')->with('success', 'Регистрация успешна! Вы можете войти.');
     }
}
