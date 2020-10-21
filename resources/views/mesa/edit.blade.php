@extends("layouts.master")

@section("content")

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
                <label for="rol">Rol</label>

                <select class="form-control" name="rol" id="rol">
                    @foreach($arrayRoles as $rol)
                        @if($rol["nombre"] == $mesa->rol)
                            <option value="{{ $rol["nombre"] }}" selected>{{ $rol["nombre"] }}</option>
                        @else
                            <option value="{{ $rol["nombre"] }}">{{ $rol["nombre"] }}</option>
                        @endif
                    @endforeach
                </select>

            </div>
            <div class="form-group">
                <label for="integrante_id">Integrante</label>

                <select class="form-control" name="integrante_id" id="integrante_id">
                    @foreach($arrayIntegrantes as $integrante)
                        @if($integrante->id == $mesa->integrante_id)
                            <option
                                value="{{ $integrante->id }}"
                                selected>{{ $integrante->apellidos . " " . $integrante->nombres }}</option>
                        @else
                            <option
                                value="{{ $integrante->id }}">{{ $integrante->apellidos . " " . $integrante->nombres }}</option>
                        @endif
                    @endforeach
                </select>

            </div>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
    </div>

@endsection
