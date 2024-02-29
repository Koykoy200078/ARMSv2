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
            'fname' => 'Researcher',
            'mname' => '',
            'lname' => '',
            'contact_number' => '09755571948',
            'address' => 'Negros Oriental',
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
            'fname' => 'Admin',
            'mname' => '',
            'lname' => '',
            'contact_number' => '09755571948',
            'address' => 'Negros Oriental',
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
            'fname' => 'Professor',
            'mname' => '',
            'lname' => '',
            'contact_number' => '09755571948',
            'address' => 'Negros Oriental',
        ]);

        $user3->role()->create([
            'role' => 'professor',
        ]);

        $user4 = \App\Models\User::factory()->create([
            'email' => 'testuser1@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
        ]);

        $user4->profile()->create([
            'fname' => 'Andre',
            'mname' => '',
            'lname' => 'Asa',
            'contact_number' => '09755571948',
            'address' => 'Negros Oriental',
        ]);

        $user4->role()->create([
            'role' => 'researcher',
        ]);

        $user5 = \App\Models\User::factory()->create([
            'email' => 'testuser2@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
        ]);

        $user5->profile()->create([
            'fname' => 'Philip',
            'mname' => 'Go',
            'lname' => 'Goba',
            'contact_number' => '09755571948',
            'address' => 'Negros Oriental',
        ]);

        $user5->role()->create([
            'role' => 'researcher',
        ]);
    }
}
