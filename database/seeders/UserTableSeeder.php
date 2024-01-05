<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Role;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::firstOrCreate([
            'name' => 'Super Admin',
            'email' => 'info@user.com',
            'password' => bcrypt('secret'),
            'publish' => 1,
        ]);

        User::firstOrCreate([
            'name' => 'Admin',
            'email' => 'info@admin.com',
            'password' => bcrypt('secret'),
            'publish' => 1,
        ]);

        $role = Role::where('guard_name', 'super-admin')->latest()->first();
        $user->syncRoles([$role]);
    }
}
