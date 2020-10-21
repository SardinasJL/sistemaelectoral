@extends("layouts.master")

@section("content")

    <div class="container col-md-8 text-center">
        <h1>Mesas</h1>
        <table class="table table-hover table-responsive-sm">
            <thead>
            <tr>
                <!---<th scope="col">Id</th>--->
                <th scope="col">Número de mesa</th>
                <th scope="col">Rol</th>
                <th scope="col">Integrante</th>
                <th scope="col"></th>
            </tr>

            </thead>
            <tbody>
            <!---Si el resultado fuera un objeto, emplear la flecha -> para acceder a los campos --->
            @foreach($arrayMesas as $mesa)

                <tr>
                    <!---<td>{{ $mesa->id }}</td>--->
                    <td>{{ $mesa->numero }}</td>
                    <td>{{ $mesa->rol }}</td>
                    <!---<td>{{ $mesa->integrante_id }}</td>--->
                    <td>{{ $mesa->apellidos . " " .$mesa->nombres}}</td>
                    <td><a href="{{ action("App\Http\Controllers\MesaController@getEdit", $mesa->id) }}" class="btn btn-primary">Editar</a>
                        <a href="{{ action("App\Http\Controllers\MesaController@Delete", $mesa->id) }}" class="btn btn-danger">Eliminar</a>
                    </td>
                </tr>

            @endforeach
            </tbody>
        </table>
        <a href="{{ url("mesas/create") }}" class="btn btn-primary">Nuevo</a>
    </div>

@endsection

@section("script")



@endsection
