<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'avatar' => 'https://i.pravatar.cc/300',
            'name' => 'Admin',
            'email' => 'admin@localhost',
            'password' => bcrypt('password'),
            'role' => 'admin',
        ]);

        User::create([
            'avatar' => 'https://i.pravatar.cc/300',
            'name' => 'Creator',
            'email' => 'creator@localhost',
            'password' => bcrypt('password'),
            'role' => 'creator',
        ]);

        User::create([
            'avatar' => 'https://i.pravatar.cc/300',
            'name' => 'User',
            'email' => 'user@localhost',
            'password' => bcrypt('password'),
            'role' => 'user',
        ]);

        User::factory(7)->create();

        $this->call([
            CategorySeeder::class,
            PostSeeder::class,
        ]);
    }
}
