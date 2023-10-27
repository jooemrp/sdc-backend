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
        // $this->call(RoleSeeder::class);

        // $admin = User::create([
        //     'name' => 'aya',
        //     'email' => 'fasayayaqhsya@gmail.com',
        //     'password' => bcrypt('12345678'),
        // ]);
        // $admin->assignRole('superadmin');
        // $admin->assignRole('admin');
        // $admin->assignRole('user');


        $this->call(ContentSeeder::class);
    }
}
