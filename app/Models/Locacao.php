<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Locacao extends Model
{
    use HasFactory;

    protected $table = 'locacao';

    protected $fillable = [
        'inicio_periodo',
        'fim_periodo',
        'duracao',
        'status',
        'valor',
    ];

    /***************************************
     *          RELACIONAMENTOS            *
     ***************************************/

    public function empresa()
    {
        return $this->belongsTo(Empresa::class);
    }

    public function imovel()
    {
        return $this->belongsTo(Imovel::class);
    }

    public function inquilinos()
    {
        return $this->hasMany(LocacaoInquilino::class);
    }

    public function contas()
    {
        return $this->hasMany(Conta::class);
    }
}
