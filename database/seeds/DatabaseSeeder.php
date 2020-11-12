<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
        $this->call(ContextoTableSeeder::class);
        $this->call(PalavraTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(SugestaoTableSeeder::class);
        $this->call(LikeSeeder::class);

    }
}
