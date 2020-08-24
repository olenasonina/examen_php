<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User;

class AuthController extends Controller
{
    public function signUp(Request $request)
    {
        if ($request->isMethod('post')) {
            $validatedData = $request->validate([
                'name' => 'required|alpha_dash|max:50',
                'email' => 'required|unique:users|email|max:255',
                'password' => 'required|min:6',
            ]);
            User::create([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'password' => bcrypt($request->input('password')),
            ]);
            return redirect()->route('index')->with('info', 'Вы успешно зарегистрировались. Можно войти на сайт');
        }
        return view('auth.signup', ['title' => 'GrainBoard | Регистрация']);
    }

    public function signIn(Request $request) {
        if ($request->isMethod('post')) {
            $validatedData = $request->validate([
                'email' => 'required|email|max:255',
                'password' => 'required|min:6',
            ]);
            
            if(!Auth::attempt($request->only(['email','password']), $request->has('remember')))
            {
                return redirect()->back()->with('info', 'Неправильный логин или пароль.');
                echo "no";
                exit;
            }

            return redirect()->route('index')->with('info', 'Вы успешно вошли на сайт');
            
        }
        return view('auth.signin', ['title' => 'GrainBoard | Войти']);
    }
}
