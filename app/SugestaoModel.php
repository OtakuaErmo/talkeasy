<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SugestaoModel extends Model
{
    protected $table = "sugestoes";

    public function users()
    {
        return $this->belongsTo(User::class,'usuario_id','id');
    }
}
