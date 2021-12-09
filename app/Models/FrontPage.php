<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Article;

class FrontPage extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['title', 'slug', 'keywords', 'description', 'articles_arr'];

    //Замена токена {front_page} с id на slug
    public function getRouteKeyName()
    {
        return 'slug';
    }

    // Связь -> Страница имеет много статей
    public function articles()
    {
        return $this->hasMany(Article::class);
    }
}
