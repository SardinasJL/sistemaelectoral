<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use App\Models\Mesa;
use App\Models\Acta;

class ActaController extends Controller
{

    public function getAll()
    {
        $arrayActas = Acta::select("actas.id", "actas.fecha", "actas.horainicio", "actas.horafin", "actas.lista1", "actas.lista2", "actas.lista3", "actas.blancos", "actas.nulos", "actas.total", "actas.observaciones", "actas.mesa_id", "mesas.numero")
            ->join("mesas", "actas.mesa_id", "=", "mesas.id")
            ->get()
            ->sortBy("mesas.numero");;
        return view("acta.index")->with("arrayActas", $arrayActas);
    }

    public function getCreate()
    {
        $arrayMesas = Mesa::all()->sortBy("numero");
        return view("acta.create")->with("arrayMesas", $arrayMesas);

    }

    public function postCreate(Request $request)
    {
        $p = new Acta();
        $p->fecha = $request->fecha;
        $p->horainicio = $request->horainicio;
        $p->horafin = $request->horafin;
        $p->lista1 = $request->lista1;
        $p->lista2 = $request->lista2;
        $p->lista3 = $request->lista3;
        $p->blancos = $request->blancos;
        $p->nulos = $request->nulos;
        $p->total = $request->total;
        $p->observaciones = $request->observaciones;
        $p->mesa_id = $request->mesa_id;
        $p->save();
        return redirect()->action("App\Http\Controllers\ActaController@getAll");
    }

    public function getEdit($id)
    {
        //$mesa = Mesa::find($id);
        $arrayMesas = Mesa::all()->sortBy("numero");
        $acta = Acta::find($id);
        return view("acta.edit")->with("arrayMesas", $arrayMesas)
            ->with("acta", $acta);
    }

    public function postEdit(Request $request, $id)
    {
        $acta = Acta::find($id);
        $acta->fecha = $request->fecha;
        $acta->horainicio = $request->horainicio;
        $acta->horafin = $request->horafin;
        $acta->lista1 = $request->lista1;
        $acta->lista2 = $request->lista2;
        $acta->lista3 = $request->lista3;
        $acta->blancos = $request->blancos;
        $acta->nulos = $request->nulos;
        $acta->total = $request->total;
        $acta->observaciones = $request->observaciones;
        $acta->mesa_id = $request->mesa_id;
        $acta->save();
        return redirect()->action("App\Http\Controllers\ActaController@getAll");
    }

    public function Delete($id)
    {
        $acta = Acta::find($id);
        $acta->delete();
        return redirect()->action("App\Http\Controllers\ActaController@getAll");
    }


}
