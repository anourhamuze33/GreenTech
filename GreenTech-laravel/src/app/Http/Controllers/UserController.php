<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::orderBy('created_at', 'desc')
        ->paginate(8);
        return view('users.index', compact('users'));
    }
    public function showRegister()
    {
        return view('Auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'role' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|confirmed',
        ]);

        User::create([
            'name'    => $request->name,
            'email'   => $request->email,
            'role'    => $request->role,
            'password' => Hash::make($request->password)
        ]);

        return redirect()->route('users.index')->with('succes', 'account created succesfully');
    }
    public function edit(int $id)
    {
        $users = User::all();
        $user = $users->findOrFail($id);
        return view('users.formEdit', compact('user'));
    }
    public function update(int $id, Request $request)
    {

        $user = User::all()->findOrFail($id);
        
        $validated =         
        $request->validate([
            'name' => 'required',
            'role' => 'required',
            'email' => 'required|email',
        ]);
        $user->update($validated);
        return redirect()->route('users.index')->with('success','role created successfully');

    }
  public function destroy(User $user)
    {
        // $product->delete();
        User::destroy($user);
        return redirect()->route('users.index')->with('success', 'Produit supprime avec succes');
    }
}
