<?php

namespace App\Http\Controllers;

use App\Models\Mesa;
use Illuminate\Http\Request;
use DB;
use App\Models\Integrante;

class IntegranteController extends Controller
{
    private $arrayRoles = array(
        array("nombre" => "Presidente"),
        array("nombre" => "Secretario"),
        array("nombre" => "Delegado"),
        array("nombre" => "Notario")
    );

    public function getAll(){
        $arrayIntegrantes = Integrante::select("integrantes.id", "integrantes.ci", "integrantes.nombres", "integrantes.apellidos", "integrantes.rol", "integrantes.mesa_id", "mesas.numero")
        ->join("mesas", "integrantes.mesa_id", "=", "mesas.id")
        ->get()
        ->sortBy("mesas.numero");
        return view("integrante.index")->with("arrayIntegrantes", $arrayIntegrantes);
    }

    public function getCreate(){
        $arrayMesas = Mesa::all();
        return view("integrante.create")->with("arrayMesas", $arrayMesas)
            ->with("arrayRoles", $this->arrayRoles);
    }

    public function postCreate(Request $request){
        $p = new Integrante;
        $p->ci = $request->ci;
        $p->nombres = $request->nombres;
        $p->apellidos = $request->apellidos;
        $p->rol = $request->rol;
        $p->mesa_id = $request->mesa_id;
        $p->save();
        return redirect()->action("App\Http\Controllers\IntegranteController@getAll");
    }

    public function getEdit($id){
        $integrante = Integrante::select("integrantes.id", "integrantes.ci", "integrantes.nombres", "integrantes.apellidos", "integrantes.rol", "integrantes.mesa_id", "mesas.numero")
            ->join("mesas", "integrantes.mesa_id", "=", "mesas.id")
            ->where("integrantes.id", $id)
            ->get()
            ->sortBy("mesas.numero");
        $arrayMesas = Mesa::all();
        return view("integrante.edit")->with("integrante", $integrante[0])->with("arrayMesas", $arrayMesas)->with("arrayRoles", $this->arrayRoles);
    }

    public function postEdit(Request $request, $id){
        $integrante = Integrante::find($id);
        $integrante->ci = $request->ci;
        $integrante->nombres = $request->nombres;
        $integrante->apellidos = $request->apellidos;
        $integrante->rol = $request->rol;
        $integrante->mesa_id = $request->mesa_id;
        $integrante->save();
        return redirect()->action("App\Http\Controllers\IntegranteController@getAll");
    }

    public function Delete($id){
        $integrante = Integrante::find($id);
        $integrante->delete();
        return redirect()->action("App\Http\Controllers\IntegranteController@getAll");
    }

}
