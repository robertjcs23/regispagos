<?php

namespace App\Http\Controllers;


use App\Http\Requests\Empleado\StoreRequest;
use App\Http\Requests\Empleado\UpdateRequest;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

// Modelos
use App\Models\Empleado;
use App\Models\Pais;
use App\Models\Estado;
use App\Models\Ciudad;
use App\Models\Parroquia;
use App\Models\Cargo;
//use App\Models\Role;
use App\Models\User;

class EmpleadoController extends Controller
{
   public function index()
    {
        $pais = Pais::all();
        $estados = Estado::orderBy('descrip','asc')->get();
        $ciudads = Ciudad::orderBy('descrip','asc')->get();
        $parroquias = Parroquia::orderBy('descrip','asc')->get();
        $cargos = Cargo::orderBy('descrip','asc')->get();
        $roles = Role::orderBy('name','asc')->get();
        $empleados = Empleado::all();

        return view('empleados',
            [ 'page_title' => 'Empleados',
                'empleados' => $empleados ] ,
            compact('pais','estados', 'ciudads', 'parroquias', 'cargos', 'roles'));
    }

    public function create()
    {
        return view('admin.empleado.create');
    }

    public function store(StoreRequest $request)
    {
        $empleado = new Empleado;
        $empleado = $this->crearUpdate($request, $empleado);
        return redirect('empleados');
    }

    public function crearUpdate(Request $request, $empleado)
    {
        $empleado->pais_id = $request->pais;
        $empleado->estado_id = $request->estado;
        $empleado->ciudad_id = $request->municipio;
        $empleado->parroquia_id = $request->parroquia;
        $empleado->cargo_id = $request->cargo;
        $empleado->role_id = $request->role;

        if ($request->cedula==null){
            $empleado->cedula = $empleado->cedula;}
         else{
            $empleado->cedula = $request->cedula;}

        $empleado->nombre = ucwords($request->nombre);
        $empleado->apellido = ucwords($request->apellido);
        $empleado->telefono = $request->telefono;
        $empleado->correo = strtolower($request->correo);
        $empleado->direccion = strtoupper($request->direccion);

        $user->assignRole($request->role);

        $empleado->save();
        return $empleado;
    }

    public function show($id)
    {
        $empleado = Empleado::where('id', $id)->firstOrFail();
        return view('admin.empleado.show', compact('empleado'));
    }

    public function edit($id)
    {
        $pais = Pais::all();
        $estados = Estado::orderBy('descrip','asc')->get();
        $ciudads = Ciudad::orderBy('descrip','asc')->get();
        $parroquias = Parroquia::orderBy('descrip','asc')->get();
        $cargos = Cargo::orderBy('descrip','asc')->get();
        $roles = Role::orderBy('name','asc')->get();

        $empleado = Empleado::where('id', $id)->firstOrFail();
        return view('admin.empleado.edit', compact('empleado','pais','estados', 'ciudads', 'parroquias', 'cargos', 'roles'));
    }

    public function update(Request $request, $id)
    {
        $empleado = Empleado::where('id', $id)->firstOrFail();
        $empleado = $this->crearUpdate($request, $empleado);
        return redirect('empleados');   
    }

    public function destroy(Empleado $empleado)
    {
        //
        $empleado->delete();
        return back()->with('succes','Empleado eliminado satisfactoriamente');
    } 
}
