@extends('layouts.app')

@section('content')
<div class="container">
    
    <div class="row justify-container-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h2> {{ $product->name }}</h2>
                </div>
                <div class="card-body">
                    <ul>
                        <li>SKU: {{ $product->sku }}</li>
                        <li>Cantidad: {{ $product->qty }}</li>
                        <li>Precio: {{ $product->price }}</li>

                    </ul>
                    <a href="{{ url('products') }}" title="Regresar" class="btn btn-info">Regresar</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection