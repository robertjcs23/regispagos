<?php

namespace App\Http\Controllers;

use App\Models\Tpago;
use App\Http\Requests\StoreTpagoRequest;
use App\Http\Requests\UpdateTpagoRequest;
use App\Http\Requests\Tpago\UpdateRequest;
use Illuminate\Http\Request;

class TpagoController extends Controller
{
    public function index()
    {
        $tpagos = Tpago::all();
        return view('tpagos', [ 'page_title' => 'Tpagos', 'tpagos' => $tpagos ]);
    }

    public function create()
    {
        return view('admin.tpago.create');
    }

    public function store(Request $request)
    {
        $tpago = new Tpago;
        $tpago = $this->crearUpdate($request, $tpago);
        return redirect('tpagos');
    }

    public function crearUpdate(Request $request, $tpago)
    {
         $tpago->descrip = $request->descrip;
         $tpago->save();
         return $tpago;
    }
    
    public function show($id)
    {
        //$tpago = Tpago::find($id);
        $tpago = Tpago::where('id', $id)->firstOrFail();
        return view('show', compact('tpago'));
    }

    public function edit($id)
    {    
        $tpago = Tpago::where('id', $id)->firstOrFail();
        return view('admin.tpago.edit', compact('tpago'));
    }

    public function update(Request $request, $id)
    {
        $tpago = Tpago::where('id', $id)->firstOrFail();
        $tpago = $this->crearUpdate($request, $tpago);
        return redirect('tpagos');       
    }

    public function destroy(Tpago $tpago)
    {
        $tpago->delete();
        return back()->with('succes','Tpago eliminado satisfactoriamente');
    }

    public function view($tpago_id)
    {
        $tpago = Tpago::find($tpago_id);
        $tpagos = Tpago::all();
        return view('update', [ 'page_title' => 'updateTpagos', 'tpagos' => $tpagos ]);
    }

    public function ver($id)
    {
        $tpago = Tpago::find($id);
        return view('admin.tpago.show', compact('tpago'));
    }

    public function updateTpagos(Tpago $request)
    {
    //$tpago = Tpago::find($request->tpago_id);
        $tpago->descrip = $request->descrip;
        $tpago->save();

        return view('edit', compact('tpago'));
    } 
}