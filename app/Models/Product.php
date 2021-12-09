<?php

namespace App\Models;

use App\Traits\HasImages;
use App\Traits\HasVideos;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\Favorit;
use App\Traits\HasSearch;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class Product extends Model
{
    use HasFactory, HasImages, HasVideos, HasSearch;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['article', 'name', 'details', 'brand_id', 'keywords', 'description', 'is_active', 'price',
                            'dealer_price', 'discount', 'discount_from', 'discount_until', 'is_new',
                            'promotion_price', 'promotion_from', 'promotion_until',
                            'color', 'size', 'material', 'direction', 'sex', 'season',
                            'on_sale', 'quantity', 'length', 'width', 'height', 'dim_unit', 'weight', 'weight_unit'];

    /**
     * Поиск осуществляется по полям указанным тут
     *
     * @var array
     */
    protected $searchable = ['name', 'article', 'details', 'virtual_options'];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'discount_from' => 'datetime:Y-m-d H:i:s',
        'discount_until' => 'datetime:Y-m-d H:i:s',
        'promotion_from' => 'datetime:Y-m-d H:i:s',
        'promotion_until' => 'datetime:Y-m-d H:i:s',
        'color' => 'array',
        'size' => 'array',
        'material' => 'array',
        'direction' => 'array',
        'sex' => 'array',
        'season' => 'array',
    ];

    /**
     * The model's default values for attributes.
     *
     * @var array
     */
    protected $attributes = [
        'color' => '[]',
        'size' => '[]',
        'material' => '[]',
        'direction' => '[]',
        'sex' => '[]',
        'season' => '[]',
    ];

    /**
     * Массив единиц измерения габаритов товаров
     */
    public const DIMENSIONS_UNITS = array(
        array('code' => 1, 'unit' => 'мм'),
        array('code' => 2, 'unit' => 'cм'),
        array('code' => 3, 'unit' => 'м'),
    );

    /**
     * Массив единиц измерения веса товаров
     */
    public const WEIGHT_UNITS = [
            ['code' => 1, 'unit' => 'г'],
            ['code' => 2, 'unit' => 'кг'],
        ];

    /****************************************** Связи ****************************************/

    // Связь - Товар имеет Категории
    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    // Связь - Товар имеет Бренд
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    // Связь - Товар учавствует в Заказах
    public function orders()
    {
        return $this->belongsToMany(Order::class);
    }

    /****************************************** Геттеры **************************************/

    // Геттер - IDs категорий, к которым принадлежит товар
    public function getCategoryIdsAttribute()
    {
        return $this->categories->pluck('id')->toArray();
    }

    /**
     * Геттер dim_units
     * возвращает коллекцию единиц измерения габаритов товара
     */
    public function getDimUnitsAttribute()
    {
        return collect(self::DIMENSIONS_UNITS);
    }

    /**
     * Геттер dim_unit
     * Возвращает текст единицы измерения
     */
    public function getDimUnitAttribute()
    {
        $rowNumber = array_search($this->attributes['dim_unit'], array_column(self::DIMENSIONS_UNITS, 'code'));
        if ($rowNumber !== false) {
            return self::DIMENSIONS_UNITS[$rowNumber]['unit'];
        };
        return '';
    }

    /**
     * Геттер weight_units
     * возвращает коллекцию единиц измерения массы товара
     */
    public function getWeightUnitsAttribute()
    {
        return collect(self::WEIGHT_UNITS);
    }

    /**
     * Геттер weight_unit
     * Возвращает текст единицы измерения
     */
    public function getWeightUnitAttribute()
    {
        $rowNumber = array_search($this->attributes['weight_unit'], array_column(self::WEIGHT_UNITS, 'code'));
        if ($rowNumber !== false) {
            return self::WEIGHT_UNITS[$rowNumber]['unit'];
        };
        return '';
    }

    /**
     * Геттер discounted_price
     * Возвращает значение цены на товар с учетом скидки
     */
    public function getDiscountedPriceAttribute()
    {
        if ($this->discount) {
            return round(($this->price*(100 - $this->discount)/100), 2);
        }
        return null;
    }


    /**
     * функция getActualPriceByRole() (уже не геттер actual_price_by_role)
     * Возвращает актуальное значение цены на товар при наличии скидки или распродажной цены
     * в зависимости от роли
     */
    public function getActualPriceByRole($userId = null, $forCurrentUserOrForBuyer = true)
    {
        if (Auth::check()) {
            if ($userId == null) {
                if ($forCurrentUserOrForBuyer) {
                    $user = Auth::user();
                } else {
                    $user = Role::find(Role::roleIdFor('buyer'))->users->first();
                };
            } else {
                $user = User::find($userId);
            };
            if ($user->hasRole('dealer')) {
                // if ($this->actual_price) {
                //     return $this->actual_price;
                // };
                return $this->dealer_price;
            } else {
                if ($this->actual_price) {
                    return $this->actual_price;
                };
                return $this->price;
            };
        } else {
            if ($this->actual_price) {
                return $this->actual_price;
            };
            return $this->price;
        }
    }

    /**
     * Геттер actual_price
     * Возвращает актуальное значение цены на товар при наличии распродажной цены или скидки
     */
    public function getActualPriceAttribute()
    {
        if ($this->actual_promotion) {
            return $this->actual_promotion;
        } else if ($this->actual_discount) {
            return $this->actual_discount;
        }
        return null;
    }

    /**
     * Геттер actual_promotion
     * Возвращает актуальное значение цены на товар при наличиираспродажной цены
     */
    public function getActualPromotionAttribute()
    {
        if ($this->promotion_price /*&& Carbon::now()->isBetween($this->promotion_from, $this->promotion_until)*/) {
            return $this->promotion_price;
        }
        return null;
    }

    /**
     * Геттер actual_discount
     * Возвращает актуальное значение цены на товар при наличии скидки
     */
    public function getActualDiscountAttribute()
    {
        if ($this->discounted_price /*&& Carbon::now()->isBetween($this->discount_from, $this->discount_until)*/) {
            return $this->discounted_price;
        }
        return null;
    }

    /****************************************** Мутаторы **************************************/

    /**
     * Мутатор dim_unit
     * $dim_unit_text = 'мм', 'см', 'м' - входной параметр
     * В поле dim_unit кладет код единицы измерения
     */
    public function setDimUnitAttribute($dim_unit_text)
    {
        $rowNumber = array_search($dim_unit_text, array_column(self::DIMENSIONS_UNITS, 'unit'));
        if ($rowNumber !== false) {
            $dimUnitCode = self::DIMENSIONS_UNITS[$rowNumber]['code'];
            $this->attributes['dim_unit'] = $dimUnitCode;
        };
    }

    /**
     * Мутатор weight_unit
     * $weight_unit_text = 'г', 'кг' - входной параметр
     * В поле weight_unit кладет код единицы измерения
     */
    public function setWeightUnitAttribute($weight_unit_text)
    {
        $rowNumber = array_search($weight_unit_text, array_column(self::WEIGHT_UNITS, 'unit'));
        if ($rowNumber !== false) {
            $weightUnitCode = self::WEIGHT_UNITS[$rowNumber]['code'];
            $this->attributes['weight_unit'] = $weightUnitCode;
        };
    }

    /***************************************** Скоупы ****************************************/

    //сортировка активных товаров
    public function scopeIsActive($query)
    {
        return $query->where('is_active', true);
    }

    //сортировка товаров в наличии
    public function scopeInStock($query)
    {
        return $query->where('quantity','>', 0);
    }

    //сортировка товаров участвующих в распродаже
    public function scopeIsSale($query)
    {
        return $query->where('on_sale', true);
    }

    //сортировка товаров новинок
    public function scopeIsNew($query)
    {
        return $query->where('is_new', true);
    }

    //get class favorit product
    public function checkFavoritProduct()
    {
        $class = new Favorite();
        return $class->checkFavorite($this->id, Auth()->id());
    }
}
