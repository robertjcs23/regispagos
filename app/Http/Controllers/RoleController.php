<?php

namespace App\Http\Controllers;

use App\Http\Requests\Role\UpdateRequest;
use Illuminate\Http\Request;

//Agregamos
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;



class RoleController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:ver-rol | crear-rol | editar-rol | borrar-rol', ['only'=>['index']]);
        $this->middleware('permission:crear-rol', ['only'=>['create','store']]);
        $this->middleware('permission:editar-rol', ['only'=>['edit','update']]);
        $this->middleware('permission:borrar-rol', ['only'=>['destroy']]);
    }


    public function index()
    {
        $roles = Role::paginate(3);
        $permission = Permission::get();
        return view('roles', [ 'page_title' => 'Roles', 'roles' => $roles ], compact('permission', 'roles'));
    }

    public function create()
    {
        return view('admin.role.create');
    }

    public function store(Request $request)
    {
        $role = new Role;
        $role = $this->crearUpdate($request, $role);

        return redirect('roles')
                        ->with('success','Role created successfully');
    }

    public function crearUpdate(Request $request, $role)
    {
         $role->name = ucwords($request->name);
         $role->guard_name = ('web');
         //$role->syncPermissions($request->permissions);
         //$role->syncPermissions($permissions);
         $role->syncPermissions($request->input('permission'));
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
        //return back()->with('succes','Role eliminado satisfactoriamente');
        return redirect('roles'); 
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