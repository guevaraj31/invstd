@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-container-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2>Crear</h2>
                </div>
                <div class="card-body">
                    <form method="POST" action="/products">
                        @csrf
                        <div class="mb-2">
                            <div class="col-sm-6">
                                Nombre: 
                            </div>
                            <div class="col-sm-6">
                                <input class="form-control" name="name" id="name" placeholder="Nombre" type="text">
                            </div>
                            <div class="col-sm-6">
                                SKU:         
                            </div>
                            <div class="col-sm-6">
                                <input class="form-control" name="sku" id="sku" placeholder="Código de parte" type="text">
                            </div>
                            <div class="col-sm-6">
                                Cantidad:         
                            </div>
                            <div class="col-sm-6">
                                <input class="form-control" name="qty" id="qty" placeholder="Cantidad" type="number">
                            </div>
                            <div class="col-sm-6">
                                Precio: 
                            </div>
                            <div class="col-sm-6">
                                <input class="form-control" name="price" id="price" placeholder="Precio $" type="number">
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