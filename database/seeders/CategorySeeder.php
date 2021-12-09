<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Image;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Массив категорий
        $categories = [
            ['name' => 'Шоломи і мотоекіпірування'  , 'import_code' => 1,   'category_id' => null],   //1
            ['name' => 'Мотоаксесуари'              , 'import_code' => 2,   'category_id' => null],   //2
            ['name' => 'CASUAL'                     , 'import_code' => 3,   'category_id' => null],   //3

            ['name' => 'Шоломи'                     , 'import_code' => 11,  'category_id' => 1],
            ['name' => 'Взуття'                     , 'import_code' => 12,  'category_id' => 1],
            ['name' => 'Комбінезони'                , 'import_code' => 13,  'category_id' => 1],
            ['name' => 'Аксесуари'                  , 'import_code' => 14,  'category_id' => 1],
            ['name' => 'Дощовики'                   , 'import_code' => 15,  'category_id' => 1],
            ['name' => 'Перчатки'                   , 'import_code' => 16,  'category_id' => 1],
            ['name' => 'Куртки'                     , 'import_code' => 17,  'category_id' => 1],
            ['name' => 'Одяг для кросу'             , 'import_code' => 18,  'category_id' => 1],
            ['name' => 'Окуляри'                    , 'import_code' => 19,  'category_id' => 1],
            //['name' => 'Сорочки'                    , 'import_code' => 111, 'category_id' => 1],
            ['name' => 'Захист'                     , 'import_code' => 112, 'category_id' => 1],
            ['name' => 'Брюки'                      , 'import_code' => 113, 'category_id' => 1],
            ['name' => 'Жилети'                     , 'import_code' => 114, 'category_id' => 1],
            //['name' => 'Светр'                      , 'import_code' => 115, 'category_id' => 1],
            //['name' => 'Светр для кросу'            , 'import_code' => 116, 'category_id' => 1],
            //['name' => 'Черепахи'                   , 'import_code' => 117, 'category_id' => 1],
            ['name' => 'Шапки'                      , 'import_code' => 118, 'category_id' => 3],
            //['name' => 'Шорти'                      , 'import_code' => 119, 'category_id' => 1],
            ['name' => 'Джинси'                     , 'import_code' => 121, 'category_id' => 1],
            ['name' => 'Термобілизна'               , 'import_code' => 122, 'category_id' => 1],
            ['name' => 'Рюкзаки та сумки'           , 'import_code' => 143, 'category_id' => 1],
            ['name' => 'Підшоломники'               , 'import_code' => 145, 'category_id' => 1],


            ['name' => 'Вітрове скло'               , 'import_code' => 21,  'category_id' => 2],
            ['name' => 'Дуги захисту двигуна'       , 'import_code' => 22,  'category_id' => 2],
            ['name' => 'Багажні аксесуари'          , 'import_code' => 23,  'category_id' => 2],
            //['name' => 'Тюнінг'                     , 'import_code' => 24,  'category_id' => 2],
            ['name' => 'Запчастини'                 , 'import_code' => 25,  'category_id' => 2],
            //['name' => 'Наліпки'                    , 'import_code' => 26,  'category_id' => 2],
            //['name' => 'Ручки'                      , 'import_code' => 27,  'category_id' => 2],
            ['name' => 'Інше'                       , 'import_code' => 28,  'category_id' => 2],
            //['name' => 'Спинки'                     , 'import_code' => 29,  'category_id' => 2],
            //['name' => 'Скло'                       , 'import_code' => 221, 'category_id' => 2],
            //['name' => 'Повітряні фільтри'          , 'import_code' => 222, 'category_id' => 2],
            //['name' => 'Масляні фільтри'            , 'import_code' => 223, 'category_id' => 2],
            ['name' => 'Чохли'                      , 'import_code' => 224, 'category_id' => 2],

            ['name' => 'Гаманці'                    , 'import_code' => 31,  'category_id' => 3],
            ['name' => 'Кепки'                      , 'import_code' => 32,  'category_id' => 3],
            ['name' => 'Футболки'                   , 'import_code' => 33,  'category_id' => 3],
            ['name' => 'Кофти'                      , 'import_code' => 34,  'category_id' => 3],
            ['name' => 'Ремені'                     , 'import_code' => 35,  'category_id' => 3],
            ['name' => 'Бандани'                    , 'import_code' => 36,  'category_id' => 3],
            ['name' => 'Брелоки'                    , 'import_code' => 37,  'category_id' => 3],
            ['name' => 'Годинники'                  , 'import_code' => 38,  'category_id' => 3],
        ];

        foreach ($categories as $key => $category) {
            $record = new Category();
            $record->name = $category['name'];
            $record->slug = Str::slug($category['name']);
            $record->import_code = $category['import_code'];
            $record->is_active = true;
            $record->category_id = $category['category_id'];
            $record->details = '';
            $record->save();

            //Картинка в описании категории
            $image = new Image();
            $image->imageable_type = get_class($record);
            $image->imageable_id = $record->id;
            $pathToFile = Storage::disk('seeders')->path('categories/moto-set.jpg');
            $hashPath = Storage::disk('public')->putFile('/images/categories', new File($pathToFile));
            $image->path = $hashPath;
            $image->is_main = true;
            $image->save();
        }
    }
}
