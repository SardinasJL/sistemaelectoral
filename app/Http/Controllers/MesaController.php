<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Mesa;
use App\Models\Integrante;

class MesaController extends Controller
{

    private $arrayRoles = array(
        array("nombre" => "Presidente"),
        array("nombre" => "Secretario"),
        array("nombre" => "Delegado"),
        array("nombre" => "Notario")
    );

    public function getAll()
    {
        //$arrayMesas = Mesa::all()->sortBy("numero");
        $arrayMesas = Mesa::select("mesas.id", "mesas.numero", "mesas.rol", "mesas.integrante_id", "integrantes.nombres", "integrantes.apellidos")
            ->join("integrantes", "mesas.integrante_id", "=", "integrantes.id")
            ->get()
            ->sortBy("numero");
        return view("mesa.index")->with("arrayMesas", $arrayMesas);
    }

    public function getCreate()
    {
        $arrayIntegrantes = Integrante::all();
        return view("mesa.create")->with("arrayIntegrantes", $arrayIntegrantes)
            ->with("arrayRoles", $this->arrayRoles);
    }

    public function postCreate(Request $request)
    {
        $p = new Mesa();
        $p->numero = $request->numero;
        $p->rol = $request->rol;
        $p->integrante_id = $request->integrante_id;
        $p->save();
        return redirect()->action("App\Http\Controllers\MesaController@getAll");
    }

    public function getEdit($id)
    {
        //$mesa = Mesa::find($id);
        $arrayIntegrantes = Integrante::all();
        $mesa = Mesa::select("mesas.id", "mesas.numero", "mesas.rol", "mesas.integrante_id", "integrantes.nombres", "integrantes.apellidos")
            ->join("integrantes", "mesas.integrante_id", "=", "integrantes.id")
            ->where("mesas.id", $id)
            ->get();
        return view("mesa.edit")->with("mesa", $mesa[0])
            ->with("arrayIntegrantes", $arrayIntegrantes)
            ->with("arrayRoles", $this->arrayRoles);
    }

    public function postEdit(Request $request, $id)
    {
        $mesa = Mesa::find($id);
        $mesa->numero = $request->numero;
        $mesa->rol = $request->rol;
        $mesa->integrante_id = $request->integrante_id;
        $mesa->save();
        return redirect()->action("App\Http\Controllers\MesaController@getAll");
    }

    public function Delete($id)
    {
        $mesa = Mesa::find($id);
        $mesa->delete();
        return redirect()->action("App\Http\Controllers\MesaController@getAll");
    }
}
