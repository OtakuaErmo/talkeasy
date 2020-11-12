<?php

use App\LikeModel;
use Illuminate\Database\Seeder;

class LikeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        LikeModel::create([
            'usuario_id' => '2',
            'sugestao_id' => '1',
        ]);
        LikeModel::create([
            'usuario_id' => '3',
            'sugestao_id' => '1',
        ]);
        LikeModel::create([
            'usuario_id' => '3',
            'sugestao_id' => '6',
        ]);
        LikeModel::create([
            'usuario_id' => '6',
            'sugestao_id' => '11',
        ]);
        LikeModel::create([
            'usuario_id' => '5',
            'sugestao_id' => '11',
        ]);
        LikeModel::create([
            'usuario_id' => '5',
            'sugestao_id' => '9',
        ]);
        LikeModel::create([
            'usuario_id' => '4',
            'sugestao_id' => '9',
        ]);
        LikeModel::create([
            'usuario_id' => '2',
            'sugestao_id' => '11',
        ]);
        LikeModel::create([
            'usuario_id' => '4',
            'sugestao_id' => '4',
        ]);
        LikeModel::create([
            'usuario_id' => '5',
            'sugestao_id' => '1',
        ]);
        LikeModel::create([
            'usuario_id' => '2',
            'sugestao_id' => '4',
        ]);
        LikeModel::create([
            'usuario_id' => '5',
            'sugestao_id' => '5',
        ]);
        LikeModel::create([
            'usuario_id' => '4',
            'sugestao_id' => '1',
        ]);
        LikeModel::create([
            'usuario_id' => '4',
            'sugestao_id' => '13',
        ]);
        LikeModel::create([
            'usuario_id' => '6',
            'sugestao_id' => '1',
        ]);
        LikeModel::create([
            'usuario_id' => '6',
            'sugestao_id' => '4',
        ]);

    }
}
