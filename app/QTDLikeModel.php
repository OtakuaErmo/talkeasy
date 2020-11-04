<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QTDLikeModel extends Model
{
    protected $table = "vw_qtd_likes";

    public function sugestoes()
    {
        return $this->belongsTo(SugestaoModel::class, 'sugestao_id', 'id');
    }
}
