<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Jimmy',
            'email' => 'jimmy@example.com',
            'api_token'=> Str::random(60),
        ]);

        $this->call([
            MovieSeeder::class,
        ]);
    }
}
