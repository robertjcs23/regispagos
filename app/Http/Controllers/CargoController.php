<?php

namespace App\Http\Controllers;

use App\Models\Cargo;
use App\Http\Requests\StoreCargoRequest;
use App\Http\Requests\UpdateCargoRequest;
use App\Http\Requests\Cargo\UpdateRequest;
use Illuminate\Http\Request;

class CargoController extends Controller
{
    public function index()
    {
        $cargos = Cargo::all();
        return view('cargos', [ 'page_title' => 'Cargos', 'cargos' => $cargos ]);
    }

    public function create()
    {
        return view('admin.cargo.create');
    }

    public function store(Request $request)
    {
        $cargo = new Cargo;
        $cargo = $this->crearUpdate($request, $cargo);
        return redirect('cargos');
    }

    public function crearUpdate(Request $request, $cargo)
    {
         $cargo->descrip = ucwords($request->descrip);
         $cargo->save();
         return $cargo;
    }
    
    public function show($id)
    {
        //$cargo = Cargo::find($id);
        $cargo = Cargo::where('id', $id)->firstOrFail();
        return view('show', compact('cargo'));
    }

    public function edit($id)
    {    
        $cargo = Cargo::where('id', $id)->firstOrFail();
        return view('admin.cargo.edit', compact('cargo'));
    }

    public function update(Request $request, $id)
    {
        $cargo = Cargo::where('id', $id)->firstOrFail();
        $cargo = $this->crearUpdate($request, $cargo);
        return redirect('cargos');       
    }

    public function destroy(Cargo $cargo)
    {
        $cargo->delete();
        return back()->with('succes','Cargo eliminado satisfactoriamente');
    }

    public function view($cargo_id)
    {
        $cargo = Cargo::find($cargo_id);
        $cargos = Cargo::all();
        return view('update', [ 'page_title' => 'updateCargos', 'cargos' => $cargos ]);
    }

    public function ver($id)
    {
        $cargo = Cargo::find($id);
        return view('admin.cargo.show', compact('cargo'));
    }

    public function updateCargos(Cargo $request)
    {
    //$cargo = Cargo::find($request->cargo_id);
        $cargo->descrip = $request->descrip;
        $cargo->save();

        return view('edit', compact('cargo'));
    } 
}