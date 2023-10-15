<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function register(Request $request){
        return view('user.register');
    }

    public function store(Request $request){
        $incomingfields = $request->validate([
            'name' => ['required', 'min:4', 'max:100'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'min:3', 'max:100']
        ]);

        $incomingfields['password'] = bcrypt($incomingfields['password']);
        $user = User::create($incomingfields);

        auth()->login($user);
        return 'Thank you for regestering';
               '<button type="submit">'+'continue'+'</button>';
    }
    
    public function logout(Request $request){
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('message', 'You have been logged out!');
    }

    public function login(){
        return view('user.login');
    }

    public function userlogin(Request $request){
        $incomingfields = $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required'
        ]);

        if(auth()->attempt($incomingfields)){
            $request->session()->regenerate();
            return redirect('/')->with('message', 'Welcome back!');
        }

        return back()->withErrors([
            'email' => 'Invalid Credentials',
        ])->onlyInput('email');
        
    }
}