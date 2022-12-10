<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LocacaoProprietario extends Model
{
    use HasFactory;

    protected $table = 'imovel_proprietario';

    /***************************************
     *          RELACIONAMENTOS            *
     ***************************************/

    public function empresa()
    {
        return $this->belongsTo(Empresa::class);
    }

    public function imovel()
    {
        return $this->belongsTo(Locacao::class);
    }

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }
}
