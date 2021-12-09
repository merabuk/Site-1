<?php

namespace App\Models;

use App\Models\Pivot\OrderProduct;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use Illuminate\Notifications\Notifiable;

class Order extends Model
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'total_count', 'total_price', 'user_id', 'surname', 'name', 'patronymic', 'email', 'phone', 'city', 'address', 'comment', 'pikup', 'status_id', 'manager_id'
    ];

    /**************************************************************** Связи ******************************************************/
    /**
     * Связь - товары в заказе
     */
    public function products()
    {
    	return $this->belongsToMany(Product::class)->withPivot('id','article', 'name', 'price', 'count', 'color', 'size', 'material', 'direction', 'sex', 'season');
    }

    // Связь - Заказ имеет Юзера
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Связь - Заказ имеет Менеджера
    public function manager()
    {
        return $this->belongsTo(User::class);
    }

    // Связь - Заказ имеет Статус
    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    //Связь - Заказ имеет товары в заказе (нужно для уже удаленных товаров)
    public function orders_products()
    {
    	return $this->hasMany(OrderProduct::class);
    }
}
