@extends('layouts.app')

@section('template_title')
    Actualizar Libro
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Actualizar Libro</span>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('libros.index') }}"> ATRÁS</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('libros.update', $libro->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('libros.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
