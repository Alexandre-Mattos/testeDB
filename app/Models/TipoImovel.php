<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoImovel extends Model
{
    use HasFactory;

    protected $table = 'tipo_imovel';

    protected $fillable = [
        'nome',
    ];

    public function empresa()
    {
        return $this->belongsTo(Empresa::class);
    }
}
