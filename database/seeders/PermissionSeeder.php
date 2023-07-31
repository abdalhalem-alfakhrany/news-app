<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Config;
use App\Models\User\Permission;

class PermissionSeeder extends Seeder
{
    public function run()
    {
        // Permission::truncate();
        $modules = Config::get('roles_and_permissions.modules');
        $opeartions = Config::get('roles_and_permissions.operations');

        foreach ($modules as $module) {
            foreach ($opeartions as $opeartion) {
                Permission::create([
                    'name' => "$module-$opeartion",
                    'display_name' => "$module $opeartion"
                ]);
            }
        }
    }
}
