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
                    @forelse ($products as $product)
                        <li>{{ $product->name }}</li>
                    @empty
                        <p>No hay productos disponibles</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>
@endsection