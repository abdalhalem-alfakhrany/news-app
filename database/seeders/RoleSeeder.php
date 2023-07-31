<?php

namespace Database\Seeders;

use App\Models\User\Permission;
use App\Models\User\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Config;

class RoleSeeder extends Seeder
{
    public function run()
    {
        // Role::truncate();
        $roles = Config::get('roles_and_permissions.roles');

        foreach ($roles as $role => $permissions) {

            $role = Role::firstOrCreate([
                'name' => $role,
                'display_name' => $role
            ]);

            $rolePermissions = [];
            foreach ($permissions as $module => $operations) {
                foreach ($operations as  $operation) {
                    array_push($rolePermissions, Permission::where('name', "$module-$operation")->get(['id'])->first()['id']);
                }
            }

            $role->permissions()->sync($rolePermissions);
        }
    }
}
