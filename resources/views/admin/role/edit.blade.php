@extends('layouts.app',[ 'page_title' => 'Editar Rol'])

@section('content')

<div class="col-sm-offset-3 col-sm-6">
    <div class="panel-body">
    	@include('common.errors')
    </div>
    <form action="{{ url('roles/edit')}}/{{$role->id}}" method="POST">
    	{{ csrf_field() }} 
        {{ method_field('PUT') }}

        <!-- <input type="hidden" name="_method" value="PUT"> -->

        <div class="form-group">
            <label for="descrip" class="control-label">Modificar Descripción del Rol</label>
            <input type="text" name="descrip" class="form-control" value="{{$role->descrip}}" autocomplete="off" required autofocus>

        </div>
    	<div class="form-group">
    		<button type="submit" class="btn btn-outline-primary">
    			<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check2" viewBox="0 0 16 16">
                  <path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z"/>
                </svg>
                Actualizar Rol	
    		</button>
            <a href="{{url('roles')}}" class="btn btn-outline-warning" >
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-return-left" viewBox="0 0 16 16">
                  <path fill-rule="evenodd" d="M14.5 1.5a.5.5 0 0 1 .5.5v4.8a2.5 2.5 0 0 1-2.5 2.5H2.707l3.347 3.346a.5.5 0 0 1-.708.708l-4.2-4.2a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 8.3H12.5A1.5 1.5 0 0 0 14 6.8V2a.5.5 0 0 1 .5-.5z"/>
                </svg>
            Regresar
            </a>
            <a href="{{url('roles')}}" class="btn btn-outline-danger" >
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-circle" viewBox="0 0 16 16">
                  <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                  <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                </svg>
                Cancelar
            </a>
    	</div>
    </form>

</div>
@endsection