<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\RoleSeeder;
use Database\Seeders\PermissionSeeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\CategorySeeder;
use Database\Seeders\ProductSeeder;
use Database\Seeders\FrontPageSeeder;
use Database\Seeders\ArticleSeeder;
use Database\Seeders\FilterSeeder;
use Database\Seeders\StatusSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            RoleSeeder::class,
            PermissionSeeder::class,
            UserSeeder::class,
            CategorySeeder::class,
            BrandSeeder::class,
            //ProductSeeder::class,
            FrontPageSeeder::class,
            ArticleSeeder::class,
            FilterSeeder::class,
            StatusSeeder::class,
            //MainPageSeeder::class,
        ]);
    }
}
