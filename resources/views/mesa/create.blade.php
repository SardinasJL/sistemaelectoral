@extends("layouts.master")

@section("content")

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
                <label for="rol">Rol</label>
                <select class="form-control" name="rol" id="rol">
                    @foreach($arrayRoles as $rol)
                        <option value="{{ $rol["nombre"] }}">{{ $rol["nombre"] }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="integrante_id">Integrante</label>
                <select class="form-control" name="integrante_id" id="integrante_id">
                    @foreach($arrayIntegrantes as $integrante)
                        <option
                            value="{{ $integrante->id }}">{{ $integrante->apellidos . " " . $integrante->nombres }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Añadir integrante</button>
        </form>
    </div>

@endsection
