<?php

namespace App\Http\Controllers;

use DB;
use App\Models\Acta;
use App\Models\Integrante;
use Illuminate\Http\Request;


class VotationController extends Controller
{
    public function getAll(){
        $votosLista1 = DB::table("actas")->sum("lista1");
        $votosLista2 = DB::table("actas")->sum("lista2");
        $votosLista3 = DB::table("actas")->sum("lista3");
        $votosBlancos = DB::table("actas")->sum("blancos");
        $votosNulos = DB::table("actas")->sum("nulos");
        $votosTotal = DB::table("actas")->sum("total");
        if ($votosTotal == 0) $votosTotal=1; //Esta línea de código previene que votosTotal sea 0 para evitar divisiones entre 0
        $arrayVotes = array(
            "votosLista1" => $votosLista1,
            "votosLista2" => $votosLista2,
            "votosLista3" => $votosLista3,
            "votosBlancos" => $votosBlancos,
            "votosNulos" => $votosNulos,
            "votosTotal" => $votosTotal
        );
        return view("general.index")->with("arrayVotes", $arrayVotes);

    }

}
