@extends('layouts.app')

@section('content')
<div class="container">
    
    <div class="row justify-container-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2>Editar {{ $product->name }}</h2>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ url('products/'.$product->id) }}">
                        @method('PUT')
                        @csrf
                        <div class="mb-2">
                            <div class="col-sm-6">
                                Nombre: 
                            </div>
                            <div class="col-sm-6">
                                <input class="form-control" type="text" value="{{ $product->name }}" id="name" name="name" required>
                            </div>
                            <div class="col-sm-6">
                                SKU:         
                            </div>
                            <div class="col-sm-6">
                                <input class="form-control" type="text" value="{{ $product->sku }}" id="sku" name="sku" required>
                            </div>
                            <div class="col-sm-6">
                                Cantidad:         
                            </div>
                            <div class="col-sm-6">
                                <input class="form-control" type="number" value="{{ $product->qty }}" id="qty" name="qty" required>
                            </div>
                            <div class="col-sm-6">
                                Precio: 
                            </div>
                            <div class="col-sm-6">
                                <input class="form-control" type="text" value="{{ $product->price }}" id="price" name="price" required>
                            </div>    
                            
                        </div>
                        <div>
                            <div class="col-sm-6 mb-2">
                                <input type="submit" value="Guardar" class="btn btn-primary btn-block">
                            </div>
                            <div class="col-sm-6">
                                <a href="{{ url('products') }}" title="Regresar" class="btn btn-light btn-block">Regresar</a>
                            </div>    
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection