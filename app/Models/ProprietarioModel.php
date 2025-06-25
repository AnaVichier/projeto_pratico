<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProprietarioModel extends Model
{
    use HasFactory;
    protected $table = 'proprietarios';
    protected $fillable = ['id_proprietario', 'nome', 'cpf', 'telefone', 'email'];
    public $timestamps = false;
     protected $primaryKey = 'id_proprietario';
}
