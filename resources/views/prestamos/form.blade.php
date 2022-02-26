<?php
use Carbon\Carbon;
$dt = Carbon::now()
?>
<head>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/bootstrap-select.min.js"></script>

</head>
<div class="padding-1">
    <div class="box-body">
        @if($success ?? '')
            @if ($success != "")
                <div class="alert alert-success">
                    <p>{{ $success }}</p>
                </div>
            @endif
        @endif


        <div class="form-group">
            <label>LIBROS DISPONIBLES</label>
            <select class="form-control m-bot15 selectpicker" name="id_libro" data-live-search="true" require>
                @if ($libros->count())
                    @foreach($libros as $libro)
                        <option data-tokens="{{ $libro->id }}" value="{{ $libro->id }}">{{ $libro->nombre }}</option>
                    @endforeach
                @endif
            </select>

        </div>

        @if (Session::get("dataUser")->role == "bibliotecario")
            <div class="form-group">
                <label>USUARIOS</label>

                <select class="form-control m-bot15 selectpicker" name="id_usuario"  data-live-search="true" require>
                    @if (count($usuarios))
                        @foreach($usuarios as $user)
                            <option data-tokens="{{ $user->id }}" value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    @endif
                </select>
            </div>
        @else

        <select style="display: none; visibility: hidden" name="id_usuario" >

            @if (count($usuarios))
            @foreach($usuarios as $user)
                    @if( Session::get("dataUser")->id == $user->id)
                        <option data-tokens="{{$user->id}}" value="{{$user->id}}">{{$user->name}}</option>
                    @endif
                @endforeach
            @endif
        </select>
        @endif

        <hr>
        <div class="form-group">
            <input style="display: none" name="fecha_prestamo" type="text" class="form-control m-bot15" value="{{$fecha_actual}}" readonly>
            <p style="color: green"><b>FECHA DE PRÉSTAMO: {{$dt->toDateString()}}</b></p>
        </div>
        <hr>
        <div class="form-group">
            <p style="color: red"><b>FECHA DE DEVOLUCIÓN: {{$dt->addDays(5)->toDateString()}}</b></p>
        </div>
        <hr>
    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">REALIZAR PRÉSTAMO</button>
    </div>
</div>
<script>
    $(function() {
        $('.selectpicker').selectpicker();
    });

</script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/bootstrap-select.min.js"></script>
