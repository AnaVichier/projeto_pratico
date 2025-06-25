<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnuncioModel extends Model
{
    use HasFactory;
    protected $table = 'anuncios';
    protected $fillable = ['id_anuncio', 'titulo', 'descricao', 'preco', 'data_publicacao', 'id_proprietario','id_veiculo'];
    public $timestamps = false;
    protected $primaryKey = 'id_anuncio';

    /**
     * Os atributos que devem ser convertidos para tipos nativos.
     *
     * @var array
     */
    protected $casts = [
        'preco' => 'decimal:2', // Converte preco para decimal com 2 casas
        'data_publicacao' => 'date', // Converte data_publicacao para objeto Carbon (data)
    ];

    /**
     * Relacionamento: Um Anuncio pertence a um Proprietario.
     * 'Um Proprietário 1 — N Anúncio' (Um proprietário pode ter vários anúncios.)
     */
    public function proprietario()
    {
        // belongsTo(RelatedModel, foreignKeyOnThisModel, ownerKeyOnRelatedModel)
        return $this->belongsTo(ProprietarioModel::class, 'id_proprietario', 'id_proprietario');
    }

    /**
     * Relacionamento: Um Anuncio pertence a um Veiculo.
     * 'Veículo 1 — 1 Anúncio' (Cada veículo só pode aparecer em um único anúncio)
     */
    public function veiculo()
    {
        // belongsTo(RelatedModel, foreignKeyOnThisModel, ownerKeyOnRelatedModel)
        return $this->belongsTo(VeiculoModel::class, 'id_veiculo', 'id_veiculo');
    }
}
