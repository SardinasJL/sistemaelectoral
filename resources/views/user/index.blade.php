@extends("layouts.master")

@section("content")

    <div class="container text-center"><h1>Usuarios</h1></div>
    <div class="container col-md-6 text-center">
        <table class="table table-hover">
            <thead>
            <tr>
                <th scope="col">Nombre</th>
                <th scope="col">Email</th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>

            @foreach($arrayUsers as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <a href="{{ action("App\Http\Controllers\UserController@getEdit", $user->id)  }}" class="btn btn-primary">Editar</a>
                        <a href="{{ action("App\Http\Controllers\UserController@delete", $user->id) }}" class="btn btn-danger">Eliminar</a>
                    </td>
                </tr>
            @endforeach

            </tbody>

        </table>
        <a href="{{ url("users/create") }}" class="btn btn-primary">Nuevo usuario</a>

    </div>

@endsection
