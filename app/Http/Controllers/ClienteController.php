<?php

namespace App\Http\Controllers;

use App\Http\Requests\Cliente\StoreRequest;
use App\Http\Requests\Cliente\UpdateRequest;
use Illuminate\Http\Request;

// Modelos
use App\Models\Cliente;
use App\Models\Pais;
use App\Models\Estado;
use App\Models\Ciudad;
use App\Models\Parroquia;

class ClienteController extends Controller
{
    public function index()
    {
        $pais = Pais::all();
        $estados = Estado::orderBy('descrip','asc')->get();
        $ciudads = Ciudad::orderBy('descrip','asc')->get();
        $parroquias = Parroquia::orderBy('descrip','asc')->get();
        $clientes = Cliente::all();
        return view('clientes', [ 'page_title' => 'Clientes', 'clientes' => $clientes ] ,
            compact('pais','estados', 'ciudads', 'parroquias'));
    }

    public function create()
    {
        return view('admin.cliente.create');
    }

    public function store(StoreRequest $request)
    {
        $cliente = new Cliente;
        $cliente = $this->crearUpdate($request, $cliente);
        return redirect('clientes');
    }

    public function crearUpdate(Request $request, $cliente)
    {
        $cliente->pais_id = $request->pais;
        $cliente->estado_id = $request->estado;
        $cliente->ciudad_id = $request->municipio;
        $cliente->parroquia_id = $request->parroquia;
        
        if ($request->cedula==null)
            $cliente->cedula = $cliente->cedula;
        else
            $cliente->cedula = $request->cedula;

        //$cliente->cedula = $request->cedula;
        $cliente->nombre = $request->nombre;
        $cliente->apellido = $request->apellido;
        $cliente->telefono = $request->telefono;
        $cliente->correo = $request->correo;
        $cliente->direccion = $request->direccion;

        $cliente->save();
        return $cliente;
    }

    public function show($id)
    {
        $cliente = Cliente::where('id', $id)->firstOrFail();
        return view('admin.cliente.show', compact('cliente'));
    }

    public function edit($id)
    {
        $pais = Pais::all();
        $estados = Estado::orderBy('descrip','asc')->get();
        $ciudads = Ciudad::orderBy('descrip','asc')->get();
        $parroquias = Parroquia::orderBy('descrip','asc')->get();

        $cliente = Cliente::where('id', $id)->firstOrFail();
        return view('admin.cliente.edit', compact('cliente','pais','estados', 'ciudads', 'parroquias'));
    }

    public function update(Request $request, $id)
    {
        $cliente = Cliente::where('id', $id)->firstOrFail();
        $cliente = $this->crearUpdate($request, $cliente);
        return redirect('clientes');   
    }

    public function destroy(Cliente $cliente)
    {
        $cliente->delete();
        //return redirect()->route('clientes.index');
        return back()->with('succes','Cliente eliminado satisfactoriamente');
    } 
}
