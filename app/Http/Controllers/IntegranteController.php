<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Integrante;

class IntegranteController extends Controller
{
    public function getAll(){
        $arrayIntegrantes = Integrante::all();
        return view("integrante.index")->with("arrayIntegrantes", $arrayIntegrantes);
    }

    public function getCreate(){
        return view("integrante.create");
    }

    public function postCreate(Request $request){
        $p = new Integrante;
        $p->ci = $request->ci;
        $p->nombres = $request->nombres;
        $p->apellidos = $request->apellidos;
        $p->save();
        return redirect()->action("App\Http\Controllers\IntegranteController@getAll");
    }

    public function getEdit($id){
        $integrante = Integrante::find($id);
        return view("integrante.edit")->with("integrante", $integrante);
    }

    public function postEdit(Request $request, $id){
        $integrante = Integrante::find($id);
        $integrante->ci = $request->ci;
        $integrante->nombres = $request->nombres;
        $integrante->apellidos = $request->apellidos;
        $integrante->save();
        return redirect()->action("App\Http\Controllers\IntegranteController@getAll");
    }

    public function Delete($id){
        $integrante = Integrante::find($id);
        $integrante->delete();
        return redirect()->action("App\Http\Controllers\IntegranteController@getAll");
    }

}
