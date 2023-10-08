<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function register(Request $request){
        $incomingfields = $request->validate([
            'name' => ['required', 'min:3', 'max:100'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'min:3', 'max:100']
        ]);

        $incomingfields['password'] = bcrypt($incomingfields['password']);
        $user = User::create($incomingfields);

        auth()->login($user);
        return 'Thank you for regestering';
               '<button type="submit">'+'continue'+'</button>';
    }
}