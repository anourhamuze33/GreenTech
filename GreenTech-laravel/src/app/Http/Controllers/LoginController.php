<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserCode;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function index()
    {
        $userId = session('uid');
        $email = UserCode::where('user_id', $userId)->with('user')->first()->user->email;
        return view('emails.2fa', compact('userId', 'email'));
    }
       
    public function store(Request $request)
    {
        $request->validate([
            'code' => 'required',
        ]);
        $find = UserCode::where('user_id', $request->user_id)
            ->where('code', $request->code)
            ->where('updated_at', '>=', now()->subMinutes(2))
            ->first();
        if (!is_null($find)) {

            Session::put('user_2fa', $request->user_id);
            return redirect()->route('products.index');
        }
        return back()->with('error', 'You entered wrong code.');
    }
    // public function resend()
    // {

    //     $user = User::find(Session::get('user_id'));
    //     $user->generateCode();
    //     return back()->with('success', 'We sent you code on your email.');
    // }
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
            ]
        );
        $user = User::where('email', $request->email)->first();
        if ($user && Hash::check($request->password, $user->password)) {
            $user->generateCode($user->id);
            return redirect()->route('2fa.index')->with('uid', $user->id);
        }
        return redirect()->route('user.login')->with('error', 'problem');
    }
    public function logout()
    {
        Session::forget('user_2fa');
        return redirect()->route('auth.login');
    }
}
