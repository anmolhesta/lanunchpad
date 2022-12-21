<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1 = Role::create(['name' => 'Admin']);
        $role2 = Role::create(['name' => 'Teacher']);
        $role3 = Role::create(['name' => 'Student']);
        $user = \App\Models\User::factory()->create([
            'name' => 'Super Admin',
            'email' => 'superadmin@example.com',
            'email_verified_at' => \Carbon\Carbon::now(),
            'password' => Hash::make('Admin123'),
            'ref_status_id' => 2,
        ]);
        $user->assignRole($role1);

        $user = \App\Models\User::factory()->create([
            'name' => 'R.K Rao',
            'email' => 'rkrao@example.com',
            'email_verified_at' => \Carbon\Carbon::now(),
            'password' => Hash::make('Admin123'),
            'ref_status_id' => 2,
        ]);
        $user->assignRole($role2);

        $user = \App\Models\User::factory()->create([
            'name' => 'Anmol Singh',
            'email' => 'anmol@example.com',
            'email_verified_at' => \Carbon\Carbon::now(),
            'password' => Hash::make('Admin123'),
            'ref_status_id' => 2,
        ]);
        $user->assignRole($role3);
    }
}
