@extends('layouts.app')

@section('content')

<div class="col-sm-offset-3 col-sm-6">
    <div class="panel-body">
    	@include('common.errors')
    </div>
    <form  action="{{ url('update') }}" method="POST">
    	{{ csrf_field() }}

        <input type="hidden" name="cargo_id" value=" {{ $cargo->id }} ">

        <div class="form-group">
            <label for="cargo_id" class="control-label">Descripción del Cargo</label>
            <input type="text" name="cargo_id" class="form-control" value=" {{$cargo->descrip}} ">
        </div>
    	<div class="form-group">
    		<button type="submit" class="btn btn-outline-primary">
    			<i class="fa fa-plus"></i> Actualizar Cargo	
    		</button>
    	</div>
    </form>

</div>
@endsection