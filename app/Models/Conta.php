<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conta extends Model
{
    use HasFactory;

    protected $table = 'conta';

    protected $fillable = [
        'empresa_id',
        'valor',
        'data_vencimento',
    ];

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

    public function pagamento()
    {
        return $this->hasOne(Pagamento::class);
    }

}
