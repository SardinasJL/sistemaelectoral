@extends("layouts.master")

@section("content")

    <div class="container col-md-6 text-center">
        <h1>Resultados de la votación</h1>
        <table class="table table-hover table-responsive-sm">
            <thead>
            <tr>
                <th scope="col">Detalle</th>
                <th scope="col">Votos</th>
                <th scope="col">Porcentaje</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <!---El resultado se recibe entre [] porque es un array (no es aconsejable emplear arrays) --->
                <!---Si el resultado fuera un objeto, emplear la flecha -> para acceder a los campos --->
                <td>Lista 1</td>
                <td>{{ $arrayVotes["votosLista1"] }}</td>
                <td>{{ round($arrayVotes["votosLista1"] * 100 / $arrayVotes["votosTotal"], 2) }}</td>
            </tr>
            <tr>
                <td>Lista 2</td>
                <td>{{ $arrayVotes["votosLista2"] }}</td>
                <td>{{ round($arrayVotes["votosLista2"] * 100 / $arrayVotes["votosTotal"], 2) }}</td>
            </tr>
            <tr>
                <td>Lista 3</td>
                <td>{{ $arrayVotes["votosLista3"] }}</td>
                <td>{{ round($arrayVotes["votosLista3"] * 100 / $arrayVotes["votosTotal"], 2) }}</td>
            </tr>
            <tr>
                <td>Votos blancos</td>
                <td>{{ $arrayVotes["votosBlancos"] }}</td>
                <td>{{ round($arrayVotes["votosBlancos"] * 100 / $arrayVotes["votosTotal"], 2) }}</td>
            </tr>
            <tr>
                <td>Votos nulos</td>
                <td>{{ $arrayVotes["votosNulos"] }}</td>
                <td>{{ round($arrayVotes["votosNulos"] * 100 / $arrayVotes["votosTotal"], 2) }}</td>
            </tr>
            </tbody>
            <tfoot>
            <tr>
                <td>Total</td>
                <td>{{ $arrayVotes["votosTotal"] }}</td>
                <td>{{ round($arrayVotes["votosTotal"] * 100 / $arrayVotes["votosTotal"], 2) }}</td>
            </tr>
            </tfoot>
        </table>
    </div>

@endsection
