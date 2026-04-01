<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create(
            [
                'email' => 'rajix2100@gmail.com',
                'name' => 'Younes Rajix',
                'password' => 'rajix2100@gmail.com',
                'role_id' => 2
            ],
        );
    }
}
