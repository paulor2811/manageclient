<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReadUser extends Model
{
    // Especifica o nome da tabela
    protected $table = 'users_tbl';
    // Especifica os campos que podem ser preenchidos em massa
    protected $fillable = [
        'nome', 
        'cep', 
        'endereco', 
        'bairro', 
        'cidade', 
        'uf', 
        'telefone', 
        'email' 
    ];
}
