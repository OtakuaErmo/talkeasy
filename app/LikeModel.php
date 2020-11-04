<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LikeModel extends Model
{
    protected $table = "likes";

    public function users()
    {
        return $this->belongsTo(User::class,'usuario_id','id');
    }

    public function sugestoes()
    {
        return $this->belongsTo(SugestaoModel::class,'sugestao_id','id');
    }
}
