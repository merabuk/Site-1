<?php

namespace App\Models\Pivot;

use App\Models\OrderOneclick;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\Pivot;

class OrderOneclickProduct extends Pivot
{
    use HasFactory;

    protected $table = 'order_oneclick_products';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    	'order_oneclick_id', 'product_id', 'count', 'color', 'size', 'material', 'direction', 'sex', 'season'
    ];

    /**************************************************************** Связи ******************************************************/
    /**
     * Связь BelongsTo - заказ в один клик
     */
    public function OrderOneclick()
    {
    	return $this->belongsTo(OrderOneclick::class);
    }

    /**
     * Связь BelongsTo - товар
     */
    public function product()
    {
    	return $this->belongsTo(Product::class);
    }
}
