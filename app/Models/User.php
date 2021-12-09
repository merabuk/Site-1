<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Traits\HasRolesAndPermissions;
use App\Models\Role;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRolesAndPermissions;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'surname',
        'name',
        'patronymic',
        'email',
        'phone',
        'password',
        'city',
        'address',
        'manager_id',
        'api_token'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    //Коллекция юзеров с ролью
    public static function withRole($role)
    {
        $findedRole = Role::where('slug', $role)->first();
        return $findedRole->users;
    }

    /***************************************** Связи ****************************************/

    // Связь - Пользователь имеет Любимые Продукты
    public function favorites()
    {
        return $this->hasMany(Favorite::class);
    }

    // Связь - Пользователь имеет Продукты
    public function products()
    {
        return $this->belongsToMany(Product::class, 'favorites', 'user_id', 'product_id');
    }

    // Связь - Пользователь имеет много заказов
    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    // Связь - Пользователь имеет одну корзину
    public function cart()
    {
        return $this->hasOne(Cart::class);
    }

    //Связь - юзер может иметь менеджера (в частности диллер)
    public function manager()
    {
        return $this->belongsTo(User::class);
    }

    //Связь - менеджер может иметь много юзеров (в частности диллеров)
    public function dealers()
    {
        return $this->hasMany(User::class, 'manager_id')->with(['orders']);
    }
    /***************************************** Геттеры ****************************************/

    /**
     * геттер full_name
     * Получить полное имя пользователя.
     *
     * @return string
     */
    public function getFullNameAttribute()
    {
        if ($this->patronymic) {
            return "{$this->surname} {$this->name} {$this->patronymic}";
        } else {
            return "{$this->surname} {$this->name}";
        }
    }
}
