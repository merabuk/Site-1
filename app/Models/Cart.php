<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id', 'user_cart'];

    /**************************************************************** Связи ******************************************************/

    // Связь - Корзина имеет Юзера
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
