@extends('adminlte::page')

@section('title', 'Categorias')
@section('content_header')
    <div class="container">
        <h1>CATEGORÍAS</h1>
    </div>
@stop

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    LISTADO DE CATEGORIAS
                    <button type="button" class="btn btn-primary btn-sm float-right limpiar" data-toggle="modal"
                            data-target="#nuevaCategoria">
                        <i class='fa fa-plus'></i> Nueva categoria
                    </button>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Activo</th>
                        <th scope="col">Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($categorias as $categoria)
                        <tr>
                            <td scope="row">{{$categoria->id}}</td>
                            <td>{{$categoria->nombre}}</td>
                            <td>{{$categoria->activa == 1 ? 'SI' : 'NO'}}</td>
                            <td>
                                <button class="btn btn-outline-warning editar">
                                    <i class="fa fa-edit"></i>
                                </button>
                                <button type="button"  class="btn btn-outline-danger delete">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="nuevaCategoria" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Nueva categoria</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form>
                    <input type="hidden" id="id" value="0">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input type="text" class="form-control" aria-label="nombre" id="nombre"
                                   aria-describedby="nombre-categoria">
                            <div id="errorNombre"></div>
                        </div>
                        <div class="container">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" role="switch"
                                       id="activa">
                                <label class="form-check-label" for="evaluate_aval">Activa</label>
                            </div>

                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="button" id="guardar" class="btn btn-primary">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <a href="javascript:location.reload()" id="categoriaPage"></a>
@stop

@section('js')
    <script src="{{ asset('js/categorias.js') }}"></script>
@stop
