@extends('layouts.app')

@section('content')
<div class="container">
    
    <div class="row justify-container-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h2>Editar {{ $product->name }}</h2>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ url('products/'.$product->id) }}">
                        @method('PUT')
                        @csrf
                        <ul>
                            <li>Nombre: <input type="text" value="{{ $product->name }}" id="name" name="name" required></li>
                            <li>SKU: <input type="text" value="{{ $product->sku }}" id="sku" name="sku" required></li>
                            <li>Cantidad: <input type="number" value="{{ $product->qty }}" id="qty" name="qty" required></li>
                            <li>Precio: <input type="text" value="{{ $product->price }}" id="price" name="price" required></li>

                        </ul>
                        <input type="submit" value="Guardar" class="btn btn-primary">
                        <a href="{{ url('products') }}" title="Regresar" class="btn btn-info">Regresar</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection