<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnuncioController extends Controller
{
    function formulario(){
			return view('anuncio-formulario');
    }

    function store(Request $dados){
        $veiculo = new VeiculoModel();
        $veiculo->create($dados->all());
    }

    function list(){
        $veiculos = VeiculoModel::all();
        
        return view('veiculo-listar', ['veiculos'=>$veiculos]);
    }

    function remove($id){
        VeiculoModel::destroy($id);

        return redirect()->route('veiculo-listar');
    }   
}


