<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'admin',
            'email' => 'marekgacek45@gmail.com',
            'password' => '4ZVv5El4Wb80',
        ]);
        User::factory()->create([
            'name' => 'mixo',
            'email' => 'expert.wylewki@gmail.com',
            'password' => '5U2ERh62n0t2',
        ]);
        User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => 'admin123',
        ]);
    }
}
