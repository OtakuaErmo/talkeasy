<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PalavraModel extends Model
{
    protected $table = "palavras";

    public function contextos()
    {
        return $this->belongsTo(ContextoModel::class,'id_contexto','id');
    }
}
