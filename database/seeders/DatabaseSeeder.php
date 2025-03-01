<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::factory()->create([
            'first_name' => 'Test',
            'middle_name' => null,
            'last_name' => 'User',
            'email' => 'test@example.com',
            'password' => bcrypt('password'),
            'dob' => '2000-01-01',
            'age' => 24,
            'gender' => 'Male',
            'role' => 'student',
            'education' => 'Graduation',
            'experience' => 'None',
        ]);
    }
}
