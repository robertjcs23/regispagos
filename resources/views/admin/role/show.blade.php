@extends('layouts.app',[ 'page_title' => 'Ver Detalles del Rol'])

@section('content')

<div class="col-sm-offset-3 col-sm-6">
    <div class="panel-body">
    	@include('common.errors')
    </div>
    <form action="{{ url('view')}}/{{$role->id}}">
    	{{ csrf_field() }} 

        <div class="form-group">
            <label for="descrip" class="control-label">Descripción del Rol</label>
            
            <input type="text" name="descrip" class="form-control" value="{{$role->name}}" readonly>

        </div><br>
    </form>
    <a href="{{url('roles')}}" class="btn btn-outline-primary" >
		<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-return-left" viewBox="0 0 16 16">
		  <path fill-rule="evenodd" d="M14.5 1.5a.5.5 0 0 1 .5.5v4.8a2.5 2.5 0 0 1-2.5 2.5H2.707l3.347 3.346a.5.5 0 0 1-.708.708l-4.2-4.2a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 8.3H12.5A1.5 1.5 0 0 0 14 6.8V2a.5.5 0 0 1 .5-.5z"/>
		</svg>
        Regresar
    </a>
    <a href="{{ url('roles')}}/{{$role->id}}/{{('edit')}}" class="btn btn-outline-warning" >
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pen" viewBox="0 0 16 16">
      <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001zm-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708l-1.585-1.585z"/>
    </svg>
    Editar
    </a>
</div>
@endsection