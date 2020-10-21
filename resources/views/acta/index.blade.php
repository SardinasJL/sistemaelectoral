@extends("layouts.master")

@section("content")

    <div class="container col-md-8 text-center">
        <h1>Actas</h1>
        <table class="table table-hover table-responsive-sm">
            <thead>
            <tr>
                <!---<th scope="col">Id</th>--->
                <th scope="col">Mesa</th>
                <th scope="col">Lista 1</th>
                <th scope="col">Lista 2</th>
                <th scope="col">Lista 3</th>
                <th scope="col">Blancos</th>
                <th scope="col">Nulos</th>
                <th scope="col">Total</th>
                <th scope="col"></th>
            </tr>

            </thead>
            <tbody>
            <!---Si el resultado fuera un objeto, emplear la flecha -> para acceder a los campos --->
            @foreach($arrayActas as $acta)

                <tr>
                    <td>{{ $acta->numero }}</td>
                    <td>{{ $acta->lista1 }}</td>
                    <td>{{ $acta->lista2 }}</td>
                    <td>{{ $acta->lista3 }}</td>
                    <td>{{ $acta->blancos }}</td>
                    <td>{{ $acta->nulos }}</td>
                    <td>{{ $acta->total }}</td>
                    <td><a href="{{ action("App\Http\Controllers\ActaController@getEdit", $acta->id) }}" class="btn btn-primary">Editar</a>
                        <a href="{{ action("App\Http\Controllers\ActaController@Delete", $acta->id) }}" class="btn btn-danger">Eliminar</a>
                    </td>
                </tr>

            @endforeach
            </tbody>
        </table>
        <a href="{{ url("actas/create") }}" class="btn btn-primary">Nuevo</a>
    </div>

@endsection

@section("script")



@endsection
