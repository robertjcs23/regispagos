@extends('layouts.app')

@section('content')
<div class="col-sm-offset-3 col-sm-6">
    
    <div class="panel-body">
    	@include('common.errors')
    </div>

    <div class="panel-heading">
        <h3>Registro de Pagos</h3>
    </div>

    <form class="row g-3" action="{{ url('pagos') }}" method="POST">
    	{{ csrf_field() }}
    	
 
        <div class="col-md-6">
            <label for="empleado" class="control-label">Empleado que Registró</label>
            <input type="text" name="cedula" class="form-control" value="{{$pago->empleado->nombre}}" readonly>
        </div>

        <div class="col-md-6">
            <label for="empleado" class="control-label">Cargo del Empleado</label>
            <input type="text" name="cedula" class="form-control" value="{{$pago->empleado->cargo->descrip}}" readonly>
        </div>

        <div class="col-md-6">
            <label for="cliente" class="control-label">Cliente</label>
            <input type="text" name="cedula" class="form-control" value="{{$pago->cliente->nombre}}" readonly>
        </div>

        <div class="col-md-6">
            <label for="tpago" class="control-label">Método de Pago que usó</label>
            <input type="text" name="cedula" class="form-control" value="{{$pago->tpago->descrip}}" readonly>            
        </div>

    	<div class="col-md-6">
            <label for="referencia" class="control-label">Número de Referencia</label>
            <input type="text" name="cedula" class="form-control" value="{{$pago->referencia}}" readonly>
    	</div>

    	<div class="col-md-6">
            <label for="monto" class="control-label">Monto del pago</label>
            <input type="text" name="cedula" class="form-control" value="{{$pago->monto}}" readonly>
    	</div>

    	<div class="col-md-6">
            <label for="detalle" class="control-label">Detalle del pago</label>
            <input type="text" name="cedula" class="form-control" value="{{$pago->detalle}}" readonly>
    	</div>

        <div class="col-md-6">
            <label for="fecha_p" class="control-label">Fecha en que el cliente realizó el Pago</label>
            <input type="text" name="cedula" class="form-control" value="{{$pago->fecha_p}}" readonly>
        </div>

    	<div class="col-md-6">
            <label for="fecha_r" class="control-label">Fecha de Registro</label>
            <input type="text" name="cedula" class="form-control" value="{{$pago->fecha_r}}" readonly>
    	</div>

    	<div class="form-group">

            <a href="{{url('pagos')}}" class="btn btn-outline-warning" >
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-return-left" viewBox="0 0 16 16">
                  <path fill-rule="evenodd" d="M14.5 1.5a.5.5 0 0 1 .5.5v4.8a2.5 2.5 0 0 1-2.5 2.5H2.707l3.347 3.346a.5.5 0 0 1-.708.708l-4.2-4.2a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 8.3H12.5A1.5 1.5 0 0 0 14 6.8V2a.5.5 0 0 1 .5-.5z"/>
                </svg>
                Regresar
            </a>
        </div>

    </form>
@endsection
