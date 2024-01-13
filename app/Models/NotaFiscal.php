<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use MongoDB\Laravel\Eloquent\Model;

class NotaFiscal extends Model
{
    use HasFactory;
    protected $fillable = [
        'numero',
        'valor',
        'dt_emis',
        'cnpj_remetente',
        'nome_remetente',
        'cnpj_transportador',
        'nome_transportado',
        'criador'
    ];
}
