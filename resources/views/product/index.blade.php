@extends('layouts.app')

@section('content')
<div class="container">
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
        <h2>Productos</h2>
        <a href="{{ url('products/create') }}" class="btn btn-primary mb-4">Crear</a>
        <a href="{{ url('home') }}" class="btn btn-light mb-4">Regresar</a>
        <table class="table table-bordered" id="products_datatable">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>SKU</th>
                    <th>Cantidad</th>
                    <th>Precio</th>
                    <th>Opciones</th>
                </tr>
            </thead>
        </table>
</div>

<!-- Modal -->
<div class="modal fade" id="confirmarModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">⚠️Eliminar</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <p>¿Eliminar el producto?</p>
        </div>
        <div class="modal-footer">
            <form action="{{ url('products-delete') }}" method="POST">
                @method('PUT')
                @csrf
                <input type="hidden" name="sku_d" id="sku_d">
                <button type="submit" class="btn btn-primary">Si</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
            </form>
            
        </div>
      </div>
      
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="eliminarModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Información</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <p>El producto ha sido eliminado</p>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">OK</button>
        </div>
      </div>
      
    </div>
  </div>
@endsection