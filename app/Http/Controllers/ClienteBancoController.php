<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Banco;
use App\Clientes;
use App\ClienteBanco;
use DB;
class ClienteBancoController extends Controller
{
    

	public function crearclientebanco(Request $request, $cod, $co) {
        $car = new ClienteBanco();
        $car->cedula_cliente = $request->cedula;
        $car->codigo_banco = $request->cod;
        $car->num_cuenta = $co;
       
        $car->save();

        return $car;
    }

    public function allCuenta(Request $request, $id) {
         $cars = Banco::join("cliente_bancos", "cliente_bancos.codigo_banco", "=", "banco.codigo_banco")
					->join("pais", "pais.id_pais", "=", "banco.id_pais_banco")
					->where("cliente_bancos.cedula_cliente", "=", $id)
					->select("cliente_bancos.num_cuenta","cliente_bancos.cedula_cliente","cliente_bancos.id_cliente_banco","banco.id_pais_banco","banco.nombre_banco", "banco.codigo_banco", "banco.id_banco", "pais.nombre_pais", "pais.id_pais")
					->distinct()->get();
return $cars;

    }


      public function Validacion(Request $request, $cod, $ci) {


      	$count = DB::table('cliente_bancos')->
      				where("codigo_banco", "=", $cod)->
      				where("cedula_cliente", "=", $ci)->count();

			if($count > 0) {
			     $cars=1;
			}else {
			     $cars=0;
			}


       
return $cars;

    }



  public  function updaCuentaCliente(Request $request, $ci){
        $car = ClienteBanco::find($ci);

    	
         $car->codigo_banco = $cod;
       
        $car->save();

        return $car;
    }

    public function deleteCuenta(Request $request, $id){

       // $car = Banco::find($request->id_banco)->delete();
        $car = ClienteBanco::where('id_cliente_banco', $id)->delete();
    }

}
