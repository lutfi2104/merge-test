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
    { {
            $user = User::create([
                'name' => 'Muhammad Lutfi Abdullah',
                'email' => 'lutfi.mla@gmail.com',
                'username' => 'lutfi',
                'departement_id' => 1,
                'email_verified_at' => now(),
                'password' => Hash::make('123456789'),
            ]);
            $user->assignRole('Super Admin');
        } {
            $user = User::create([
                'name' => 'direktur',
                'email' => 'direktur@gmail.com',
                'username' => 'direktur',
                'departement_id' => 1,
                'email_verified_at' => now(),
                'password' => Hash::make('123456789'),
            ]);

            $user->assignRole('Admin');
        } {
            $user = User::create([
                'name' => 'Teja',
                'email' => 'teja@gmail.com',
                'username' => 'teja',
                'departement_id' => 1,
                'email_verified_at' => now(),
                'password' => Hash::make('123456789'),
            ]);

            $user->assignRole('Admin QC');
        } {
        } {
            $user = User::create([
                'name' => 'Maulana',
                'email' => 'maul@gmail.com',
                'username' => 'maul',
                'departement_id' => 1,
                'email_verified_at' => now(),
                'password' => Hash::make('123456789'),
            ]);

            $user->assignRole('Admin QC');
        } {
            $user = User::create([
                'name' => 'Admin Prd',
                'email' => 'adminprd@gmail.com',
                'username' => 'adminprd',
                'departement_id' => 2,
                'email_verified_at' => now(),
                'password' => Hash::make('123456789'),
            ]);

            $user->assignRole('Admin PRD');
        } {
            $user = User::create([
                'name' => 'Adhitya',
                'email' => 'adhitya@gmail.com',
                'username' => 'spvprd',
                'departement_id' => 2,
                'email_verified_at' => now(),
                'password' => Hash::make('123456789'),
            ]);

            $user->assignRole('Spv PRD');
        } {
            $user = User::create([
                'name' => 'bahari',
                'email' => 'bahari@gmail.com',
                'username' => 'bahari',
                'departement_id' => 2,
                'email_verified_at' => now(),
                'password' => Hash::make('123456789'),
            ]);

            $user->assignRole('Leader PRD');
        } {
            $user = User::create([
                'name' => 'irwan',
                'email' => 'irwan@gmail.com',
                'username' => 'irwan',
                'departement_id' => 2,
                'email_verified_at' => now(),
                'password' => Hash::make('123456789'),
            ]);

            $user->assignRole('Leader PRD');
        } {
            $user = User::create([
                'name' => 'arief',
                'email' => 'arief@gmail.com',
                'username' => 'arief',
                'departement_id' => 2,
                'email_verified_at' => now(),
                'password' => Hash::make('123456789'),
            ]);

            $user->assignRole('Leader PRD');
        } {
            $user = User::create([
                'name' => 'packing',
                'email' => 'packing@gmail.com',
                'username' => 'packing',
                'departement_id' => 2,
                'email_verified_at' => now(),
                'password' => Hash::make('123456789'),
            ]);

            $user->assignRole('Packing');
        } {
            $user = User::create([
                'name' => 'bakingg2',
                'email' => 'bakingg2@gmail.com',
                'username' => 'bakingg2',
                'departement_id' => 2,
                'email_verified_at' => now(),
                'password' => Hash::make('123456789'),
            ]);

            $user->assignRole('Baking G2');
        } {
            $user = User::create([
                'name' => 'qc',
                'email' => 'qc@gmail.com',
                'username' => 'qc',
                'departement_id' => 1,
                'email_verified_at' => now(),
                'password' => Hash::make('123456789'),
            ]);

            $user->assignRole('QC');
        } {
            $user = User::create([
                'name' => 'warehouse',
                'email' => 'warehouse@gmail.com',
                'username' => 'warehouse',
                'departement_id' => 9,
                'email_verified_at' => now(),
                'password' => Hash::make('123456789'),
            ]);

            $user->assignRole('Warehouse');
        } {
            $user = User::create([
                'name' => 'purchasing',
                'email' => 'purchasing@gmail.com',
                'username' => 'purchasing',
                'departement_id' => 12,
                'email_verified_at' => now(),
                'password' => Hash::make('123456789'),
            ]);

            $user->assignRole('Purchasing');
        } {
            $user = User::create([
                'name' => 'rnd',
                'email' => 'rnd@gmail.com',
                'username' => 'rnd',
                'departement_id' => 3,
                'email_verified_at' => now(),
                'password' => Hash::make('123456789'),
            ]);

            $user->assignRole('Rnd');
        }
    }
}
