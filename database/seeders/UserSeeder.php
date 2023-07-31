<?php

namespace Database\Seeders;

use App\Models\User\Role;
use App\Models\User\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Config;

class UserSeeder extends Seeder
{
    public function run()
    {
        $roles = Config::get('roles_and_permissions.roles');

        foreach ($roles as $role => $permissions) {
            $user = User::create([
                'name' => $role,
                'email' => "$role@app.com",
                'password' => bcrypt("$role-123$$"),
            ]);
            $user->roles()->attach(Role::where('name', $role)->get('id')->first());
        }
    }
}
