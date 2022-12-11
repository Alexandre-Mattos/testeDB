<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Imovel extends Model
{
    use HasFactory;

    protected $table = 'imovel';

    protected $fillable = [
        'nome',
        'descricao',
        'status',
    ];

    /***************************************
     *          RELACIONAMENTOS            *
     ***************************************/

    public function empresa()
    {
        return $this->belongsTo(Empresa::class);
    }

    public function proprietario()
    {
        return $this->hasOne(LocacaoProprietario::class);
    }

    public function tipoImovel()
    {
        return $this->hasOne(TipoImovel::class);
    }

    public function venda()
    {
        return $this->hasOne(Venda::class);
    }

    public function cidades()
    {
        return $this->hasOne(Cidade::class);
    }

}
