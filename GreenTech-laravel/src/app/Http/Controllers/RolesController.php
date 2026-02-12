<?php

namespace App\Http\Controllers;

use App\Models\Permission;
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
        $permissions = Permission::all();
        return view('roles.formRoles', compact('permissions'));
    }
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'permissions' => 'required|array'
        ]);

        $role = Role::create([
            'name' => $request->name
        ]);
        $role->permissions()->attach($request->permissions);

        return redirect()->route('roles.index')->with('success', 'role created successfully');
    }

    public function edit(int $id)
    {
        $roles = Role::all();
        $role = $roles->findOrFail($id);
        $permissions = Permission::all();
        $permIds = $role->permissions->pluck('id')->toArray();
    return view('roles.formEdit', compact('role', 'permissions', 'permIds'));
}
    public function update(int $id, Request $request)
    {
        $role = Role::findOrFail($id);
        $permIds = $role->permissions->pluck('id')->toArray();

        $validated = $request->validate([
            'name' => 'required',
            'permissions' => 'required|array'
        ]);
        
        foreach ($permIds as $p) {
            if (!in_array($p, $request->permissions)) {
                $role->permissions()->detach($p);
            }
        }

        foreach ($request->permissions as $p) {
            if (in_array($p, $permIds)) {
                continue;
            }
            else
            {
                $role->permissions()->attach($p);
            }
        }
        $role->update([
            'name'=> $validated['name']
        ]);

        return redirect()->route('roles.index')->with('success', 'role created successfully');
    }
    public function destroy(Role $role)
    {
        // $product->delete();
        $role->forceDelete();
        return redirect()->route('roles.index')->with('success', 'Produit supprime avec succes');
    }
}
