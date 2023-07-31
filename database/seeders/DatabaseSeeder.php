<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call(PermissionSeeder::class);
        $this->call(RoleSeeder::class);

        $this->call(UserSeeder::class);

        // $this->call(AdvertisementSeeder::class);
        // $this->call(CategorySeeder::class);
        // $this->call(ArticleSeeder::class);
    }
}
