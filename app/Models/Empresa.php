<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    use HasFactory;

    protected $table = 'empresa';

    protected $fillable = [
        'nome',
        'email',
        'cpf_cnpj',
        'telefone',
        'tipo',
    ];

    /***************************************
     *          RELACIONAMENTOS            *
     ***************************************/

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function locacoes()
    {
        return $this->hasMany(Locacao::class);
    }

    public function clientes()
    {
        return $this->hasMany(Cliente::class);
    }

    public function imoveis()
    {
        return $this->hasMany(Imovel::class);
    }

    public function tiposImoveis()
    {
        return $this->hasMany(TipoImovel::class);
    }

}
