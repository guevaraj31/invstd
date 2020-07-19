@extends('layouts.app')

@section('content')
<div class="container">
        <h2>Productos</h2>
        <table class="table table-bordered" id="products_datatable">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>SKU</th>
                    <th>Cantidad</th>
                    <th>Precio</th>
                </tr>
            </thead>
        </table>
</div>
@endsection