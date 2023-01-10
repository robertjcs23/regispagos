<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\UserRequest;

//Agregados
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;



class UserController extends Controller
{
    public function index(User $model)
    {
        return view('users.index', ['users' => $model->paginate(5)]);
    }

public function create()
    {
        return view('admin.user.create');
    }

    public function store(StoreRequest $request)
    {
        $user = new User;
        $user = $this->crearUpdate($request, $user);
        return redirect('users');
    }

    public function crearUpdate(Request $request, $user)
    {
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;

        $user->assignRole($request->role);

        $user->save();
        return $user;
    }

    public function show($id)
    {
        $user = User::where('id', $id)->firstOrFail();
        return view('admin.user.show', compact('user'));
    }

    public function edit($id)
    {

        $user = User::where('id', $id)->firstOrFail();
        return view('admin.user.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::where('id', $id)->firstOrFail();
        $user = $this->crearUpdate($request, $user);
        return redirect('users');   
    }

    public function destroy(User $user)
    {
        //
        $user->delete();
        return back()->with('succes','User eliminado satisfactoriamente');
    } 
}
