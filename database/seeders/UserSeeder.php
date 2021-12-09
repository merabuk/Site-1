<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Администратор
        $superadminRole = Role::roleIdFor('superadmin');
        $superadmin = new User();
        $superadmin->surname = 'СуперАдмінов';
        $superadmin->name = 'СуперАдміністратор';
        $superadmin->patronymic = 'СуперАдміністраторович';
        $superadmin->email = 'superadmin@mail.com';
        $superadmin->phone = '(099) 000-00-00';
        $superadmin->password = Hash::make('superpassword123');
        $superadmin->api_token = Str::random(60);
        $superadmin->save();
        $superadmin->roles()->attach($superadminRole);

        //Администратор
        $adminRole = Role::roleIdFor('admin');
        $admin = new User();
        $admin->surname = 'Адмінов';
        $admin->name = 'Адміністратор';
        $admin->patronymic = 'Адміністраторович';
        $admin->email = 'admin@mail.com';
        $admin->phone = '(099) 111-11-11';
        $admin->password = Hash::make('password123');
        $admin->api_token = Str::random(60);
        $admin->save();
        $admin->roles()->attach($adminRole);

        //Менеджер
        $managerRole = Role::roleIdFor('manager');
        $manager = new User();
        $manager->surname = 'Менеджеров';
        $manager->name = 'Менеджер';
        $manager->patronymic = 'Менеджерович';
        $manager->email = 'manager@mail.com';
        $manager->phone = '(099) 222-22-22';
        $manager->password = Hash::make('password123');
        $manager->api_token = Str::random(60);
        $manager->save();
        $manager->roles()->attach($managerRole);

        //Дилер
        $dealerRole = Role::roleIdFor('dealer');
        $dealer = new User();
        $dealer->surname = 'Ділеров';
        $dealer->name = 'Ділер';
        $dealer->patronymic = 'Ділерович';
        $dealer->email = 'dealer@mail.com';
        $dealer->phone = '(099) 333-33-33';
        $dealer->password = Hash::make('password123');
        $dealer->api_token = Str::random(60);
        $dealer->save();
        $dealer->roles()->attach($dealerRole);

        //Зарегистрированный юзер
        $userRole = Role::roleIdFor('buyer');
        $user = new User();
        $user->surname = 'Іванов';
        $user->name = 'Іван';
        $user->patronymic = 'Іванович';
        $user->email = 'buyer@mail.com';
        $user->phone = '(099) 444-44-44';
        $user->city = 'City';
        $user->address = 'Street, Build, Flat';
        $user->password = Hash::make('password123');
        $user->api_token = Str::random(60);
        $user->save();
        $user->roles()->attach($userRole);
    }
}
