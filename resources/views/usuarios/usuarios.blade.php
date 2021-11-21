@extends('adminlte::page')

@section('title', 'Usuarios')
@section('content_header')
    <div class="container"><h1>LISTADO</h1></div>
@stop

@section('content')
    <div class="container">
        <div class="flash-message">
            @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                @if(Session::has('alert-' . $msg))

                    <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close"
                                                                                             data-dismiss="alert"
                                                                                             aria-label="close">&times;</a>
                    </p>
                @endif
            @endforeach
        </div> <!-- end .flash-message -->
        <div class="card">
            <div class="card-header ">
                <div class="d-flex justify-content-between">
                    USUARIOS
                    <a href="{{route('usuarios.create')}}" class="btn btn-primary btn-sm float-right">
                        <i class='fa fa-plus'></i> Nuevo usuario
                    </a>

                </div>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Apellido paterno</th>
                        <th scope="col">Apellido materno</th>
                        <th scope="col">Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($usuarios as $usuario)
                        <tr>
                            <th scope="row">{{$usuario->id}}</th>
                            <td>{{$usuario->name}}</td>
                            <td>{{$usuario->lastname_1}}</td>
                            <td>{{$usuario->lastname_2}}</td>
                            <td>
                                <a href="{{route('usuarios.edit',['usuario'=>$usuario->id])}}"
                                   class="btn btn-outline-warning" data-toggle="tooltip" data-placement="left"
                                   title="Editar usuario"><i class="fa fa-edit"></i></a>
                                <span data-toggle="tooltip" data-placement="left" title="Eliminar usuario">
                                    <button type="button" name="delete_modal" class="btn btn-outline-danger delete">
                                            <i class="fa fa-trash"></i>
                                    </button>
                                </span>
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <a href="javascript:location.reload()" id="userPage"></a>
@stop

@section('css')
    /*
    <link rel="stylesheet" href="/css/admin_custom.css">*/
@stop

@section('js')
    <script src="{{ asset('js/usuarios.js') }}"></script>
@stop
