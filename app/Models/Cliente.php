<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $table = 'cliente';

    protected $fillable = [
        'nome',
        'email',
        'cpf',
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
        return $this->hasMany(Imovel::class);
    }

    public function locacoes()
    {
        return $this->hasMany(Locacao::class);
    }
}
