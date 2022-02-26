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
                            <a class="btn btn-primary" href="{{ route('libros.index') }}"> ATRÁS</a>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $libro->nombre }}
                        </div>
                        <hr>
                        <div class="form-group">
                            <strong>Categoria:</strong>
                            {{ $libro->categoria->categoria }}
                        </div>
                        <hr>
                        <div class="form-group">
                            <strong>Isbn:</strong>
                            {{ $libro->ISBN }}
                        </div>
                        <hr>
                        <div class="form-group">
                            <strong>Autor:</strong>
                            {{ $libro->autor }}
                        </div>
                        <hr>
                        <div class="form-group">
                            <strong>Editorial:</strong>
                            {{ $libro->editorial }}
                        </div>
                        <hr>
                        <div class="form-group">
                            <strong>Carátula:</strong><br>
                            <img src="{{asset('image/').'/'.$libro->image}}" width="160px" height="240px">
                        </div>
                        @if($libro->archivo != "")
                        <div class="form-group">
                            <strong>Archivo:</strong><br>
                            <a class="btn btn-danger" href="{{asset('archivos/').'/'.$libro->archivo}}">DESCARGAR LIBRO</a>
                        </div>
                        @endif
                        <hr>
                        <object data="{{asset('archivos/').'/'.$libro->archivo}}" type="application/pdf" width="100%" height="800px">
                        </object>
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection
