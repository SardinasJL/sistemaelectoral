@extends("layouts.master")

@section("content")

    <div class="container-fluid text-center"><h1>Editar usuario</h1></div>
    <div class="container col-md-6">
        <form action="{{ action("App\Http\Controllers\UserController@postEdit", $user->id) }}" method="post" id="form">
            @csrf
            <div class="form-group">
                <label for="name">Nombre</label>
                <input type="text" id="name" name="name" class="form-control" required minlength="1" maxlength="30" value="{{ $user->name }}">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email" id="email" maxlength="30" required value="{{ $user->email }}">
            </div>
            <div class="form-group">
                <label for="password">Contraseña</label>
                <input type="password" class="form-control" id="password" name="password" required minlength="8"
                       maxlength="70" value="{{ $user->password }}">
            </div>
            <div class="form-group">
                <label for="confirmpassword">Confirme la contraseña</label>
                <input type="password" class="form-control" id="confirmpassword" name="confirmpassword" required
                       minlength="8" maxlength="70" value="{{ $user->password }}">
            </div>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
    </div>

@endsection

@section("script")

    <script>
        $(document).ready(function () {
            $("#form").on('submit', function (event) {
                if($("#password").val() != $("#confirmpassword").val()){
                    event.preventDefault();
                    alert("Las contraseñas no coinciden");
                }
            });
        })

    </script>


@endsection
