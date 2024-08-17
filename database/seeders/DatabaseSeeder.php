<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Monitoring;
use App\Models\Control;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::create([
            'name' => 'Hanifah Safira',
            'username' => 'hanifahsafira',
            'email' => 'hanifah@gmail.com',
            'password' => bcrypt('12345')
        ]);

        Monitoring::create([
            'suhu' => 28.8,
            'kelembapan' => 90,
            'kipas' => "Mati",
            'humidifier' => "Mati",
        ]);

        \App\Models\Control::factory(10)->create();
    }
}
