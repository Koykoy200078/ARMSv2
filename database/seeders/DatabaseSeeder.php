<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        $user = \App\Models\User::factory()->create([
            'email' => 'franc200078@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
        ]);

        $user->profile()->create([
            'fname' => 'Christian Franc',
            'mname' => 'Magdasal',
            'lname' => 'Carvajal',
            'contact_number' => '09755571948',
            'address' => 'Barangay Malusay, Guihulngan City Negros Oriental',
        ]);

        $user->role()->create([
            'role' => 'researcher',
        ]);


        $user2 = \App\Models\User::factory()->create([
            'email' => 'christiancarvs@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
        ]);

        $user2->profile()->create([
            'fname' => 'Christian Franc2',
            'mname' => 'Magdasal2',
            'lname' => 'Carvajal2',
            'contact_number' => '09755571948',
            'address' => 'Barangay Malusay, Guihulngan City Negros Oriental',
        ]);

        $user2->role()->create([
            'role' => 'researcher',
        ]);
    }
}
