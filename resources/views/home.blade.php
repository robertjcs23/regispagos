@extends('layouts.app',[ 'page_title' => 'Home de Usuario'])

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ Auth::user()->name }},
                    {{ __('Usted ha iniciado Sesión Correctamente!!') }}
                </div>
            </div>

            <div class="card">
                <div class="card-header">{{ __('Dashboard-1') }}</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ Auth::user()->name }},
                    {{ __('Usted ha iniciado Sesión Correctamente!!') }}
                </div>
            </div>

            <div class="card">
                <div class="card-header">{{ __('Dashboard-2') }}</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ Auth::user()->name }},
                    {{ __('Usted ha iniciado Sesión Correctamente!!') }}
                </div>
            </div>

            <div class="card">
                <div class="card-header">{{ __('Dashboard-3') }}</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ Auth::user()->name }},
                    {{ __('Usted ha iniciado Sesión Correctamente!!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
