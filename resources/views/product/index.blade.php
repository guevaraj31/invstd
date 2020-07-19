@extends('layouts.app')

@section('content')
<div class="container">
        <h2>Productos</h2>
        <a href="{{ url('products/create') }}" class="btn btn-primary">Crear</a>
        <table class="table table-bordered" id="products_datatable">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>SKU</th>
                    <th>Cantidad</th>
                    <th>Precio</th>
                    <th>Opciones</th>
                </tr>
            </thead>
        </table>
</div>
@endsection