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
     * @var array
     */
    protected $casts = [
        'preco' => 'decimal:2', 
        'data_publicacao' => 'date', 
    ];

    
    public function proprietario()
    {
        return $this->belongsTo(ProprietarioModel::class, 'id_proprietario', 'id_proprietario');
    }

    public function veiculo()
    {
        return $this->belongsTo(VeiculoModel::class, 'id_veiculo', 'id_veiculo');
    }
}
