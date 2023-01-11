@extends('layouts.app')

@section('content')

<div class="col-sm-offset-3 col-sm-6">
    <div class="panel-body">
    	@include('common.errors')
    </div>

    <div class="panel-heading">
        <h3>Registro de Cargo</h3>
    </div>

    <form class="row g-3" action="{{ route('cargos.store') }}" method="POST">
    	{{ csrf_field() }}
        {{ method_field('POST') }}

        <div class="form-floating mb-3">
            <input type="text" id="floatingInput" name="descrip" class="form-control text-capitalize" autocomplete="off" required autofocus>
            <label for="descrip" class="control-label" required>Descripción del Cargo</label>
        </div>
    	<div class="form-group">
    		<button type="submit" class="btn btn-outline-primary">
     			<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                  <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                  <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                </svg>
                Registrar Nuevo Cargo	
    		</button>
    	</div>
    </form>
</div>


<!--     //Consulta de Cargos -->
<div class="col-sm-offset-3 col-sm-4"><br><br><br><br>
    <div class="col-md-12">
        @if (count($cargos) > 0 )
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3>Listado de Cargos</h3>
                </div>
                <div class="panel-body">
                    <table class="table table-striped task-table">
                        <thead>
                            <th>ID</th>
                            <th>Descripción</th>

                            <th>Acción</th>
                        </thead>
                        <tbody>
                            @foreach ($cargos as $cargo)
                                <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                <tr>
                                    <td class="table-text"><div>{{ $cargo->id }}</div></td>
                                    <td class="table-text"><div>{{ $cargo->descrip }}</div></td>
                                    <td class="btn-group" role="group" aria-label="Basic mixed styles example">
                                        <form action="{{ url('cargos/view')}}/{{$cargo->id}}" method="GET">
                                            
                                            {{ csrf_field() }}
                                            {{ method_field('GET') }}

                                            <button type="submit" class="btn btn-outline-info" title="Ver" onsubmit="return confirm('Seguro???') ">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                                  <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                                                  <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                                                </svg>
                                                <!-- Ver -->
                                            </button>
                                        </form>
                                    </td>
                                    <td class="btn-group" role="group" aria-label="Basic mixed styles example">
                                        <form action="{{ url('cargos')}}/{{$cargo->id}}/{{('edit')}}" method="POST">
                                            
                                            {{ csrf_field() }}
                                            {{ method_field('GET') }}

                                            <button type="submit" class="btn btn-outline-warning update-confirm" title="Editar" onsubmit="return confirm('Seguro???') ">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pen" viewBox="0 0 16 16">
                                                  <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001zm-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708l-1.585-1.585z"/>
                                                </svg>
                                                <!-- Actualizar -->
                                            </button>
                                        </form>
                                    </td>
                                    <td class="btn-group" role="group" aria-label="Basic mixed styles example">
                                        <form action="{{ url('cargos')}}/{{$cargo->id}}" method="POST">
                                            
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}

                                            <button type="submit" class="btn btn-outline-danger delete-confirm" title="Eliminar" onsubmit="return confirm('Seguro???') ">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                  <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                                  <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                                </svg>
                                                <!-- Eliminar -->
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            </div>
                            @endforeach

                        </tbody>
                    </table>
                        <div class=" d-flex justify-content-end">
                            {!! $cargos->links() !!}
                        </div>
                </div>
            </div>
        @endif
    </div> 	
</div>
@endsection