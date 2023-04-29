<?php

namespace Database\Seeders;
use Faker\Factory as Faker;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Pedro',
            'email' => 'pedro@teste.com',
            'password'=> bcrypt('123456'),
        ]);

        $faker = Faker::create();

        for ($i = 0; $i < 15; $i++) {
          \App\Models\Mesa::create([
            'Numero_Mesa' => $i+1,
        ]);
        }

        
    }
}
