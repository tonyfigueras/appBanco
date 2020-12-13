<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Clientes;

class ClienteController extends Controller
{
    public function CrearCliente(Request $request) {
        $car = new Clientes();
        $car->cedula = $request->cedula;
        $car->nombres = $request->nombres;
        $car->apellidos = $request->apellidos;
        $car->direccion = $request->direccion;
        $car->correo = $request->correo;
        $car->telefono = $request->telefono;
        $car->save();

        return $car;
    }

    public function allCliente(Request $request) {
        $cars = Clientes::all();

        return $cars;
    }

    
    
    

    public  function updateCliente(Request $request, $id_cliente){
        $car = Clientes::where('id_cliente',$id_cliente)->first();

    
         $car->cedula = $request->cedula;
        $car->nombres = $request->nombres;
        $car->apellidos = $request->apellidos;
         $car->direccion = $request->direccion;
        $car->correo = $request->correo;
        $car->telefono = $request->telefono;
       
        $car->save();

        return $car;
    }

    public function deleteCliente(Request $request, $id_cliente){

       // $car = Banco::find($request->id_banco)->delete();
        $car = Clientes::where('id_cliente', $id_cliente)->delete();
    }
}
