<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Permission;


class Role extends Model
{
    use HasFactory;

    /************************************* Связи *************************************/

    // Связь - Роль имеет Права
    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }

    // Связь -> Роль имеет много Юзеров
    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    /************************************* Статичная функция  *************************************/
    //ID роли
    public static function roleIdFor($role)
    {
        return self::where('slug', $role)->first();
    }

}
