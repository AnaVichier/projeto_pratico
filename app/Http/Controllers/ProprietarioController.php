<?php

namespace App\Http\Controllers;

use App\Models\ProprietarioModel;
use Illuminate\Http\Request;

class ProprietarioController extends Controller
{
    function formulario()
    {
        return view('proprietario-formulario');
    }

    function store(Request $dados)
    {
        if ($dados->id_proprietario == '') {
            $proprietario = new ProprietarioModel;
            $proprietario->create($dados->all());
        } else {
            $proprietario = ProprietarioModel::find($dados->id_proprietario);
            if ($proprietario) {
                $proprietario->update($dados->all());
            }
        }

        $proprietarios = ProprietarioModel::all();


        return view('proprietario-listar', ['proprietarios' => $proprietarios]);
    }

    function listar()
    {
        $proprietarios = ProprietarioModel::all();
        return view('proprietario-listar', ['proprietarios' => $proprietarios]);
    }

    function remove($id_proprietario)
    {
        ProprietarioModel::destroy($id_proprietario);
        return redirect()->route('proprietario-listar');
    }

    function editar($id_proprietario)
    {
        $proprietario = ProprietarioModel::find($id_proprietario);
        return view('proprietario-formulario', ['proprietario' => $proprietario]);
    }
}
