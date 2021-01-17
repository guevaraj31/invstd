@extends('layouts.app')

@section('content')
<div class="container">
    
    <div class="row justify-container-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2> {{ $product->name }}</h2>
                </div>
                <div class="card-body">
                    <div class="mb-2">
                        <div class="col-sm-6">
                            SKU:         
                        </div>
                        <div class="col-sm-6">
                            <input class="form-control" type="text" value="{{ $product->sku }}" id="sku" name="sku" required disabled>
                        </div>
                        <div class="col-sm-6">
                            Cantidad:         
                        </div>
                        <div class="col-sm-6">
                            <input class="form-control" type="number" value="{{ $product->qty }}" id="qty" name="qty" required disabled>
                        </div>
                        <div class="col-sm-6">
                            Precio: 
                        </div>
                        <div class="col-sm-6">
                            <input class="form-control" type="text" value="{{ $product->price }}" id="price" name="price" required disabled>
                        </div>    
                        
                    </div>
                    <div>
                        <div class="col-sm-6">
                            <a href="{{ url('products') }}" title="Regresar" class="btn btn-light btn-block">Regresar</a>
                        </div>    
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection