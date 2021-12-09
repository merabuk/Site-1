<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Image extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'imageable_id',
        'imageable_type',
        'path',
        'order',
        'is_main',
    ];

    /**
     * Полиморфная связь - возвращает экземпляр модели, к которой относится картинка.
     */
    public function imageable()
    {
        return $this->morphTo();
    }

    /**
     * Редактирование изображения
     */
    public function updateImage($validatedRequest, $pathToSave = '')
    {

        if (isset($validatedRequest['order'])) {
            $order =  $validatedRequest['order'];
        } else {
            $order = null;
        };
        if (isset($validatedRequest['is_main'])) {
            $is_main = true;
        } else {
            $is_main = false;
        };
        if (isset($validatedRequest['img'])) {
            $image = $validatedRequest['img'];
            Storage::disk('public')->delete($this->path);
            $savedImagePath = $image->store($pathToSave, 'public');
            $updateArray = [
                'path' => $savedImagePath,
                'order' => $order,
                'is_main' => $is_main,
            ];
            $this->update($updateArray);
        } else {
            $updateArray = [
                'order' => $order,
                'is_main' => $is_main,
            ];
            $this->update($updateArray);
        }
    }

    /**
     * Удаление изображения
     */
    public function deleteImage()
    {
        Storage::disk('public')->delete($this->path);
        $this->delete();
    }
}
