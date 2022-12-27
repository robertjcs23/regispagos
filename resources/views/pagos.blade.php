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
            <label for="empleado" class="control-label">Empleado que Registra</label>
            <select for="empleado" name='empleado' id='empleado' class="form-select" required>
                <option value=""> -- Selecciona -- </option>
                @foreach ($empleado as $empleado)
                    <option value="{{ $empleado['id'] }}">{{ $empleado['nombre'] }}</option>
                @endforeach
            </select>
        </div>

        <div class="col-md-6">
            <label for="cliente" class="control-label">Cliente</label>
            <select for="cliente" name='cliente' id='cliente' class="form-select" required>
                <option value=""> -- Selecciona -- </option>
                @foreach ($cliente as $cliente)
                    <option value="{{ $cliente['id'] }}">{{ $cliente['nombre'] }}</option>
                @endforeach
            </select>
        </div>

        <div class="col-md-6">
            <label for="tpago" class="control-label">Metodo de Pago</label>
            <select for="tpago" name='tpago' id='tpago_id' class="form-select" required>
                <option value=""> -- Selecciona -- </option>
                @foreach ($tpago as $tpago)
                    <option value="{{ $tpago['id'] }}">{{ $tpago['descrip'] }}</option>
                @endforeach
            </select>
        </div>

    	<div class="form-floating mb-3">
    		<input type="text" id="floatingInput" name="referencia" class="form-control" autocomplete="off" placeholder="12345678" maxlength="8" minlength="4" onkeypress="return event.charCode>=48 && event.charCode<=57" required>
            <label for="referencia" class="control-label">Número de Referencia</label>
    	</div>

    	<div class="form-floating mb-3">
    		<input type="number" step="any" id="floatingInput" name="monto" class="form-control" autocomplete="off" placeholder="string" maxlength="40" minlength="3" required>
            <label for="monto" class="control-label">Monto</label>
    	</div>

    	<div class="form-floating mb-3">
    		<input type="text" id="floatingInput" name="detalle" class="form-control" autocomplete="off" placeholder="string" maxlength="40" minlength="3" required>
            <label for="detalle" class="control-label">En caso de ser necesario, Breve descripción o detalle</label>
    	</div>

    	<div class="col-md-6">
    		<input type="date" id="floatingInput" name="fecha_r" class="form-control" autocomplete="off" placeholder="04xx1234567" value="<?php echo date("Y-m-d");?>" maxlength="11" minlength="11" readonly>
            <label for="fecha_r" class="control-label">Fecha de Registro -- HOY!</label>
    	</div>

        <div class="col-md-6">
            <input type="date" id="floatingInput" name="fecha_p" class="form-control" autocomplete="off" placeholder="string" value="<?php echo date("Y-m-d");?>" maxlength="200">
            <label for="fecha_p" class="control-label">Fecha en que se realizó el Pago</label>
        </div>

    	<div class="form-group">
    		<button type="submit" class="btn btn-outline-primary">
    			<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                  <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                  <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                </svg> Registrar Pago	
    		</button>

            <a href="{{url('clientes')}}" class="btn btn-outline-warning" >
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-90deg-left" viewBox="0 0 16 16">
                  <path fill-rule="evenodd" d="M1.146 4.854a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 4H12.5A2.5 2.5 0 0 1 15 6.5v8a.5.5 0 0 1-1 0v-8A1.5 1.5 0 0 0 12.5 5H2.707l3.147 3.146a.5.5 0 1 1-.708.708l-4-4z"/>
                </svg> Registrar Nuevo Cliente
            </a>
        </div>

    </form>

<!-- //consulta de pagos -->

    <div class="col-md-12"> <br><br><br><br>

        @if (count($pagos) > 0 )
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3>Listado de Pagos</h3>
                </div>

                <div class="panel-body">
                    <table class="table table-striped task-table">
                        <thead>

                            <th>ID Pago</th>
                            <th>Cliente</th>
                            <th>Referencia</th>
                            <th>fecha</th>
                            <th>Motivo</th>

                            <th>Acción</th>
                        </thead>

                        <tbody>
                            @foreach ($pagos as $pago)
                                <tr>
                                    <td class="table-text"><div>{{ $pago->id }}</div></td>
                                    <td class="table-text"><div>{{ $pago->cliente->nombre }}</div></td>
                                    <td class="table-text"><div>{{ $pago->referencia }}</div></td>
                                    <td class="table-text"><div>{{ $pago->fecha_p }}</div></td>
                                    <td class="table-text"><div>{{ $pago->detalle }}</div></td>

                                    <td class="btn-group" role="group" aria-label="Basic mixed styles example">
                                        <form action="{{ url('pagos/view')}}/{{$pago->id}}" method="GET">
                                            
                                            {{ csrf_field() }}

                                            <button type="submit" class="btn btn-outline-info" title="Ver" onsubmit="return confirm" >
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                                  <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                                                  <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                                                </svg>
                                                <!-- Ver -->
                                            </button>
                                        </form>
                                    </td>

<!--                                     <td>
                                        <form action="{{ url('pagos')}}/{{$pago->id}}/{{('edit')}}" method="POST">
                                            
                                            {{ csrf_field() }}
                                            {{ method_field('GET') }}

                                            <button type="submit" class="btn btn-outline-warning update-confirm" title="Editar" onsubmit="return confirm('Seguro???') ">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pen" viewBox="0 0 16 16">
                                                  <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001zm-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708l-1.585-1.585z"/>
                                                </svg>
                                            </button>

                                        </form>
                                    </td> -->
<!--                                     <td>
                                        <form action="{{ url('pagos')}}/{{$pago->id}}" method="POST">
                                            
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}

                                            <button type="submit" class="btn btn-outline-danger delete-confirm" title="Eliminar" onsubmit="return confirm('Seguro???') ">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                  <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                                  <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                                </svg>
                                            </button> -->

                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endif
    </div> 	
</div>
@endsection
