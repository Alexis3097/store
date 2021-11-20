@extends('adminlte::page')

@section('title', 'Dashboard')
@section('content_header')
    <div class="container"><h1>Usuario</h1></div>
@stop

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                Editar
            </div>
            <div class="card-body">
                <form action="{{route('usuarios.update',['usuario'=>$usuario->id])}}" method="post">
                    @method('put')
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Nombre completo</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                               name="name"
                               value="{{ $usuario->name}}"
                               placeholder="Tú nombre">
                        @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label for="lastname_1" class="form-label">Apellido paterno</label>
                                <input type="text" class="form-control @error('lastname_1') is-invalid @enderror"
                                       value="{{ $usuario->lastname_1}}" name="lastname_1"
                                       id="lastname_1" placeholder="Apellido paterno"/>
                                @error('lastname_1')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <label for="lastname_2" class="form-label">Apellido materno</label>
                                <input type="text" class="form-control @error('lastname_2') is-invalid @enderror"
                                       value="{{ $usuario->lastname_2}}" name="lastname_2"
                                       id="lastname_2" placeholder="Apellido materno">
                                @error('lastname_2')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label for="email" class="form-label">Correo</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                                       placeholder="ejemplo.com" value="{{ $usuario->email}}" name="email">
                                @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <label for="tipo_usuario_id" class="form-label">Tipo de usuario</label>
                                <select class="form-control @error('tipo_usuario_id') is-invalid @enderror"
                                        id="tipo_usuario_id"
                                        name="tipo_usuario_id">
                                    <option selected value="0">SELECCIONE</option>
                                    @foreach($tipoUsuarios as $tipoUsuario)
                                        <option value="{{$tipoUsuario->id}}" @if( (int) $tipoUsuario->id === (int) $usuario->tipo_usuario_id) selected='selected' @endif>
                                            {{$tipoUsuario->tipo}}
                                        </option>
                                    @endforeach
                                </select>
                                @error('tipo_usuario_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>


                    <div class="d-flex justify-content-end">
                        <div>
                            <a href="{{route('usuarios.index')}}" class="btn btn-danger">Cancelar</a>
                            <button class="btn btn-primary" type="submit">Actualizar</button>
                        </div>
                    </div>

                </form>
            </div>

        </div>
    </div>
@stop

@section('css')
    /*
    <link rel="stylesheet" href="/css/admin_custom.css">*/
@stop

@section('js')
@stop
