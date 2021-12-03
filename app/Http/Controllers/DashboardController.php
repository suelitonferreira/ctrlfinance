<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $saldo = $this->saldoMensal();
        foreach ($saldo as $key => $value) {
            $saldo = $value;
        }

        return view('dashboard', ['saldo' => $saldo]);
    }

    public function anualGasto()
    {
        $idUser = Auth::user()->id;
        $month = [];
        $ano = date('Y');
        $dia = '01';

        for ($i=1; $i <= 12; $i++) { 

            $mes = date("M", strtotime($ano."-".$i."-".$dia));
            $month[$mes] = 0;
        }

        $gastos = DB::select(
            "select
                month(apt.data) as mes,
                sum(apt.valor) as total
            from
                tb_t_aportes as apt
            inner join tb_r_gruposaportes grp on
                grp.id = apt.grupo_id
                and grp.grupo not in('Lançamento','Investimento','Ganho')
            where
                apt.user_id = '$idUser'
                and year(apt.data) = ?
            group by
                month(apt.data)", [$ano]
        );

        foreach ($gastos as $res){
            
            $data = $ano.'-'.$res->mes.'-01';

            $mes = date("M", strtotime($data));

            $month[$mes] = $res->total;
        }

        return $month;
    }

    public function anualInvestimento()
    {
        $idUser = Auth::user()->id;
        $month = [];
        $ano = date('Y');
        $dia = '01';

        for ($i=1; $i <= 12; $i++) { 

            $mes = date("M", strtotime($ano."-".$i."-".$dia));
            $month[$mes] = 0;
        }

        $gastos = DB::select(
            "select
                month(apt.data) as mes,
                sum(apt.valor) as total
            from
                tb_t_aportes as apt
            inner join tb_r_gruposaportes grp on
                grp.id = apt.grupo_id
                and grp.grupo not in('Lançamento','Gasto','Ganho')
            where
                apt.user_id = '$idUser'
                and year(apt.data) = ?
            group by
                month(apt.data)", [$ano]
        );

        foreach ($gastos as $res){
            
            $data = $ano.'-'.$res->mes.'-01';

            $mes = date("M", strtotime($data));

            $month[$mes] = $res->total;
        }

        return $month;
    }
    public function anualReceita()
    {
        $idUser = Auth::user()->id;
        $month = [];
        $ano = date('Y');
        $dia = '01';

        for ($i=1; $i <= 12; $i++) { 

            $mes = date("M", strtotime($ano."-".$i."-".$dia));
            $month[$mes] = 0;
        }

        $gastos = DB::select(
            "select
                month(apt.data) as mes,
                sum(apt.valor) as total
            from
                tb_t_aportes as apt
            inner join tb_r_gruposaportes grp on
                grp.id = apt.grupo_id
                and grp.grupo not in('Lançamento','Gasto','Investimento')
            where
                apt.user_id = '$idUser'
                and year(apt.data) = ?
            group by
                month(apt.data)", [$ano]
        );

        foreach ($gastos as $res){
            
            $data = $ano.'-'.$res->mes.'-01';

            $mes = date("M", strtotime($data));

            $month[$mes] = $res->total;
        }

        return $month;
    }

    public function saldoMensal()
    {
        $idUser = Auth::user()->id;
        $month = date('m');
        
        $dados = DB::select(
            "select
                case
                    when (receita.total - dispesa.total) >= 0 then 'DISPONÍVEL'
                    else 'DEVENDO'
                end as nome,
                (receita.total - dispesa.total) as valor
            from
                (select COALESCE(SUM(valor),0) as total from tb_t_aportes where grupo_id = '1' and month(data) = ? and user_id = '$idUser') as receita,
                (select COALESCE(SUM(valor),0) as total from tb_t_aportes where grupo_id <> '1' and month(data) = ? and user_id = '$idUser') as dispesa", [$month,$month]
        );

        foreach ($dados as $dado){

            $money[$dado->nome] = $dado->valor;
        } 

        return $money;
    }

    public function anualCategoria()
    {
        $idUser = Auth::user()->id;
        $ano = date('Y');
        $dadosCat = [];

        $dados = DB::select(
            "select
                gpt.nome,
                sum(apt.valor) as valor
            from
                tb_t_aportes as apt
            inner join tb_r_gruposaportes as gpt on
                gpt.grupo <> 'Lançamento'
                and gpt.id = apt.grupo_id
            where
                year(apt.data) = ?
                and user_id = '$idUser'
            group by
                nome
            order by
                nome asc", [$ano]
        );
        foreach ($dados as $dado){

            $dadosCat[$dado->nome] = $dado->valor;
        } 

        return $dadosCat;
    }
}
