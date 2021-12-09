<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'videoable_id',
        'videoable_type',
        'name',
        'src',
        'order',
    ];

    /**
     * Полиморфная связь - возвращает экземпляр модели, к которой относится видео.
     */
    public function imageable()
    {
        return $this->morphTo();
    }
}
