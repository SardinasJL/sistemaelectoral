<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Mesa;
use App\Models\Integrante;

class MesaController extends Controller
{

    public function getAll()
    {
        $arrayMesas = Mesa::all();
        return view("mesa.index")->with("arrayMesas", $arrayMesas);
    }

    public function getCreate()
    {
        return view("mesa.create");
    }

    public function postCreate(Request $request)
    {
        $p = new Mesa();
        $p->numero = $request->numero;
        $p->ubicacion = $request->ubicacion;
        $p->save();
        return redirect()->action("App\Http\Controllers\MesaController@getAll");
    }

    public function getEdit($id)
    {
        $mesa = Mesa::find($id);
        return view("mesa.edit")->with("mesa", $mesa);
    }

    public function postEdit(Request $request, $id)
    {
        $mesa = Mesa::find($id);
        $mesa->numero = $request->numero;
        $mesa->ubicacion = $request->ubicacion;
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
