<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  
    <link  href="/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="/css/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <script src="/js/jquery.js"></script>  
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/jquery.dataTables.min.js" defer></script>

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <script>
    function confirmarProducto(id)
    {
        $("#confirmarModal").modal("show");
        console.log("eliminar producto:"+id);
    }
    function eliminarProducto()
    {
        $("#confirmarModal").modal("hide");
        $("#eliminarModal").modal("show");
    }
    $(document).ready( function () {
        $('#products_datatable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ url('products-list') }}",
            columns: [
                        { data: 'name', name: 'name' },
                        { data: 'sku', name: 'sku' },
                        { data: 'qty', name: 'qty' },
                        { data: 'price', name: 'price' },
                        { 
                            mRender: function (data, type, row) {
                                return "<a href=\"/products/"+row.id+"\" title='Ver'><i class='fa fa-eye' aria-hidden='true'></i></a>  <a href=\"/products/"+row.id+"/edit\" title='Editar'><i class='fa fa-pencil' aria-hidden='true'></i></a>  <a href='#' onclick='confirmarProducto("+row.id+")' title='Eliminar'><i class='fa fa-trash' aria-hidden='true'></i></a>";
                            }
                        }
                    ]
            });
        });

        $(document).ready( function () {
        $('#sales_datatable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ url('sales-list') }}",
            columns: [
                        { data: 'product_id', name: 'product_id' },
                        { data: 'user_id', name: 'user_id' },
                        { data: 'qty', name: 'qty' },
                        { data: 'price', name: 'price' }
                        /*{ 
                            mRender: function (data, type, row) {
                                return "<a href=\"/products/"+row.id+"\" title='Ver'><i class='fa fa-eye' aria-hidden='true'></i></a>  <a href=\"/products/"+row.id+"/edit\" title='Editar'><i class='fa fa-pencil' aria-hidden='true'></i></a>  <a href='#' onclick='confirmarProducto("+row.id+")' title='Eliminar'><i class='fa fa-trash' aria-hidden='true'></i></a>";
                            }
                        }*/
                    ]
            });

        $('#salesDataList').change(function(){
            var productSku = $("#salesDataList").val();
            $.ajax({
                    url: "{{ url('product-detail') }}/" + $('#salesDataList').val()
                }).done(function( data ) {
                    $("#product_sku").val( productSku );
                    $("#product").val( productSku );
                    $("#name").val( data.name );
                    $("#price").val( data.price );
                    $("#qty").val( data.qty );
                    //console.log( data.price );
                    /*$('#saleDetailBox').html('<p>SKU : <input class="form-control" name="product_sku" id="product_sku" type="text" value = "' + productSku + '" disabled></p>'
                                               +'<p>Nombre:  <input class="form-control" name="name" id="name" type="text" value = "'+ data.name +'" disabled> </p>'
                                               +'<p>Precio($) :  <input class="form-control" name="price" id="price" type="text" value = "' + data.price + '" disabled></p>'
                                               +'<p>Existencia : <input class="form-control" name="qty" id="qty" type="text" value = "' + data.qty + '" disabled></p>'
                    );*/        
                });
            
        });
        });
    </script>
</body>
</html>