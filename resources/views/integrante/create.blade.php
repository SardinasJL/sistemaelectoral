@extends("layouts.master")

@section("content")

    <div class="container text-center"><h1>Nuevo integrante</h1></div>
    <div class="container col-md-6">
        <form action="{{ action("App\Http\Controllers\IntegranteController@postCreate") }}" method="POST">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="ci">CI</label>
                <input type="number" class="form-control" name="ci" id="ci" value="{{ old("ci") }}" required>
                <div class="invalid-feedback">El CI no es válido</div>
            </div>
            <div class="form-group">
                <label for="nombres">Nombres</label>
                <input type="text" class="form-control" name="nombres" id="nombres" value="{{ old("nombres") }}"
                       required>
                <div class="invalid-feedback">No es un nombre válido</div>
            </div>
            <div class="form-group">
                <label for="apellidos">Apellidos</label>
                <input type="text" class="form-control" name="apellidos" id="apellidos" value="{{ old("apellidos") }}"
                       required>
                <div class="invalid-feedback">No es un apellido válido</div>
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
                <label for="mesa_id">Número de mesa</label>
                <select class="form-control" name="mesa_id" id="mesa_id">

                    @foreach($arrayMesas as $mesa)

                        <option value="{{ $mesa->id }}">{{ $mesa->numero }}</option>

                    @endforeach

                </select>
            </div>
            <button type="submit" class="btn btn-primary">Añadir integrante</button>
        </form>
    </div>

@endsection
