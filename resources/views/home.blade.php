@extends('layouts.app')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<style>
    .modal-backdrop {
        opacity:1 !important;
    }
</style>
@section('content')
    @foreach($prestamos as $prestamo)
        @if( Session::get("dataUser")->id == $prestamo->id_usuario)
            @if($prestamo->estado== 'atrasado' && $prestamo->fecha_devolucion_2 == '')
                <script>
                    $(function() {
                        $('#basicExampleModal').modal('show');
                    });
                </script>
                <div class="modal fade" id="basicExampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <!--
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">MENSAJE PARA EL USUARIO</h5>
                            </div>-->
                            <div class="modal-body">
                                <p style="color: red; font-size: 1.3rem; text-align: center">TIENES PRÉSTAMOS ATRASADOS SIN DEVOLVER</p> <br> <p style="color: red; font-size: 1.3rem; text-align: center">HASTA QUE NO LOS DEVUELVAS NO PODRÁS SOLICITAR NUEVOS PRÉSTAMOS</p>
                            </div>
                            <div class="modal-footer" style="margin: 0 auto">
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">CERRAR AVISO</button>
                            </div>
                        </div>
                    </div>
                </div>

            @endif
        @endif
    @endforeach
    <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header" style="text-align: center">
                    @if (Session::get("dataUser")->role == "bibliotecario")
                        <h2 style="text-align: center">{{ __('PANEL DE ADMINISTRADOR-BIBLIOTECARIO') }}</h2>
                    @else
                        <h2 style="text-align: center">{{ __('PANEL DE USUARIO-ALUMNO') }}</h2>
                    @endif
                    <hr>
                    <a class="btn btn-primary" href="/libros">LIBROS</a>
                    <a class="btn btn-primary" href="/prestamos">PRÉSTAMOS</a>
                    @if (Session::get("dataUser")->role == "bibliotecario")
                        <a class="btn btn-primary" href="/usuarios">USUARIOS</a>
                        <a class="btn btn-primary" href="/categorias">CATEGORÍAS</a>

                    @endif
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form enctype="multipart/form-data" method="post" action="{{route('updateuser')}}">
                        {{ csrf_field() }}
                        <h2 style="text-align: center">DATOS</h2>
                        <div class="form-group">
                            <div class="row"><label>Nombre : </label><input class="form-control" name="name" type="text" value='{{ Session::get("dataUser")->name }}'></div>
                            <div class="row"><label>E-mail : </label><input class="form-control" name="email" type="text" value='{{ Session::get("dataUser")->email }}' readonly></div>
                            <div class="row"><label>Foto : </label><input class="form-control" name="foto" data-preview="#preview" type="file" id="imageInput"></div>
                            <div class="row" style="margin:2rem auto;width: 10rem; height: 10rem"><img src="{{asset('image/').'/'.Session::get('dataUser')->foto}}" id="preview"></div>
                        </div>
                        <div class="form-group">
                            <input class="form-control btn btn-secondary" type="submit" value="ACTUALIZAR DATOS">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<script src="{{ asset('/prestamos/create')}}"></script>
