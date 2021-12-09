<?php

namespace App\Models;

use App\Traits\HasImages;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

class Category extends Model
{
    use HasFactory, HasImages;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'slug', 'import_code', 'category_id', 'filter_id', 'keywords', 'description', 'is_active', 'details'];

    //Замена токена {category} с id на slug
    public function getRouteKeyName()
    {
        return 'slug';
    }

    /**************************************************************** Связи ******************************************************/
    /**
     * Связь OneToMany - дочерние категории на один уровень ниже
     */
    public function categories()
    {
        return $this->hasMany(Category::class);
    }

    /**
     * Рекурсивная связь - все дочерние категории
     */
    public function childrens()
    {
        return $this->hasMany(Category::class)->with('categories');
    }

    /**
     * Связь BelongsTo - родительская категория
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Связь - Категория имеет Продукты
    public function products()
    {
        return $this->belongsToMany(Product::class);
    }

    // Связь - Категория имеет Фильтр
    public function filter()
    {
        return $this->belongsTo(Filter::class);
    }

    /***************************************** Скоупы ****************************************/

    //сортировка активных категорий
    public function scopeIsActive($query)
    {
        return $query->where('is_active', true);
    }

    //сортировка - только главные категории
    public function scopeIsMain($query)
    {
        return $query->whereNull('category_id');
    }

    //сортировка - категории без фильтра
    public function scopeWithoutFilter($query)
    {
        return $query->doesntHave('filter');
    }
    /***************************************** Геттеры ****************************************/

    public function getAllProductsAttribute()
    {
        $thisProducts = $this->products->where('is_active', true);
        $childrensProducts = $this->childrens->where('is_active', true)->load('products')->pluck('products')->flatten();
        $allProducts = $thisProducts->merge($childrensProducts);
        return $allProducts;
    }
}
