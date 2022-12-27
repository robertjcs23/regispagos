<?php

namespace App\Http\Controllers;

use App\Models\Pago;
use App\Http\Requests\Pago\StoreRequest;
use App\Http\Requests\Pago\UpdateRequest;
use Illuminate\Http\Request;

// Modelos
use App\Models\Empleado;
use App\Models\Cliente;
use App\Models\Tpago;

class PagoController extends Controller
{
   public function index()
    {
        $empleado = Empleado::orderBy('nombre','asc')->get();
        $cliente = Cliente::orderBy('nombre','asc')->get();
        $tpago = Tpago::orderBy('descrip','asc')->get();

        $pago = Pago::all();

        return view('pagos',
            [ 'page_title' => 'Pagos',
                'pagos' => $pago ] ,
            compact('pago', 'empleado', 'cliente', 'tpago'));
    }

    public function create()
    {
        return view('admin.pago.create');
    }

    public function store(StoreRequest $request)
    {
        $pago = new Pago;
        $pago = $this->crearUpdate($request, $pago);
        return redirect('pagos');
    }

    public function crearUpdate(Request $request, $pago)
    {
        date_default_timezone_set('America/Caracas');
        $pago->empleado_id = $request->empleado;
        $pago->cliente_id = $request->cliente;
        $pago->tpago_id = $request->tpago;

        $pago->referencia = $request->referencia;
        $pago->monto = $request->monto;
        $pago->detalle = $request->detalle;
        $pago->fecha_r = date('Y-m-d H:i:s');
        $pago->fecha_p = $request->fecha_p;

        $pago->save();
        return $pago;
    }

    public function show($id)
    {
        $pago = Pago::where('id', $id)->firstOrFail();
        return view('admin.pago.show', [ 'page_title' => 'Detalle Total del Pago'], compact('pago'));
    }

    public function edit($id)
    {
        $pais = Pais::all();
        $estados = Estado::orderBy('descrip','asc')->get();
        $ciudads = Ciudad::orderBy('descrip','asc')->get();
        $parroquias = Parroquia::orderBy('descrip','asc')->get();
        $cargos = Cargo::orderBy('descrip','asc')->get();
        $roles = Role::orderBy('descrip','asc')->get();

        $pago = Pago::where('id', $id)->firstOrFail();
        return view('admin.pago.edit', compact('pago','pais','estados', 'ciudads', 'parroquias', 'cargos', 'roles'));
    }

    public function update(Request $request, $id)
    {
        $pago = Pago::where('id', $id)->firstOrFail();
        $pago = $this->crearUpdate($request, $pago);
        return redirect('pagos');   
    }

    public function destroy(Pago $pago)
    {
        //
        $pago->delete();
        return back()->with('succes','Pago eliminado satisfactoriamente');
    } 
}