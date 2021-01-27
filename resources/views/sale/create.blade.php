@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-container-center">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger" role="alert">
                {{ session('error') }}
            </div>
        @endif
    </div>
    <div class="row justify-container-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header text-center">
                    <h2>Venta</h2>
                </div>
                <div class="card-body">
                    <div class="col-sm-12">
                        <div class="col-sm-12 mb-2">
                            <label for="exampleDataList" class="form-label">Código del producto:</label>
                            <input class="form-control" list="datalistOptions" id="salesDataList" placeholder="Ingresar código del producto">
                            <datalist id="datalistOptions">
                                @foreach ($products as $product)
                                    <option value="{{$product->sku}}">
                                @endforeach
                            </datalist>
                        </div>
                        <div class="col-sm-12">
                            <a href="{{ url('sales') }}" title="Regresar" class="btn btn-light btn-block">Regresar</a>
                        </div>    
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header text-center">
                    <h2>Detalle de producto</h2>
                </div>
                <div class="card-body">
                    <form method="POST" action="/sales">
                        @csrf
                        <div class="mb-2">
                            <div class="col-sm-12">
                                SKU:         
                            </div>
                            <div class="col-sm-12">
                                <input class="form-control" name="product" id="product" placeholder="Código de parte" type="text">
                                <input class="form-control" name="product_sku" id="product_sku" type="hidden">
                            </div>
                            <div class="col-sm-12">
                                Nombre: 
                            </div>
                            <div class="col-sm-12">
                                <input class="form-control" name="name" id="name" placeholder="Nombre" type="text">
                            </div>
                            <div class="col-sm-12">
                                Cantidad:         
                            </div>
                            <div class="col-sm-12">
                                <input class="form-control" name="qty" id="qty" placeholder="Cantidad" type="number">
                            </div>
                            <div class="col-sm-12">
                                Precio: 
                            </div>
                            <div class="col-sm-12">
                                <input class="form-control" name="price" id="price" placeholder="Precio $" type="number">
                            </div>    
                            
                        </div>
                        <div>
                            <div class="col-sm-12 mb-2">
                                <input type="submit" value="Confirmar" class="btn btn-primary btn-block">
                            </div> 
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection