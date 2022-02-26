<head>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/bootstrap-select.min.js"></script>

</head>

<div class="box box-info padding-1">
    <div class="box-body">
        @if($success ?? '')
            @if ($success != "")
                <div class="alert alert-success">
                    <p>{{ $success }}</p>
                </div>
            @endif
        @endif

        <div class="form-group">
            {{ Form::label('Carátula') }}
            <input type="file" name="image" class="form-control" placeholder="Post Image">
            <br>
            @if(isset($libro->image))
                <img src="/image/{{ $libro->image }}" width="100px">
            @endif
            <br><hr>
        </div>

        <div class="form-group">
            {{ Form::label('nombre') }}
            {{ Form::text('nombre', $libro->nombre, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
            {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('categoria') }}
        </div>

        <select class="form-control m-bot15 selectpicker" name="categoria_id" data-live-search="true" required>
            @if ($categorias->count())
                @foreach($categorias as $c)
                    <option data-tokens="{{ $c->id }}" value="{{ $c->id }}" {{($libro->categoria_id== $c->id)?"selected":""}}>{{ $c->categoria }}</option>
                @endforeach
            @endif
        </select>

        <div class="form-group">
            {{ Form::label('ISBN') }}
            {{ Form::text('ISBN', $libro->ISBN, ['class' => 'form-control' . ($errors->has('ISBN') ? ' is-invalid' : ''), 'placeholder' => 'Isbn']) }}
            {!! $errors->first('ISBN', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('autor') }}
            {{ Form::text('autor', $libro->autor, ['class' => 'form-control' . ($errors->has('autor') ? ' is-invalid' : ''), 'placeholder' => 'Autor']) }}
            {!! $errors->first('autor', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('editorial') }}
            {{ Form::text('editorial', $libro->editorial, ['class' => 'form-control' . ($errors->has('editorial') ? ' is-invalid' : ''), 'placeholder' => 'Editorial']) }}
            {!! $errors->first('editorial', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="form-group">
            {{ Form::label('Archivo') }}
            <input type="file" name="archivo" class="form-control">
            <br>
            @if(isset($libro->archivo))
                <a href="/archivos/{{ $libro->archivo }}">descargar</a>
            @endif
            <br><hr>
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">APLICAR</button>
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
