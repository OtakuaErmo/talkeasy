<?php

use Illuminate\Database\Seeder;
use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*
        exemplo geral::::

        User::create([
            'name' => '',
            'email' => '@gmail.com',
            'password' => bcrypt('teste123'),
        ]);

        */
        User::create([
            'name' => 'Administrador 01',
            'email' => 'admin.01@gmail.com',
            'password' => bcrypt('teste123'),
        ]);
        User::create([
            'name' => 'João',
            'email' => 'joao@gmail.com',
            'password' => bcrypt('teste123'),
        ]);
        User::create([
            'name' => 'Ana Julia',
            'email' => 'anajulia@gmail.com',
            'password' => bcrypt('teste123'),
        ]);
        User::create([
            'name' => 'Andressa',
            'email' => 'andressa@gmail.com',
            'password' => bcrypt('teste123'),
        ]);
        User::create([
            'name' => 'Bruno',
            'email' => 'bruno@gmail.com',
            'password' => bcrypt('teste123'),
        ]);
        User::create([
            'name' => 'Emely',
            'email' => 'emely@gmail.com',
            'password' => bcrypt('teste123'),
        ]);
        User::create([
            'name' => 'Guilherme',
            'email' => 'guilherme@gmail.com',
            'password' => bcrypt('teste123'),
        ]);
        User::create([
            'name' => 'Luiz',
            'email' => 'luiz@gmail.com',
            'password' => bcrypt('teste123'),
        ]);
    }
}
