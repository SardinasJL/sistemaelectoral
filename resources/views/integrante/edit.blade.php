@extends("layouts.master")

@section("content")

    <div class="container text-center"><h1>Editar integrante</h1></div>
    <div class="container col-md-6">
        <form action="{{ action("App\Http\Controllers\IntegranteController@postEdit", $integrante->id) }}"
              method="POST">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="ci">CI</label>
                <input type="number" class="form-control" name="ci" id="ci" value="{{ $integrante->ci }}" min="100"
                       max="999999999" step="1" title="No es un CI válido" required>
                <div class="invalid-feedback">El CI no es válido</div>
            </div>
            <div class="form-group">
                <label for="nombres">Nombres</label>
                <input type="text" class="form-control" name="nombres" id="nombres" value="{{ $integrante->nombres }}"
                       minlength="1" maxlength="50" title="No es un nombre válido" required>
                <div class="invalid-feedback">No es un nombre válido</div>
            </div>
            <div class="form-group">
                <label for="apellidos">Apellidos</label>
                <input type="text" class="form-control" name="apellidos" id="apellidos"
                       value="{{ $integrante->apellidos }}" maxlength="50" title="No es un apellido válido" required>
                <div class="invalid-feedback">No es un apellido válido</div>
            </div>
            <div class="form-group">
                <label for="rol">Rol</label>
                <select class="form-control" name="rol" id="rol">

                    @foreach($arrayRoles as $rol)

                        @if($rol["nombre"] == $integrante->rol)
                            <option value="{{ $rol["nombre"] }}" selected>{{ $rol["nombre"] }}</option>
                        @else
                            <option value="{{ $rol["nombre"] }}">{{ $rol["nombre"] }}</option>
                        @endif

                    @endforeach

                </select>
            </div>
            <div class="form-group">
                <label for="mesa_id">Número de mesa</label>
                <select class="form-control" name="mesa_id" id="mesa_id">

                    @foreach($arrayMesas as $mesa)

                        @if($mesa->id == $integrante->mesa_id)
                            <option value="{{ $mesa->id }}" selected>{{ $mesa->numero }}</option>
                        @else
                            <option value="{{ $mesa->id }}">{{ $mesa->numero }}</option>
                        @endif

                    @endforeach

                </select>
            </div>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
    </div>

@endsection
