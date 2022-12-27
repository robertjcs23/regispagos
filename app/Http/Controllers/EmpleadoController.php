<?php

namespace App\Http\Controllers;


use App\Http\Requests\Empleado\StoreRequest;
use App\Http\Requests\Empleado\UpdateRequest;
use Illuminate\Http\Request;

// Modelos
use App\Models\Empleado;
use App\Models\Pais;
use App\Models\Estado;
use App\Models\Ciudad;
use App\Models\Parroquia;
use App\Models\Cargo;
use App\Models\Role;

class EmpleadoController extends Controller
{
   public function index()
    {
        $pais = Pais::all();
        $estados = Estado::orderBy('descrip','asc')->get();
        $ciudads = Ciudad::orderBy('descrip','asc')->get();
        $parroquias = Parroquia::orderBy('descrip','asc')->get();
        $cargos = Cargo::orderBy('descrip','asc')->get();
        $roles = Role::orderBy('descrip','asc')->get();
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

        // if ($request->pais_id==!null)
        //     $empleado->pais_id = $request->pais;
        // else
        //     $empleado->pais_id = $empleado->pais_id;    

        // if ($request->estado_id==null)
        //     $empleado->estado_id = $empleado->estado_id;
        //  else
        //     $empleado->estado_id = $request->estado;

        // if ($request->ciudad_id==null)
        //     $empleado->ciudad_id = $empleado->ciudad_id;
        //  else
        //     $empleado->ciudad_id = $request->municipio;

        // if ($request->parroquia_id==null)
        //     $empleado->parroquia_id = $empleado->parroquia_id;
        //  else
        //     $empleado->parroquia_id = $request->parroquia;

        // if ($request->cargo_id==null)
        //     $empleado->cargo_id = $empleado->cargo_id;
        //  else
        //     $empleado->cargo_id = $request->cargo;

        // if ($request->role_id==null)
        //     $empleado->role_id = $empleado->role_id;
        //  else
        //     $empleado->role_id = $request->role;
        
        $empleado->nombre = $request->nombre;
        $empleado->apellido = $request->apellido;
        $empleado->telefono = $request->telefono;
        $empleado->correo = $request->correo;
        $empleado->direccion = $request->direccion;

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
        $roles = Role::orderBy('descrip','asc')->get();

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
