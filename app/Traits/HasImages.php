<?php

namespace App\Traits;

use App\Models\Image;
use Illuminate\Support\Facades\Storage;

trait HasImages
{
    /**
     * Полиморфная связь - Все картинки, которые принадлежат экземпляру класса
     */
    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }

    /**
     * Полиморфная связь - Главная картинка, которая принадлежит экземпляру класса
     */
    public function mainImage()
    {
        return $this->images()->where('is_main', true);
    }

    /**
     * Полиморфная связь - Дополнительные картинки, которые принадлежат экземпляру класса
     */
    public function addedImages()
    {
        return $this->images()->where('is_main', '!=', true)->orderByRaw('ISNULL(`order`) ASC, `order` ASC');
    }

    /**
     * Сохранение картинок на сервер
     */
    public function uploadImages($validatedRequest, $pathToSave)
    {
        if (!empty($validatedRequest['images'])) {
            foreach ($validatedRequest['images'] as $key => $image) {
                $savedImagePath = $image->store($pathToSave, 'public');
                if (isset($validatedRequest['order'][$key])) {
                    $order =  $validatedRequest['order'][$key];
                } else {
                    $order = null;
                };
                if (isset($validatedRequest['is_main'][$key])) {
                    $is_main = true;
                } else {
                    $is_main = false;
                };
                $createArray = [
                    'path' => $savedImagePath,
                    'order' => $order,
                    'is_main' => $is_main,
                ];
                $this->images()->create($createArray);
            }
        }
    }

    /**
     * Удаление картинок с сервера и из базы
     */
    public function deleteImages()
    {
        //Удаляем картинки экземпляра класа
        foreach ($this->images as $image) {
           Storage::disk('public')->delete($image->path);
           $image->delete();
        };
    }
}
