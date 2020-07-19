@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-container-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Crear
                </div>
                <div class="card-body">
                    <form method="POST" action="/products">
                        @csrf
                        <input name="name" id="name" placeholder="Nombre" type="text">
                        <input name="sku" id="sku" placeholder="Código de parte" type="text">
                        <input name="qty" id="qty" placeholder="Cantidad" type="number">
                        <input name="price" id="price" placeholder="Precio $" type="number">
                        <input type="submit" value="Guardar">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection