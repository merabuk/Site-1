<?php

namespace App\Models;

use App\Traits\HasImages;
use App\Traits\HasVideos;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory, HasImages, HasVideos;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'slug',
        'brand_order',
        'is_active',
        'keywords',
        'description',
        'title',
        'details',
    ];

    /************************************** Замена токена *************************************/

    //Замена токена {brand} с id на slug
    public function getRouteKeyName()
    {
        return 'slug';
    }

    /**************************************************************** Связи ******************************************************/

    // Связь - Бренд имеет Продукты
    public function products()
    {
        return $this->hasMany(Product::class);
    }

    /***************************************** Скоупы ****************************************/

    //сортировка активных брендов
    public function scopeIsActive($query)
    {
        return $query->where('is_active', true);
    }

    //найти первый бренд по ордеру
    public function scopeMinOrderBrand($query)
    {
        return $query->where([
            ['brand_order', '!=', null],
        ])->min('brand_order');
    }

    //сортировка брендов по ордеру
    public function scopeBrandByOrder($query)
    {
        return $query->orderByRaw('ISNULL(`brand_order`) ASC, `brand_order` ASC');
    }
}
