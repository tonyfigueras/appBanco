<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Pais;
use App\State;
use App\Banco;
class PaisController extends Controller
{
    /**
     * Retrieve countries data
     *
     * @return void
     */
    public function getpais()
    {
        $data = Pais::get();
        return response()->json($data);
    }
    /**
     * Retrieve states data
     *
     */
    public function getNombre(Request $request, $id_cliente)
    {
        $data = Banco::where('id_pais_banco', $request->id)->get();
        return response()->json($data);
    }

    public function getCodigo(Request $request)
    {
        $data = Banco::where('codigo_banco', $request->id)->get();
        return response()->json($data);
    }
}

 