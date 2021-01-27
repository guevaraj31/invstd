@extends('layouts.app')

@section('content')
<div class="container">
        <h2>Ventas</h2>
        <a href="{{ url('sales/create') }}" class="btn btn-primary mb-2">Crear</a>
        <table class="table table-bordered" id="sales_datatable">
            <thead>
                <tr>
                    <th>Producto</th>
                    <th>Vendedor</th>
                    <th>Cantidad</th>
                    <th>Precio de venta</th>
                </tr>
            </thead>
        </table>
</div>


@endsection