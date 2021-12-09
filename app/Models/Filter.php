<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Filter extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'is_active', 'brand', 'price_from', 'price_until', 'color', 'size', 'material', 'direction', 'sex', 'season',];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'brand' => 'array',
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
        'brand' => '[]',
        'color' => '[]',
        'size' => '[]',
        'material' => '[]',
        'direction' => '[]',
        'sex' => '[]',
        'season' => '[]',
    ];

    /****************************************** Связи ****************************************/

    // Связь - Фильтр принадлежит к Категориям
    public function categories()
    {
        return $this->hasMany(Category::class);
    }

    /****************************************** Геттеры **************************************/

    // Геттер - IDs категорий, к которым принадлежит товар
    public function getCategoryIdsAttribute()
    {
        return $this->categories->pluck('id')->toArray();
    }

}
