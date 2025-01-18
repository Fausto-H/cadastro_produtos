<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'categoria', 'descricao'];

    // Ordenação padrão no modelo
    protected static function booted()
    {
        static::addGlobalScope('orderById', function ($query) {
            $query->orderBy('id', 'asc');
        });
    }
}

