<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LocacaoInquilino extends Model
{
    use HasFactory;

    protected $table = 'locacao_inquilino';

    /***************************************
     *          RELACIONAMENTOS            *
     ***************************************/

    public function empresa()
    {
        return $this->belongsTo(Empresa::class);
    }

    public function locacao()
    {
        return $this->belongsTo(Locacao::class);
    }

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }
}
