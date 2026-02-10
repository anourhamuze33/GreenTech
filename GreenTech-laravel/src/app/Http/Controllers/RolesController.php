<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Role;
use Illuminate\Http\Request;

class RolesController extends Controller
{
    public function index()
    {
        $roles = Role::orderBy('created_at', 'desc')
        ->paginate(8);
        return view('roles.index', compact("roles"));
    }

    public function create()
    {
        return view('roles.formRoles');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required'
        ]);
        Role::create($request->all());
        return redirect()->route('roles.index')->with('success','role created successfully');
    }
    public function edit(int $id)
    {
        $roles = Role::all();
        $role = $roles->findOrFail($id);
        return view('roles.formEdit', compact('role'));
    }
    public function update(int $id, Request $request)
    {

        $role = Role::all()->findOrFail($id);
        
        $validated = $request->validate([
            'name'=>'required',
        ]);
        $role->update($validated);
        return redirect()->route('roles.index')->with('success','role created successfully');

    }
    public function destroy(Role $role)
    {
        // $product->delete();
        $role->forceDelete();
        return redirect()->route('roles.index')->with('success', 'Produit supprime avec succes');
    }
}