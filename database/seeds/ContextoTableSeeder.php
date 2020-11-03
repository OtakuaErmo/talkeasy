<?php

use Illuminate\Database\Seeder;
use App\ContextoModel;

class ContextoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ContextoModel::create([
            'contexto' => 'Alfabeto',
            'imagem' => 'alfabeto.png',
        ]);
        ContextoModel::create([
            'contexto' => 'Números',
            'imagem' => 'numeros.png',
        ]);
        ContextoModel::create([
            'contexto' => 'Animais',
            'imagem' => 'animais.png',
        ]);
        ContextoModel::create([
            'contexto' => 'Brinquedos',
            'imagem' => 'brinquedos.png',
        ]);
        ContextoModel::create([
            'contexto' => 'Frutas',
            'imagem' => 'frutas.png',
        ]);
        ContextoModel::create([
            'contexto' => 'Cores',
            'imagem' => 'cores.png',
        ]);
        ContextoModel::create([
            'contexto' => 'Cumprimentos',
            'imagem' => 'cumprimentos.png',
        ]);
    }
}
