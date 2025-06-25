<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VeiculoModel;

class VeiculoController extends Controller
{
    function formulario(){
        return view('veiculo-formulario');
    }

    function store(Request $dados){
        if ($dados->id_veiculo == '') {
            //fazemos ação de create aqui...
            $veiculos = new VeiculoModel;
            $veiculos->create($dados->all());
        } else {
            $veiculos = VeiculoModel::find($dados->id_veiculo);
            $veiculos->update($dados->all());
        }
        
        //recupera todos os registros atualizados
        $veiculos = VeiculoModel::all();
        
        //após adicionar ou editar redireciona para a página listar
        return view('veiculo-listar', ['veiculos'=>$veiculos]);
    }

    function listar(){
        $veiculos = VeiculoModel::all();
        
        return view('veiculo-listar', ['veiculos'=>$veiculos]);
    }

    function remove($id_veiculo){
        VeiculoModel::destroy($id_veiculo);

        return redirect()->route('veiculo-listar');
    }
    
    function editar($id_veiculo){
				$veiculos = VeiculoModel::find($id_veiculo);

       return view('veiculo-formulario', ['veiculo' => $veiculos]);

        //vamos enviar o $veiculo que veio do BD para a página veiculo-formulario
    }
}