<?php

namespace App\Traits;

use App\Models\Video;

trait HasVideos
{
    /**
     * Полиморфная связь - Все видео ссылки, которые принадлежат экземпляру класса
     */
    public function videos()
    {
        return $this->morphMany(Video::class, 'videoable');
    }

    /**
     * Сохранение видео ссылок на сервер
     */
    public function uploadVideos($validatedRequest)
    {
        if (!empty($validatedRequest['video-src'])) {
            foreach ($validatedRequest['video-src'] as $index => $value) {
                $videoArr = [];
                if ($value) {
                    $videoArr['name'] = $validatedRequest['video-name'][$index];
                    $videoArr['src'] = $validatedRequest['video-src'][$index];
                    $videoArr['order'] = $validatedRequest['video-order'][$index];
                    $this->videos()->create($videoArr);
                }
            }
        }
    }

    /**
     * Удаление видео ссылок с сервера и из базы
     */
    public function deleteVideos()
    {
        //Удаляем видео ссылки экземпляра класа
        foreach ($this->videos as $video) {
           $video->delete();
        };
    }
}
