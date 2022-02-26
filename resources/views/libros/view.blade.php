@extends('layouts.app')

@section('template_title')
    {{ $libro->name ?? 'VER LIBRO' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">VER LIBRO</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="/"> ATRÁS</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $libro->nombre }}
                        </div>
                        <br>
                        <div class="form-group">
                            <strong>Categoria:</strong>
                            {{ $libro->categoria->categoria }}
                        </div>
                        <br>
                        <div class="form-group">
                            <strong>Isbn:</strong>
                            {{ $libro->ISBN }}
                        </div>
                        <br>
                        <div class="form-group">
                            <strong>Autor:</strong>
                            {{ $libro->autor }}
                        </div>
                        <br>
                        <div class="form-group">
                            <strong>Editorial:</strong>
                            {{ $libro->editorial }}
                        </div>
                        <br>
                        <div class="form-group" style="float: left">
                            <img src="{{asset('image/').'/'.$libro->image}}" width="160px" height="240px">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
