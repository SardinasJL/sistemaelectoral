@extends("layouts.master")

@section("content")

    <div class="row">
        <div class="container col-md-6 text-center align-items-center">
            <h1>Resultados de la votación</h1>
            <table class="table table-hover">
                <thead class="bg-dark text-white">
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
                <tr class="font-weight-bold">
                    <td>Total</td>
                    <td>{{ $arrayVotes["votosTotal"] }}</td>
                    <td>{{ round($arrayVotes["votosTotal"] * 100 / $arrayVotes["votosTotal"], 2) }}</td>
                </tr>
                </tfoot>
            </table>
        </div>

        <div class="container col-md-6" id="container"></div>

    </div>

@endsection

@section("script")
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script>
        Highcharts.setOptions({
            colors: Highcharts.map(Highcharts.getOptions().colors, function (color) {
                return {
                    radialGradient: {
                        cx: 0.5,
                        cy: 0.3,
                        r: 0.7
                    },
                    stops: [
                        [0, color],
                        [1, Highcharts.color(color).brighten(-0.3).get('rgb')] // darken
                    ]
                };
            })
        });

        // Build the chart
        Highcharts.chart('container', {
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            title: {
                text: ''
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
            },
            accessibility: {
                point: {
                    valueSuffix: '%'
                }
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: true,
                        format: '<b>{point.name}</b>',
                        connectorColor: 'silver'
                    }
                }
            },
            series: [{
                name: 'Share',
                data: [
                    {name: '{{ 'Lista 1' }}', y: {{ round($arrayVotes["votosLista1"] * 100 / $arrayVotes["votosTotal"], 2) }}},
                    {name: '{{ 'Lista 2' }}', y: {{ round($arrayVotes["votosLista2"] * 100 / $arrayVotes["votosTotal"], 2) }}},
                    {name: '{{ 'Lista 3' }}', y: {{ round($arrayVotes["votosLista3"] * 100 / $arrayVotes["votosTotal"], 2) }}},
                    {name: '{{ 'Blancos' }}', y: {{ round($arrayVotes["votosBlancos"] * 100 / $arrayVotes["votosTotal"], 2) }}, color: 'gray'},
                    {name: '{{ 'Nulos' }}', y: {{ round($arrayVotes["votosNulos"] * 100 / $arrayVotes["votosTotal"], 2) }}, color:'black'},
                ]
            }]
        });
    </script>
@endsection
