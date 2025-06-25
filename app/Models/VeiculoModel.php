<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VeiculoModel extends Model
{
    use HasFactory;
    protected $table = 'veiculos';
    protected $fillable = ['id_veiculo', 'marca', 'modelo', 'ano', 'placa', 'cor'];
    public $timestamps = false;
     protected $primaryKey = 'id_veiculo';

}
