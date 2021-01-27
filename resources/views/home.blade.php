@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-header">{{ __('Productos') }}</div>

                <div class="card-body">
                    <a href="/products" class="btn btn-primary btn-block">Listado de productos</a>
                </div>
            </div>
        </div>
        
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">{{ __('Ventas') }}</div>

                <div class="card-body">
                    <a href="/sales" class="btn btn-secondary btn-block">Listado de ventas</a>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-header">{{ __('Configuración') }}</div>

                <div class="card-body">
                    <a href="/#" class="btn btn-light btn-block">Usuarios</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
