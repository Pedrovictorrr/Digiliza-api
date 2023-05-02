<?php

namespace Database\Seeders;

use App\Models\Reserva;
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
            'password' => bcrypt('123456'),
        ]);
        \App\Models\User::factory()->create([
            'name' => 'Digiliza',
            'email' => 'Digiliza@teste.com',
            'password' => bcrypt('123456'),
        ]);
        \App\Models\User::factory()->create([
            'name' => 'Admin',
            'email' => 'Admin@teste.com',
            'password' => bcrypt('123456'),
        ]);

        $faker = Faker::create();

        for ($i = 0; $i < 15; $i++) {
            \App\Models\Mesa::create([
                'Numero_Mesa' => $i + 1,
            ]);
        }


        Reserva::create([
            'Name' => 'Aniversário da Maria',
            'Email' => 'maria@example.com',
            'Observacao' => 'Mesa decorada com tema de unicórnio',
            'Data' => '2023-05-10',
            'Hora' => '18:30:00',
            'QTD_Pessoas' => 10,
            'User_id' => 1,
            'Mesa_id' => 3,
            'Status' => 1,
            'Telefone' => '987654321'
        ]);
        Reserva::create([
            'Name' => 'Reunião de negócios',
            'Email' => 'empresa@example.com',
            'Observacao' => 'Necessidade de tomadas próximas à mesa',
            'Data' => '2023-05-15',
            'Hora' => '13:00:00',
            'QTD_Pessoas' => 6,
            'User_id' => 1,
            'Mesa_id' => 7,
            'Status' => 1,
            'Telefone' => '987654321'
        ]);

        Reserva::create([
            'Name' => 'Jantar romântico',
            'Email' => 'romantico@example.com',
            'Observacao' => 'Iluminação baixa e música ambiente',
            'Data' => '2023-05-18',
            'Hora' => '20:00:00',
            'QTD_Pessoas' => 2,
            'User_id' => 1,
            'Mesa_id' => 1,
            'Status' => 1,
            'Telefone' => '987654321'
        ]);

        Reserva::create([
            'Name' => 'João Silva',
            'Email' => 'joao@example.com',
            'Observacao' => 'Sem observações',
            'Data' => '2023-05-01',
            'Hora' => '12:30:00',
            'QTD_Pessoas' => 4,
            'User_id' => 1,
            'Mesa_id' => 1,
            'Status' => 1,
            'Telefone' => '123456789'
        ]);

        Reserva::create([
            'Name' => 'Maria Santos',
            'Email' => 'maria@example.com',
            'Observacao' => 'Comemoração de aniversário',
            'Data' => '2023-05-05',
            'Hora' => '20:00:00',
            'QTD_Pessoas' => 10,
            'User_id' => 1,
            'Mesa_id' => 3,
            'Status' => 1,
            'Telefone' => '987654321'
        ]);

        Reserva::create([
            'Name' => 'Ana Rodrigues',
            'Email' => 'ana@example.com',
            'Observacao' => 'Sem observações',
            'Data' => '2023-05-08',
            'Hora' => '19:30:00',
            'QTD_Pessoas' => 6,
            'User_id' => 1,
            'Mesa_id' => 5,
            'Status' => 1,
            'Telefone' => '999999999'
        ]);

        Reserva::create([
            'Name' => 'Pedro Alves',
            'Email' => 'pedro@example.com',
            'Observacao' => 'Comemoração de formatura',
            'Data' => '2023-05-10',
            'Hora' => '21:00:00',
            'QTD_Pessoas' => 15,
            'User_id' => 1,
            'Mesa_id' => 4,
            'Status' => 1,
            'Telefone' => '888888888'
        ]);

        Reserva::create([
            'Name' => 'Lucas Souza',
            'Email' => 'lucas@example.com',
            'Observacao' => 'Sem observações',
            'Data' => '2023-05-12',
            'Hora' => '18:00:00',
            'QTD_Pessoas' => 2,
            'User_id' => 1,
            'Mesa_id' => 2,
            'Status' => 1,
            'Telefone' => '555555555'
        ]);
        Reserva::create([
            'Name' => 'Ana Silva',
            'Email' => 'ana@example.com',
            'Observacao' => 'Comemoração de aniversário',
            'Data' => '2023-05-15',
            'Hora' => '20:30:00',
            'QTD_Pessoas' => 8,
            'User_id' => 1,
            'Mesa_id' => 6,
            'Status' => 1,
            'Telefone' => '777777777'
        ]);
        Reserva::create([
            'Name' => 'Paula Oliveira',
            'Email' => 'paula@example.com',
            'Observacao' => 'Sem observações',
            'Data' => '2023-05-18',
            'Hora' => '19:00:00',
            'QTD_Pessoas' => 5,
            'User_id' => 1,
            'Mesa_id' => 7,
            'Status' => 1,
            'Telefone' => '222222222'
        ]);
        Reserva::create([
            'Name' => 'Rafaela Santos',
            'Email' => 'rafaela@example.com',
            'Observacao' => 'Sem observações',
            'Data' => '2023-05-22',
            'Hora' => '12:00:00',
            'QTD_Pessoas' => 3,
            'User_id' => 1,
            'Mesa_id' => 8,
            'Status' => 1,
            'Telefone' => '444444444'
        ]);
        Reserva::create([
            'Name' => 'Carla Lima',
            'Email' => 'carla@example.com',
            'Observacao' => 'Comemoração de aniversário',
            'Data' => '2023-05-25',
            'Hora' => '19:30:00',
            'QTD_Pessoas' => 10,
            'User_id' => 1,
            'Mesa_id' => 9,
            'Status' => 1,
            'Telefone' => '333333333'
        ]);
        Reserva::create([
            'Name' => 'Felipe Rodrigues',
            'Email' => 'felipe@example.com',
            'Observacao' => 'Sem observações',
            'Data' => '2023-05-28',
            'Hora' => '20:00:00',
            'QTD_Pessoas' => 4,
            'User_id' => 1,
            'Mesa_id' => 10,
            'Status' => 1,
            'Telefone' => '666666666'
        ]);
    }
}
