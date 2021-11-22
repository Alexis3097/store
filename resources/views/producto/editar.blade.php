@extends('adminlte::page')

@section('title', 'Dashboard')
@section('content_header')
    <div class="container"><h1>PRODUCTO</h1></div>
@stop

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                Editar producto
            </div>
            <div class="card-body">
                <form action="{{route('producto.update',['producto'=>$producto->id])}}" method="post"
                      enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="row">
                        <div class="col-md-9">
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="nombre" class="form-label">Nombre</label>
                                        <input type="text"
                                               class="form-control  @error('nombre') is-invalid @enderror"
                                               name="nombre"
                                               value="{{$producto->nombre}}"
                                               id="nombre" placeholder="nombre"/>
                                        @error('nombre')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="categoria_id" class="form-label">Tipo de usuario</label>
                                        <select class="form-control @error('categoria_id') is-invalid @enderror"
                                                id="categoria_id"
                                                name="categoria_id">
                                            <option selected value="0">SELECCIONE</option>
                                            @foreach($categorias as $categoria)
                                                <option
                                                    value="{{$categoria->id}}"
                                                    @if( (int) $categoria->id === (int) $producto->categoria_id) selected='selected' @endif>
                                                    {{$categoria->nombre}}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('categoria_id ')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="DescripcionLarga">Descripción del producto</label>
                                <div>
                                    <textarea required class="form-control @error('descripcion') is-invalid @enderror"
                                              name="descripcion"
                                              id="descripcion"> {{ old('descripcion') }}{{$producto->descripcion}}
                                    </textarea>
                                    @error('descripcion')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>

                        </div>
                        <div class="col-md-3">
                            <div class="card" style="width: 14rem;">
                                <img class="card-img-top" src="{{asset('uploads/productos/'.$producto->foto_ruta)}}"
                                     alt="Card image cap"
                                     id="foto_ruta">
                                <div class="card-body">
                                    <h5 class="card-title">Foto de producto</h5>
                                    <br>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="imagen" accept="image/*"
                                               name="foto_ruta">
                                        @if ($errors->has('foto_ruta'))
                                            <span class="help-block text-danger">
                                                        <strong>{{$errors->first('foto_ruta')}}</strong>
                                                    </span>
                                        @endif
                                        <label class="custom-file-label" for="inputGroupFile01">Adjuntar</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="d-flex justify-content-end">

                        <div>
                            <a href="{{route('producto.index')}}" class="btn btn-danger">Cancelar</a>
                            <button class="btn btn-primary" type="submit">Actualizar</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
@stop

@section('js')
    <script src="{{ asset('js/producto.js') }}"></script>
@stop
