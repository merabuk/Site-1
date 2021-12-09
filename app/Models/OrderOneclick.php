<?php

namespace App\Models;

use App\Models\Pivot\OrderOneclickProduct;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use Illuminate\Notifications\Notifiable;

class OrderOneclick extends Model
{
    use HasFactory, Notifiable;

    protected $table = 'order_oneclicks';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'phone',
    ];

    /**************************************************************** Связи ******************************************************/
    /**
     * Связь - товары в заказе
     */
    public function products()
    {
    	return $this->belongsToMany(Product::class, 'order_oneclick_products')->withPivot('count', 'color', 'size', 'material', 'direction', 'sex', 'season');
    }

    // Связь - Заказ имеет Юзера
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /****************************************** Геттеры **************************************/
    // Геттер - сумма заказа
    public function getTotalPriceAttribute()
    {
        $total = 0;
        foreach ($this->products as $key => $product) {
            $total = $total + $product->actual_price * $product->pivot->count;
        };
        return $total;
    }
}
