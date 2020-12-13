<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Banco;

class BancoController extends Controller
{
     public function createbanco(Request $request) {
        $car = new Banco();
        $car->nombre_banco = $request->nombre_banco;
        $car->codigo_banco = $request->codigo_banco;
        $car->id_pais_banco = $request->id_pais_banco;
        $car->save();

        return $car;
    }


     public  function editBanco(Request $request, $id_banco){
        $car = Banco::where('id_banco',$id_banco)->first();

         $car->nombre_banco = $request->nombre_banco;
        $car->codigo_banco = $request->codigo_banco;
        $car->id_pais_banco = $request->id_pais_banco;
        $car->save();

        return $car;
    }

    public function deleteBanco(Request $request, $id_banco){

       // $car = Banco::find($request->id_banco)->delete();
    	$car = Banco::where('id_banco', $id_banco)->delete();
    }

     public function allBancos(Request $request) {
        $cars = Banco::all();

        return $cars;
    }


}
