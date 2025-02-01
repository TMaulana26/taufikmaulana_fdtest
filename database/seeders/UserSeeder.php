<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $totalUsers = 100;
        $password = Hash::make('password');
        $usersData = [];
    
        for ($i = 1; $i <= $totalUsers; $i++) {
            $usersData[] = [
                'name' => "User $i",
                'email' => "fdtest_user{$i}@yopmail.com",
                'password' => $password,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }
    
        User::insertOrIgnore($usersData);

    }
}
