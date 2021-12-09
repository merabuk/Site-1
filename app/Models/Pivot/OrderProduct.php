<?php

namespace App\Models\Pivot;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\Pivot;

class OrderProduct extends Pivot
{
    use HasFactory;

    protected $table = 'order_product';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    	'order_id', 'product_id', 'article', 'name', 'price', 'count', 'color', 'size', 'material', 'direction', 'sex', 'season'
    ];

    /**************************************************************** Связи ******************************************************/
    /**
     * Связь BelongsTo - заказ
     */
    public function order()
    {
    	return $this->belongsTo(Order::class);
    }

    /**
     * Связь BelongsTo - товар
     */
    public function product()
    {
    	return $this->belongsTo(Product::class);
    }
}
