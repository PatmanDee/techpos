<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class SuperAdminSeeder extends Seeder
{
    public function run()
    {
        // Create super admin user if doesn't exist
        if (!User::where('email', 'admin@techpos.com')->exists()) {
            User::create([
                'name' => 'Super Admin',
                'email' => 'admin@techpos.com',
                'password' => Hash::make('1234@Five'),
                'role' => 'super-admin',
                'tenant_id' => null,
                'status' => 'active',
            ]);
        }
    }
}
