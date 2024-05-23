<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Faker\Factory as Faker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@presto.it',
            'password' => bcrypt('12345678'),
            "is_admin" => true,
        ]);

        User::factory()->create([
            'name' => 'Revisor',
            'email' => 'revisor@presto.it',
            'password' => bcrypt('12345678'),
            "is_revisor" => true,
        ]);

        User::factory()->create([
            'name' => $faker->name(),
            'email' => $faker->email(),
            'password' => bcrypt('12345678'),
        ]);
        
        User::factory()->create([
            'name' => $faker->name(),
            'email' => $faker->email(),
            'password' => bcrypt('12345678'),
        ]);
    }
}
