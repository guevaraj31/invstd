@extends('layouts.app')

@section('content')
<div class="container">
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
                                <option value="San Francisco">
                                <option value="New York">
                                <option value="Seattle">
                                <option value="Los Angeles">
                                <option value="Chicago">
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
                    <h2>Detalle de venta</h2>
                </div>
                <div class="card-body">
                    <form method="POST" action="/sales">
                        @csrf
                        <div class="col-sm-12">
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