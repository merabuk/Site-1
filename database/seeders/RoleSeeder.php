<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        //Администратор
        $superadmin = new Role();
        $superadmin->name = 'Головний Адміністратор';
        $superadmin->slug = 'superadmin';
        $superadmin->rank = 1000;
        $superadmin->save();
        //Администратор
        $admin = new Role();
        $admin->name = 'Адміністратор';
        $admin->slug = 'admin';
        $admin->rank = 100;
        $admin->save();
        //Менеджер
        $manager = new Role();
        $manager->name = 'Менеджер';
        $manager->slug = 'manager';
        $manager->rank = 50;
        $manager->save();
        //Дилер
        $dealer = new Role();
        $dealer->name = 'Ділер';
        $dealer->slug = 'dealer';
        $dealer->rank = 10;
        $dealer->save();
        //Покупатель
        $user = new Role();
        $user->name = 'Покупець';
        $user->slug = 'buyer';
        $user->rank = 0;
        $user->save();
    }
}
