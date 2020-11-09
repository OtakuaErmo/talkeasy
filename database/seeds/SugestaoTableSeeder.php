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
            'usuario_id' => '2',
            'sugestao' => 'Informática',
            'tipo' => 'CONTEXTO',
            'cadastrado' => 'NÃO'
        ]);
        SugestaoModel::create([
            'usuario_id' => '2',
            'sugestao' => 'Pato',
            'tipo' => 'PALAVRA',
            'cadastrado' => 'NÃO'
        ]);
        SugestaoModel::create([
            'usuario_id' => '3',
            'sugestao' => 'Computador',
            'tipo' => 'PALAVRA',
            'cadastrado' => 'NÃO'
        ]);
        SugestaoModel::create([
            'usuario_id' => '5',
            'sugestao' => 'Banana',
            'tipo' => 'PALAVRA',
            'cadastrado' => 'NÃO'
        ]);
        SugestaoModel::create([
            'usuario_id' => '2',
            'sugestao' => 'Alterar botão de avaliação',
            'tipo' => 'MELHORIA',
            'cadastrado' => 'NÃO'
        ]);
        SugestaoModel::create([
            'usuario_id' => '7',
            'sugestao' => 'Teclado',
            'tipo' => 'PALAVRA',
            'cadastrado' => 'NÃO'
        ]);
        SugestaoModel::create([
            'usuario_id' => '2',
            'sugestao' => 'Mesa',
            'tipo' => 'PALAVRA',
            'cadastrado' => 'NÃO'
        ]);
        SugestaoModel::create([
            'usuario_id' => '3',
            'sugestao' => 'Xícara',
            'tipo' => 'PALAVRA',
            'cadastrado' => 'NÃO'
        ]);
        SugestaoModel::create([
            'usuario_id' => '3',
            'sugestao' => 'Doces',
            'tipo' => 'CONTEXTO',
            'cadastrado' => 'NÃO'
        ]);
        SugestaoModel::create([
            'usuario_id' => '5',
            'sugestao' => 'Camiseta',
            'tipo' => 'PALAVRA',
            'cadastrado' => 'NÃO'
        ]);
        SugestaoModel::create([
            'usuario_id' => '6',
            'sugestao' => 'Tomate',
            'tipo' => 'PALAVRA',
            'cadastrado' => 'NÃO'
        ]);
        SugestaoModel::create([
            'usuario_id' => '2',
            'sugestao' => 'Adicionar mais frutas no contexto Frutas',
            'tipo' => 'MELHORIA',
            'cadastrado' => 'NÃO'
        ]);
        SugestaoModel::create([
            'usuario_id' => '3',
            'sugestao' => 'Chocolate',
            'tipo' => 'PALAVRA',
            'cadastrado' => 'NÃO'
        ]);
        SugestaoModel::create([
            'usuario_id' => '7',
            'sugestao' => 'Lápis',
            'tipo' => 'PALAVRA',
            'cadastrado' => 'NÃO'
        ]);
        SugestaoModel::create([
            'usuario_id' => '4',
            'sugestao' => 'Microfone',
            'tipo' => 'PALAVRA',
            'cadastrado' => 'NÃO'
        ]);
        SugestaoModel::create([
            'usuario_id' => '5',
            'sugestao' => 'Pepino',
            'tipo' => 'PALAVRA',
            'cadastrado' => 'NÃO'
        ]);
        SugestaoModel::create([
            'usuario_id' => '4',
            'sugestao' => 'Tênis',
            'tipo' => 'PALAVRA',
            'cadastrado' => 'NÃO'
        ]);
        SugestaoModel::create([
            'usuario_id' => '3',
            'sugestao' => 'Eletrônicos',
            'tipo' => 'CONTEXTO',
            'cadastrado' => 'NÃO'
        ]);
        SugestaoModel::create([
            'usuario_id' => '7',
            'sugestao' => 'Bolacha',
            'tipo' => 'PALAVRA',
            'cadastrado' => 'NÃO'
        ]);
        SugestaoModel::create([
            'usuario_id' => '2',
            'sugestao' => 'Pêssego',
            'tipo' => 'PALAVRA',
            'cadastrado' => 'NÃO'
        ]);

    }
}
