<?php

use Illuminate\Database\Seeder;
use App\SugestaoModel;

class SugestaoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
/*
        SugestaoModel::create([
            'usuario_id' => '',
            'sugestao' => '',
        ]);
*/
        SugestaoModel::create([
            'usuario_id' => '1',
            'sugestao' => 'Pêssego',
        ]);
        SugestaoModel::create([
            'usuario_id' => '1',
            'sugestao' => 'Pato',
        ]);
        SugestaoModel::create([
            'usuario_id' => '3',
            'sugestao' => 'Computador',
        ]);
        SugestaoModel::create([
            'usuario_id' => '5',
            'sugestao' => 'Banana',
        ]);
        SugestaoModel::create([
            'usuario_id' => '7',
            'sugestao' => 'Teclado',
        ]);
        SugestaoModel::create([
            'usuario_id' => '2',
            'sugestao' => 'Mesa',
        ]);
        SugestaoModel::create([
            'usuario_id' => '3',
            'sugestao' => 'Xícara',
        ]);
        SugestaoModel::create([
            'usuario_id' => '1',
            'sugestao' => 'Camiseta',
        ]);
        SugestaoModel::create([
            'usuario_id' => '6',
            'sugestao' => 'Tomate',
        ]);
        SugestaoModel::create([
            'usuario_id' => '3',
            'sugestao' => 'Chocolate',
        ]);
        SugestaoModel::create([
            'usuario_id' => '7',
            'sugestao' => 'Lápis',
        ]);
        SugestaoModel::create([
            'usuario_id' => '4',
            'sugestao' => 'Microfone',
        ]);
        SugestaoModel::create([
            'usuario_id' => '5',
            'sugestao' => 'Pepino',
        ]);
        SugestaoModel::create([
            'usuario_id' => '4',
            'sugestao' => 'Tênis',
        ]);
        SugestaoModel::create([
            'usuario_id' => '7',
            'sugestao' => 'Bolacha',
        ]);

    }
}
