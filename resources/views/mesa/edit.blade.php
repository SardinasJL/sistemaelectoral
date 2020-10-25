@extends("layouts.master")

@section("content")

    <div class="container text-center"><h1>Editar mesa</h1></div>
    <div class="container col-md-6">
        <form action="{{ action("App\Http\Controllers\MesaController@postEdit", $mesa->id) }}" method="POST">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="numero">Número de mesa</label>
                <input type="number" class="form-control" name="numero" id="numero" value="{{ $mesa->numero }}"
                       min="1" max="100" step="1" title="No es un número de mesa válido" required>
                <div class="invalid-feedback">El número de mesa no es válido</div>
            </div>
            <div class="form-group">
                <label for="ubicacion">Ubicación</label>
                <textarea class="form-control" name="ubicacion" id="ubicacion" cols="30" rows="10"
                          required>{{ $mesa->ubicacion }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
    </div>

@endsection
