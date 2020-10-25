@extends("layouts.master")

@section("content")

    <div class="container text-center"><h1>Nueva mesa</h1></div>
    <div class="container col-md-6">
        <form action="{{ action("App\Http\Controllers\MesaController@postCreate") }}" method="POST">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="numero">Número de mesa</label>
                <input type="number" class="form-control" name="numero" id="numero" value="{{ old("numero") }}"
                       required>
                <div class="invalid-feedback">El número de mesa no es válido</div>
            </div>
            <div class="form-group">
                <label for="ubicacion">Ubicación</label>
                <textarea class="form-control" name="ubicacion" id="ubicacion" cols="30" rows="10" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Añadir integrante</button>
        </form>
    </div>

@endsection
