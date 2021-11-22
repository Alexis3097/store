@extends('adminlte::page')

@section('title', 'Home')
@section('content_header')
    <div class="container"><h1>DASHBOARD</h1></div>
@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="card text-white bg-success ">
                    <div class="card-header">PRODUCTOS</div>
                    <div class="card-body">
                        <h2>TOTAL: </h2>
                        <P>5 PRODUCTOS</P>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-white bg-warning  ">
                    <div class="card-header">CLIENTES</div>
                    <div class="card-body">
                        <h2>TOTAL: </h2>
                        <P>5 CLIENTES</P>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-white bg-danger ">
                    <div class="card-header">CATEGORIAS</div>
                    <div class="card-body">
                        <h2>TOTAL: </h2>
                        <P>5 CATEGORIAS</P>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop


@section('js')
@stop
