<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Aportes;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class AporteController extends Controller
{
    //
    public function indexAporte()
    {
        $categorias = DB::select("select id,nome from tb_r_gruposaportes where grupo <> 'Lançamento'");
        $descricoes = DB::select('select id,nome from tb_t_categoriasaportes order by nome asc');

        return view('aporte.lancamento', ['categorias' => $categorias, 'descricoes' => $descricoes]);
    }

    public function indexInvestimento()
    {
        # code...
    }

   /**
     * Store a new apote in the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeAporte(Request $request)
    {
        $idUser = Auth::user()->id;
        $descricao = $request->descricao;
        $idcat = DB::select("select id from tb_t_categoriasaportes where nome = '$descricao'");

        $apote = new Aportes;

        $apote->valor = $request->valor;
        $apote->data = $request->data;
        $apote->descricao = $request->observacao;
        $apote->user_id = $idUser;
        $apote->grupo_id = $request->categoria;
        $apote->categoria_id = $idcat[0]->id;

        try {
            $apote->save();
            return redirect()->back()->with('success', 'Lançamento efetuado com sucesso!');
            
        } catch (\Throwable $th) {

            return redirect()->back()->with('danger', 'Ocorreu um erro ao fazer o lançamento.');
        }

    }
}
