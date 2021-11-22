@extends('adminlte::page')

@section('title', 'Productos')
@section('content_header')
    <div class="container"><h1>PRODUCTOS</h1></div>
@stop

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    LISTADO DE PRDUCTOS
                    <a type="button" class="btn btn-primary btn-sm float-right limpiar"
                       href="{{route('producto.create')}}"
                       data-target="#nuevaCategoria">
                        <i class='fa fa-plus'></i> Nuevo producto
                    </a>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Categoría</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Descripción</th>
                        <th scope="col">Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    <div class="container">
                        @foreach($productos as $producto)
                            <tr>
                                <td scope="row">{{$producto->id}}</td>
                                <td>{{$producto->categoriaProducto->nombre}}</td>
                                <td>{{$producto->nombre}}</td>
                                <td>{{$producto->descripcion}}</td>
                                <td>
                                    <a class="btn btn-outline-warning editar"
                                       href="{{route('producto.edit', ['producto'=>$producto->id])}}">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <button type="button" class="btn btn-outline-danger delete">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </div>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <a href="javascript:location.reload()" id="productosPage"></a>
@stop


@section('js')
    <script src="{{ asset('js/producto.js') }}"></script>
@stop
