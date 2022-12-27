<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Http\Requests\StoreRoleRequest;
use App\Http\Requests\UpdateRoleRequest;
use App\Http\Requests\Role\UpdateRequest;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::all();
        return view('roles', [ 'page_title' => 'Roles', 'roles' => $roles ]);
    }

    public function create()
    {
        return view('admin.role.create');
    }

    public function store(Request $request)
    {
        $role = new Role;
        $role = $this->crearUpdate($request, $role);
        return redirect('roles');
    }

    public function crearUpdate(Request $request, $role)
    {
         $role->descrip = $request->descrip;
         $role->save();
         return $role;
    }
    
    public function show($id)
    {
        //$role = Role::find($id);
        $role = Role::where('id', $id)->firstOrFail();
        return view('show', compact('role'));
    }

    public function edit($id)
    {    
        $role = Role::where('id', $id)->firstOrFail();
        return view('admin.role.edit', compact('role'));
    }

    public function update(Request $request, $id)
    {
        $role = Role::where('id', $id)->firstOrFail();
        $role = $this->crearUpdate($request, $role);
        return redirect('roles');       
    }

    public function destroy(Role $role)
    {
        $role->delete();
        return back()->with('succes','Role eliminado satisfactoriamente');
    }

    public function view($role_id)
    {
        $role = Role::find($role_id);
        $roles = Role::all();
        return view('update', [ 'page_title' => 'updateRoles', 'roles' => $roles ]);
    }

    public function ver($id)
    {
        $role = Role::find($id);
        return view('admin.role.show', compact('role'));
    }

    public function updateRoles(Role $request)
    {
    //$role = Role::find($request->role_id);
        $role->descrip = $request->descrip;
        $role->save();

        return view('edit', compact('role'));
    } 
}