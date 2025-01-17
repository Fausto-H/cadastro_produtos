<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;

    // Se a tabela tiver um nome diferente de 'produtos', defina isso:
    // protected $table = 'nome_da_tabela';

    // Defina os campos que podem ser preenchidos (se necessário)
    protected $fillable = ['nome', 'categoria', 'descricao'];
}
