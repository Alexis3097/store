<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>ecomerce</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="{{asset('css/app.css')}}" type="text/css">


    <!-- Custom styles for this template -->
    <link rel="stylesheet" href="{{asset('css/album.css')}}" type="text/css">
</head>

<body>

<header>
    <div class="collapse bg-dark" id="navbarHeader">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 col-md-7 py-4">
                    <h4 class="text-white">E-comerce</h4>
                    <p class="text-muted">Bienvenido, Busca entre todas las categorias disponibles y muchos de los
                        productos màs vendidos.</p>
                </div>
                <div class="col-sm-4 offset-md-1 py-4">
                    <h4 class="text-white">Opciones</h4>
                    <ul class="list-unstyled">
                        <li><a href="{{route('login')}}" class="text-white">Iniciar session</a></li>
                        <li><a href="#" class="text-white">Registrarse</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="navbar navbar-dark bg-dark box-shadow">
        <div class="container d-flex justify-content-between">
            <a href="#" class="navbar-brand d-flex align-items-center">
                <strong>E-COMERCE</strong>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarHeader"
                    aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </div>
</header>

<main role="main">

    <section class="jumbotron text-center">
        <div class="container">
            <h1 class="jumbotron-heading">TIENDA EN LINEA</h1>
            <h2 class="jumbotron-heading">CATEGORIA: {{$productos[0]->categoriaProducto->nombre}}</h2>
            <p class="lead text-muted">Bienvenido, Busca entre todas las categorias disponibles y muchos de los
                productos màs vendidos .</p>


            <form action="{{route('categoria.productos.buscar',['idCategoria'=>$productos[0]->categoriaProducto->id])}}">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Buscar" aria-label="Buscar"
                           aria-describedby="basic-addon2"
                           name="busqueda">
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-outline-primary">Buscar</button>
                    </div>
                </div>
            </form>

        </div>
    </section>

    <div class="album py-5 bg-light">
        <div class="container">
            @if(!is_null($productos))
                <div class="row">
                    @foreach($productos as $producto)

                        <div class="col-md-4">
                            <div class="card mb-4 box-shadow">
                                <img class="card-img-top" src="{{asset('uploads/productos/'.$producto->foto_ruta)}}"
                                     alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title">PRODUCTO: {{strtoupper($producto->nombre)}}</h5>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="btn-group">
                                            <a href="{{route('producto.detallado',['id'=>$producto->id])}}"
                                               class="btn btn-sm btn-outline-secondary">Ver Productos</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                    @endforeach
                </div>
            @endif
        </div>
    </div>

</main>

<footer class="text-muted">
    <div class="container">
        <p class="float-right">
            <a href="#">Back to top</a>
        </p>
    </div>
</footer>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="{{asset('vendor/jquery/jquery.min.map')}}"></script>
<script src="{{asset('vendor/jquery/jquery.js')}}"></script>
<script src="{{asset('vendor/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{asset('vendor/popper/popper.min.js')}}"></script>

</body>
</html>
