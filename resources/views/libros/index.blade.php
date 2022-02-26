@extends('layouts.app')
@inject('libroCat','App\Http\Controllers\LibroController')
@section('template_title')
    Libro
@endsection
<?php
?>

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Libros') }} |
                                @if (Session::get("dataUser")->role == "bibliotecario")
                                    <a href="/usuarios">Usuarios</a> |
                                    <a href="/prestamos">Préstamos</a> |
                                    <a href="/categorias">Categorías</a>
                                @else
                                    <a href="/prestamos">Préstamos</a>
                                @endif
                            </span>
                            @if (Session::get("dataUser")->role == "bibliotecario")

                             <div class="float-right">
                                <a href="{{ route('libros.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('CREAR NUEVO') }}
                                </a>
                              </div>
                                @endif
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
                    <form action="{{ route('libros.index') }}" method="GET" role="search">
                        <div class="input-group" style="width: 30%; float: right; margin: 2rem 1rem">
                            <input type="text" class="form-control" name="term" placeholder="BUSCAR" id="term" style="margin-right: 1rem">
                            <span class="input-group-btn">
                                <button class="btn btn-success" type="submit" id="botonBuscar" title="Buscar">
                                    <i class="fa fa-search"></i>
                                </button>
                                <a href="{{ route('libros.index') }}" class=" mt-1">
                                    <button class="btn btn-info" type="button" title="Refrescar">
                                        <i class="fa fa-refresh"></i>
                                    </button>
                                </a>
                           </span>

                        </div>
                    </form>
                    <div class="card-body">
                            <table class="table table-striped table-hover">
                                <thead class="thead">

                                    <tr>
                                        <th>No</th>
										<th>Carátula</th>
										<th>Nombre</th>
										<th>Categoría</th>
										<th>ISBN</th>
										<th>Autor</th>
										<th>Editorial</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($libros as $libro)
                                        <tr>
                                            @if($libro->disponible == "si")
                                            <td>{{ ++$i }}</td>

											<td><img src="{{asset('image/').'/'.$libro->image}}" id="preview" width="50px" height="80px"></td>
											<td><b>{{ $libro->nombre }}</b></td>
											<td>{{ $categoria = $libroCat->getCategoria($libro->categoria_id)}}</td>
											<td>{{ $libro->ISBN }}</td>
											<td>{{ $libro->autor }}</td>
											<td>{{ $libro->editorial }}</td>

                                            <td>
                                                <form action="{{ route('libros.destroy',$libro->id) }}" method="POST">
                                                    @if (Session::get("dataUser")->role == "bibliotecario")
                                                    <a class="btn btn-sm btn-primary " href="{{ route('libros.show',$libro->id) }}"><i class="fa fa-fw fa-eye"></i> VER</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('libros.edit',$libro->id) }}"><i class="fa fa-fw fa-edit"></i> EDITAR</a>
                                                    @csrf
                                                     @method('DELETE')
                                                    <button onclick="return confirm('¿ESTAS SEGURO DE QUE DESEAS BORRAR EL LIBRO?');" type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> BORRAR</button>
                                                    @endif
                                                </form>
                                            </td>
                                                @endif
                                        </tr>

                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $libros->links() !!}
            </div>
        </div>
    </div>
@endsection
