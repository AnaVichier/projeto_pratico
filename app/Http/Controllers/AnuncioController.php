<?php

namespace App\Http\Controllers;

use App\Models\AnuncioModel;
use App\Models\ProprietarioModel;
use App\Models\VeiculoModel;
use Illuminate\Http\Request;

class AnuncioController extends Controller
{
    public function formulario()
    {
        $proprietarios = ProprietarioModel::all();
        $veiculos = VeiculoModel::all();
        return view('anuncio-formulario', compact('proprietarios', 'veiculos'));
    }

    public function store(Request $request)
    {
        AnuncioModel::updateOrCreate(
        ['id_anuncio' => $request->id_anuncio],
        $request->all()
        );

    return redirect()->route('anuncio-listar')->with('success', 'Anúncio salvo com sucesso!');
}


    public function listar()
    {
        $anuncios = AnuncioModel::with('proprietario', 'veiculo')->get();
        return view('anuncio-listar', compact('anuncios'));
    }

    public function remove($id_anuncio)
    {
        $anuncio = AnuncioModel::findOrFail($id_anuncio);
        $anuncio->delete();
        return redirect()->route('anuncio-listar')->with('success', 'Anúncio removido com sucesso!');
    }

    public function editar($id_anuncio)
    {
        $anuncio = AnuncioModel::findOrFail($id_anuncio);
        $proprietarios = ProprietarioModel::all();
        $veiculos = VeiculoModel::all();

        return view('anuncio-formulario', compact('anuncio', 'proprietarios', 'veiculos'));
    }
}