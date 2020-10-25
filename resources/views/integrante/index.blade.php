@extends("layouts.master")

@section("content")

    <div class="container col-md-10 text-center">
        <h1>Integrantes</h1>
        <table class="table table-hover table-responsive-sm">
            <thead>
            <tr>
                <th scope="col">CI</th>
                <th scope="col">Nombres</th>
                <th scope="col">Apellidos</th>
                <th scope="col">Rol</th>
                <th scope="col">N° de mesa</th>
                <th scope="col"></th>
            </tr>

            </thead>
            <tbody>
            <!---Si el resultado fuera un objeto, emplear la flecha -> para acceder a los campos --->
            @foreach($arrayIntegrantes as $integrante)

                <tr>
                    <td>{{ $integrante->ci }}</td>
                    <td>{{ $integrante->nombres }}</td>
                    <td>{{ $integrante->apellidos }}</td>
                    <td>{{ $integrante->rol }}</td>
                    <td>{{ $integrante->numero }}</td>
                    <td><a href="{{ action("App\Http\Controllers\IntegranteController@getEdit", $integrante->id) }}" class="btn btn-primary">Editar</a>
                        <a href="{{ action("App\Http\Controllers\IntegranteController@Delete", $integrante->id) }}" class="btn btn-danger">Eliminar</a>
                    </td>
                </tr>

            @endforeach
            </tbody>
        </table>
        <a href="{{ url("integrantes/create") }}" class="btn btn-primary">Nuevo</a>
    </div>

@endsection

@section("script")



@endsection
