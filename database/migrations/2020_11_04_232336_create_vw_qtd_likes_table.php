<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateVwQtdLikesTable extends Migration
{
    public function up()
    {
        DB::statement("CREATE VIEW `vw_qtd_likes` AS SELECT COUNT(1) AS qtd_likes, l.sugestao_id FROM likes l GROUP BY l.sugestao_id ;");
    }
    public function down()
    {
        DB::statement("DROP VIEW vw_qtd_likes");
    }
}
