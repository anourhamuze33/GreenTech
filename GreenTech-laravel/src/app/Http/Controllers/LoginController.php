<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function showRegister()
    {
        return view('Auth.register');
    }
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'role'=> 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|confirmed',
        ]);

        User::create([
            'name'    => $request->name,
            'email'   => $request->email,
            'role'    => $request->role,
            'password'=> Hash::make($request->password)
        ]);

        return redirect()->route('auth.login')->with('succes', 'account created succesfully');
    }
    public function showLogin()
    {
        return view('Auth.login');
    }
    public function login(Request $request)
    {
        $request->validate(
            [
                'email'    => 'required|email',
                'password' => 'required'
            ]);
            $user = User::where('email', $request->email)->first();
            if($user && Hash::check($request->password, $user->password)){
                Session::put('user_id', $user->id);
                return redirect()->route('products.index');
            }
    }
    public function logout()
    {
        Session::forget('user');
        return redirect()->route('auth.login');
    }
}
