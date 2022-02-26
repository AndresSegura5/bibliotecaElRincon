@extends('layouts.app')
@section('template_title')
    Prestamos
@endsection
<?php
use Carbon\Carbon
?>

@inject('prestamosDetails','App\Http\Controllers\PrestamosController')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <span id="card_title">

                            {{ __('Préstamos') }} |
                            @if (Session::get("dataUser")->role == "bibliotecario")
                                <a href="/usuarios">Usuarios</a> |
                                <a href="/categorias">Categorías</a> |
                            @endif
                            <a href="/libros">Libros</a>
                            </span>

                            @if (Session::get("dataUser")->role != "bibliotecario")
                                @foreach($usuarios as $user)
                                    @if (Session::get("dataUser")->id == $user->id)
                                        @foreach($prestamos as $prestamo)
                                            @if($prestamo->id_usuario == $user->id)
                                                @if($prestamo->estaLibre == 0)
                                                    <div class="alert alert-danger" role="alert">
                                                        <b>
                                                            NO PUEDES SOLICITAR PRÉSTAMOS HASTA EL DÍA {{$prestamo->fechaLibre[8]}}{{$prestamo->fechaLibre[9]}}-{{$prestamo->fechaLibre[5]}}{{$prestamo->fechaLibre[6]}}-{{$prestamo->fechaLibre[0]}}{{$prestamo->fechaLibre[1]}}{{$prestamo->fechaLibre[2]}}{{$prestamo->fechaLibre[3]}}
                                                        </b>
                                                    </div>
                                                @endif
                                            @endif
                                        @endforeach
                                    @endif
                                @endforeach
                            @else
                                <div class="float-right">
                                    <a href="{{ route('prestamos.create') }}" class="btn btn-primary float-right"  data-placement="left">
                                        {{ __('SOLICITAR NUEVO PRÉSTAMO') }}
                                    </a>
                                </div>
                            @endif
                        </div>
                        <hr>
                        <div style="max-width: 50rem; margin: 0 auto" >
                            <p style="display: inline-block; background-color: #B0CDFFFF; padding: 0.4rem; font-weight: bold">DEVUELTO AUNQUE ATRASADO</p>
                            <p style="display: inline-block; background-color: #FFE999FF; padding: 0.4rem; font-weight: bold">PENDIENTE</p>
                            <p style="display: inline-block; background-color: #C3DC9CFF; padding: 0.4rem; font-weight: bold">DEVUELTO</p>
                            <p style="display: inline-block; background-color: #fca6a6; padding: 0.4rem; font-weight: bold">ATRASADO SIN DEVOLVER</p>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    @if($success ?? '')
                        @if ($success != "")
                            <div class="alert alert-success">
                                <p>{{ $success }}</p>
                            </div>
                        @endif
                    @endif
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                    <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        <th>Libro</th>
                                        @if (Session::get("dataUser")->role == "bibliotecario")
                                        <th>Usuario</th>
                                        @endif
                                        <th>Fecha del préstamo</th>
                                        <th>Fecha de entrega</th>
                                        <th>Fecha de devolución</th>
                                        <th>Estado</th>

                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                @if (Session::get("dataUser")->role == "bibliotecario")
                                @foreach ($prestamos as $prestamo)
                                    @if ($prestamo->estado == "atrasado" && $prestamo->fecha_devolucion_2 == "")
                                        <tr style="background-color: #fca6a6">
                                    @elseif ($prestamo->estado == "atrasado" && $prestamo->fecha_devolucion_2 != "")
                                        <tr style="background-color: #b0cdff">
                                    @elseif ($prestamo->estado == "pendiente")
                                        <tr style="background-color: #ffe999">
                                    @else
                                        <tr style="background-color: #c3dc9c">
                                    @endif
                                            <td>{{ ++$i }}</td>
                                            <td><b>{{ $prestamosDetails->getLibro($prestamo->id_libro)}}</b></td>
                                            <td>{{ $prestamosDetails->getUsuario($prestamo->id_usuario)}}</td>
                                            <td>{{$prestamo->fecha_prestamo[8]}}{{$prestamo->fecha_prestamo[9]}}-{{$prestamo->fecha_prestamo[5]}}{{$prestamo->fecha_prestamo[6]}}-{{$prestamo->fecha_prestamo[0]}}{{$prestamo->fecha_prestamo[1]}}{{$prestamo->fecha_prestamo[2]}}{{$prestamo->fecha_prestamo[3]}}</td>
                                            <td>{{$prestamo->fecha_devolucion_1[8]}}{{$prestamo->fecha_devolucion_1[9]}}-{{$prestamo->fecha_devolucion_1[5]}}{{$prestamo->fecha_devolucion_1[6]}}-{{$prestamo->fecha_devolucion_1[0]}}{{$prestamo->fecha_devolucion_1[1]}}{{$prestamo->fecha_devolucion_1[2]}}{{$prestamo->fecha_devolucion_1[3]}}</td>
                                            <td>{{$prestamo->fecha_devolucion_2}}</td>
                                            <td>{{ $prestamo->estado }}</td>
                                            <td>

                                            <form action="/prestamo/update" method="POST">
                                                @csrf
                                                <input type="hidden" name="id_libro" value="{{$prestamo->id_libro}}">
                                                <input type="hidden" name="id_usuario" value="{{$prestamo->id_usuario}}">
                                                <input type="hidden" name="fecha_devolucion_1" value="{{$prestamo->fecha_devolucion_1}}">
                                                <input type="hidden" name="id_prestamo" value="{{$prestamo->id}}">
                                                <input type="hidden" name="estado_actual" value="{{$prestamo->estado}}">
                                                <input type="hidden" name="fecha_prestamo" value="{{$prestamo->fecha_prestamo}}">
                                                @if($prestamo->estado == 'pendiente')
                                                <button type="submit" class="btn btn-success" {{($prestamo->estado=="devuelto")? 'disabled' : ''}}>
                                                    DEVOLVER LIBRO
                                                </button>
                                                @endif
                                                @if($prestamo->estado == 'atrasado' && $prestamo->fecha_devolucion_2 == "")
                                                    <button type="submit" class="btn btn-danger" {{($prestamo->estado=="devuelto")? 'disabled' : ''}}>
                                                        DEVOLVER LIBRO
                                                    </button>
                                                @endif
                                            </form>
                                        </td>
                                    </tr>

                                @endforeach
                                @else
                                    @foreach ($prestamos as $prestamo)
                                        @if (Session::get("dataUser")->id == $prestamo->id_usuario)

                                            @if ($prestamo->estado == "atrasado" && $prestamo->fecha_devolucion_2 == "")
                                                <tr style="background-color: #fca6a6">
                                            @elseif ($prestamo->estado == "atrasado" && $prestamo->fecha_devolucion_2 != "")
                                                <tr style="background-color: #b0cdff">
                                            @elseif ($prestamo->estado == "pendiente")
                                                <tr style="background-color: #ffe999">
                                            @else
                                                <tr style="background-color: #c3dc9c">
                                                    @endif
                                            <td>{{ ++$i }}</td>
                                            <td>{{ $prestamosDetails->getLibro($prestamo->id_libro)}}</td>
                                            <td>{{$prestamo->fecha_prestamo[8]}}{{$prestamo->fecha_prestamo[9]}}-{{$prestamo->fecha_prestamo[5]}}{{$prestamo->fecha_prestamo[6]}}-{{$prestamo->fecha_prestamo[0]}}{{$prestamo->fecha_prestamo[1]}}{{$prestamo->fecha_prestamo[2]}}{{$prestamo->fecha_prestamo[3]}}</td>
                                            <td>{{$prestamo->fecha_devolucion_1[8]}}{{$prestamo->fecha_devolucion_1[9]}}-{{$prestamo->fecha_devolucion_1[5]}}{{$prestamo->fecha_devolucion_1[6]}}-{{$prestamo->fecha_devolucion_1[0]}}{{$prestamo->fecha_devolucion_1[1]}}{{$prestamo->fecha_devolucion_1[2]}}{{$prestamo->fecha_devolucion_1[3]}}</td>
                                            <td>{{$prestamo->fecha_devolucion_2}}</td>
                                            <td>{{ $prestamo->estado }}</td>
                                            <td>

                                                <form action="/prestamo/update" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="id_libro" value="{{$prestamo->id_libro}}">
                                                    <input type="hidden" name="id_usuario" value="{{$prestamo->id_usuario}}">
                                                    <input type="hidden" name="fecha_devolucion_1" value="{{$prestamo->fecha_devolucion_1}}">
                                                    <input type="hidden" name="id_prestamo" value="{{$prestamo->id}}">
                                                    <input type="hidden" name="estado_actual" value="{{$prestamo->estado}}">
                                                </form>
                                            </td>
                                        </tr>
                                    @endif
                                    @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection
