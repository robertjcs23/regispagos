@extends('layouts.app',[ 'page_title' => 'Ver Detalles de Empleado'])

@section('content')
<div class="col-sm-offset-3 col-sm-6">
    
    <div class="panel-body">
    	@include('common.errors')
    </div>

    <form action="{{ url('empleados') }}" method="POST">
    	{{ csrf_field() }}
    	
    	<div class="form-group">
    		<label for="cedula" class="control-label">Cédula</label>
    		<input type="text" name="cedula" class="form-control" value="{{$empleado->cedula}}" readonly>
    	</div>

    	<div class="form-group">
    		<label for="nombre" class="control-label">Nombres</label>
    		<input type="text" name="nombre" class="form-control" value="{{$empleado->nombre}}" readonly>
    	</div>

    	<div class="form-group">
    		<label for="apellido" class="control-label">Apellidos</label>
    		<input type="text" name="apellido" class="form-control" value="{{$empleado->apellido}}" readonly>
    	</div>

    	<div class="form-group">
    		<label for="telefono" class="control-label">Teléfono</label>
    		<input type="text" name="telefono" class="form-control" value="{{$empleado->telefono}}" readonly>
    	</div>

        <div class="form-group">
            <label for="pais" class="control-label">País</label>
            <input type="text" name="direccion" class="form-control" value="{{$empleado->pais->descrip}}" readonly>
        </div>

        <div class="form-group">
            <label for="estado" class="control-label">Estado</label>
            <input type="text" name="direccion" class="form-control" value="{{$empleado->estado->descrip}}" readonly>
        </div>

        <div class="form-group">
            <label for="municipio" class="control-label">Municipio</label>
            <input type="text" name="direccion" class="form-control" value="{{$empleado->ciudad->descrip}}" readonly>
        </div>

        <div class="form-group">
            <label for="parroquia" class="control-label">Parroquia</label>
            <input type="text" name="direccion" class="form-control" value="{{$empleado->parroquia->descrip}}" readonly>
        </div>

        <div class="form-group">
            <label for="direccion" class="control-label">Dirección Detallada</label>
            <input type="text" name="direccion" class="form-control" value="{{$empleado->direccion}}" readonly>
        </div>

    	<div class="form-group">
    		<label for="correo" class="control-label">Correo Electrónico</label>
    		<input type="text" name="correo" class="form-control" value="{{$empleado->correo}}" readonly>
    	</div>

        <div class="form-group">
            <label for="cargo" class="control-label">Cargo que desempeña</label>
            <input type="text" name="cargo" class="form-control" value="{{$empleado->cargo->descrip}}" readonly>
        </div>

        <div class="form-group">
            <label for="role" class="control-label">Rol que desempeña en el Sistema</label>
            <input type="text" name="role" class="form-control" value="{{$empleado->role->descrip}}" readonly>
        </div>
        
        <br>
    	
        <div class="form-group">
            <a href="{{url('empleados')}}" class="btn btn-outline-primary" >
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-return-left" viewBox="0 0 16 16">
                  <path fill-rule="evenodd" d="M14.5 1.5a.5.5 0 0 1 .5.5v4.8a2.5 2.5 0 0 1-2.5 2.5H2.707l3.347 3.346a.5.5 0 0 1-.708.708l-4.2-4.2a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 8.3H12.5A1.5 1.5 0 0 0 14 6.8V2a.5.5 0 0 1 .5-.5z"/>
                </svg>
            Regresar
            </a>

            <a href="{{ url('empleados')}}/{{$empleado->id}}/{{('edit')}}" class="btn btn-outline-warning" >
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pen" viewBox="0 0 16 16">
                  <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001zm-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708l-1.585-1.585z"/>
                </svg>
            Editar
            </a>

    	</div>
    </form>
@endsection
