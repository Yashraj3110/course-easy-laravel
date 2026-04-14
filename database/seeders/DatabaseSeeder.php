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
        $this->call([
            CourseSeeder::class,
        ]);

        User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@gmail.com',
            'password' => \Illuminate\Support\Facades\Hash::make('password'),
            'role' => 'admin',
            'is_approved' => true,
        ]);
        
        User::factory()->create([
            'name' => 'Student User',
            'email' => 'student@gmail.com',
            'password' => \Illuminate\Support\Facades\Hash::make('password'),
            'role' => 'student',
            'is_approved' => true,
        ]);
    }
}
