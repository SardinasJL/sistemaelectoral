@extends("layouts.master")

@section("content")

    <div class="container text-center"><h1>Editar acta</h1></div>
    <div class="container col-md-6">
        <form action="{{ action("App\Http\Controllers\ActaController@postEdit", $acta->id) }}" method="POST">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="mesa_id">Número de acta</label>
                <select class="form-control" name="mesa_id" id="mesa_id">
                    @foreach($arrayMesas as $mesa)

                        @if($acta->mesa_id == $mesa->id)
                            <option value="{{ $mesa->id }}" selected>{{ $mesa->numero }}</option>
                        @else
                            <option value="{{ $mesa->id }}">{{ $mesa->numero }}</option>
                        @endif

                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="fecha">Fecha</label>
                <input class="form-control" type="date" name="fecha" id="fecha" value="{{ $acta->fecha }}" required>
            </div>
            <div class="form-group">
                <label for="horainicio">Hora de inicio</label>
                <input class="form-control" type="time" name="horainicio" id="horainicio" value="{{ $acta->horainicio }}" required>
            </div>
            <div class="form-group">
                <label for="horafin">Hora de finalización</label>
                <input class="form-control" type="time" name="horafin" id="horafin" value="{{ $acta->horafin }}" required>
            </div>
            <div class="form-group">
                <label for="lista1">Lista 1</label>
                <input class="form-control" type="number" name="lista1" id="lista1" step="1" min="0" max="9999"
                       value="{{ $acta->lista1 }}" required>
            </div>
            <div class="form-group">
                <label for="lista2">Lista 2</label>
                <input class="form-control" type="number" name="lista2" id="lista2" step="1" min="0" max="9999"
                       value="{{ $acta->lista2 }}" required>
            </div>
            <div class="form-group">
                <label for="lista3">Lista 3</label>
                <input class="form-control" type="number" name="lista3" id="lista3" step="1" min="0" max="9999"
                       value="{{ $acta->lista3 }}" required>
            </div>
            <div class="form-group">
                <label for="blancos">Blancos</label>
                <input class="form-control" type="number" name="blancos" id="blancos" step="1" min="0" max="9999"
                       value="{{ $acta->blancos }}" required>
            </div>
            <div class="form-group">
                <label for="nulos">Nulos</label>
                <input class="form-control" type="number" name="nulos" id="nulos" step="1" min="0" max="9999"
                       value="{{ $acta->nulos }}" required>
            </div>
            <div class="form-group">
                <label for="total">Total</label>
                <input class="form-control" type="number" name="total" id="total" step="1" min="0" max="9999" readonly
                       value="{{ $acta->total }}" required>
            </div>
            <div class="form-group">
                <label for="observaciones">Observaciones</label>
                <textarea class="form-control" name="observaciones" id="observaciones" cols="10" rows="10"
                          required>{{ $acta->observaciones }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Guardar acta</button>
        </form>
    </div>

@endsection

@section("script")

    <script>
        $(document).ready(function () {
            var inputs_numbers = $("input[type='number']");
            inputs_numbers.keyup(function () {
                var total = 0;
                for (var i = 0; i < inputs_numbers.length - 1; i++) {
                    var number = inputs_numbers.eq(i).val();
                    if (!isNaN(number) && number != "") {
                        total = total + parseInt(number);
                        console.log(total);
                    }

                }
                $("#total").val(total);
            });
        })
    </script>

@endsection
