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
            'email' => 'researcher@gmail.com',
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
            'email' => 'admin@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
        ]);

        $user2->profile()->create([
            'fname' => 'Christian Franc',
            'mname' => 'Magdasal',
            'lname' => 'Carvajal',
            'contact_number' => '09755571948',
            'address' => 'Barangay Malusay, Guihulngan City Negros Oriental',
        ]);

        $user2->role()->create([
            'role' => 'admin',
        ]);

        $user3 = \App\Models\User::factory()->create([
            'email' => 'professor@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
        ]);

        $user3->profile()->create([
            'fname' => 'Christian Franc',
            'mname' => 'Magdasal',
            'lname' => 'Carvajal',
            'contact_number' => '09755571948',
            'address' => 'Barangay Malusay, Guihulngan City Negros Oriental',
        ]);

        $user3->role()->create([
            'role' => 'professor',
        ]);
    }
}
