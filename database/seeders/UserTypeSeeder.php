<?php

namespace Database\Seeders;

use App\Models\UserType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        UserType::create([
            'id' => 1,
            'name' => 'Admin',
            'slug' => 'admin',
            'description' => 'Admin User'
        ]);

        UserType::create([
            'id' => 2,
            'name' => 'Bar Owner',
            'slug' => 'bar-owner',
            'description' => 'Bar owner'
        ]);

        UserType::create([
            'id' => 3,
            'name' => 'Bar Manager',
            'slug' => 'bar-manager',
            'description' => 'Bar manager'
        ]);

        UserType::create([
            'id' => 4,
            'name' => 'Bar Staff',
            'slug' => 'bar-staff',
            'description' => 'Bar staff'
        ]);

        UserType::create([
            'id' => 5,
            'name' => 'Patron',
            'slug' => 'patron',
            'description' => 'Patron'
        ]);
    }
}
