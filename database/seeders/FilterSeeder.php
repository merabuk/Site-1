<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Filter;
use App\Models\Category;

class FilterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //МА куртки,брюки //1
        $filter = new Filter();
        $filter->name = 'МА куртки,брюки';
        $filter->is_active = true;
        $filter->brand = ["1", "2", "5", "7", "8", "11", "12", "15", "16", "17", "20", "25"];
        $filter->color = [
            "Coffee", "Cream", "Бежевий", "Білий", "білий мат", "Білий-золотий", "Білий-червоний", "Білий-срібло", "Білий-синій", "Бірюзовий",
            "Блакитний", "Жовтий", "Зелений", "Зелений (матовий)", "Золото", "Коричневий", "Червоний", "Кремовий", "Оливковий", "Помаранчевий",
            "Прозорий", "Малюнок", "Рожевий", "Срібло", "Срібло (матовий)", "Сіро-жовтий", "Сіро-червоний", "Сіро-рожевий",
            "Сіро-синій", "Сірий", "Сірий глянсовий", "Сірий-червоний-чорний", "Синій", "Титаново-сірий", "Флуоресцент",
            "Хакі", "Кольоровий", "Чорно-бежевий", "Чорно-білий", "Чорно-жовтий", "Чорно-зелений", "Чорно-червоний", "Чорно-помаранчевий",
            "Чорно-рожевий", "Чорно-сірий", "Чорно-синій", "Чорно-бузковий", "Чорно-хром", "Чорний", "Чорний глянсовий",
            "Чорний матовий", "Чорний-білий-червоний", "Чорний-білий-синій", "Шоколадний"
        ];
        $filter->size = [
            "01", "02", "03", "24", "26", "27", "28", "29", "30", "31", "32", "33", "34", "35", "36", "37", "38", "39", "40", "40.5",
            "41", "42", "42.5", "43", "44", "45", "46", "47", "48", "49", "4XL", "50", "52", "54", "56", "58", "5XL", "60", "62",
            "64", "6XL", "L", "M", "ML", "MS", "S", "T0", "T1", "T10", "T11", "T12", "T13", "T2", "T3", "T4", "T5", "T6", "T7",
            "T8", "T9", "W4XL", "W5XL", "WL", "WXL", "WXXL", "WXXXL", "XL", "XS", "XXL", "XXS", "XXXL"
        ];
        $filter->material = ["Goretex", "Water Resistant", "WaterProof", "WindProof", "Джинс", "Карбоноволокно", "Шкіра", "Комбі (кожа/текстиль)", "Текстиль", "Х/Б"];
        $filter->direction = ["Крос/Offroad", "Спорт", "Стріт", "Туризм"];
        $filter->sex = ["Чоловічий", "Жіночий"];
        $filter->season = ["Демісезон", "Літо"];
        $filter->save();

        $categories = Category::whereIn('name', ['Шоломи і мотоекіпірування', 'Куртки', 'Брюки'])->get();
        foreach ($categories as $key => $category) {
            $category->filter_id = $filter->id;
            $category->save();
        }

        //Багажні аксесуари //2
        $filter = new Filter();
        $filter->name = 'Багажні аксесуари';
        $filter->is_active = true;
        $filter->brand = ["5", "6", "7", "11", "12", "16", "26"];
        $filter->direction = ["Кофри", "Кріпильні кільця", "Кріплення для кофру", "Кріпильна сітка", "Текстильні сумки"];
        $filter->save();

        $categories = Category::whereIn('name', ['Багажні аксесуари'])->get();
        foreach ($categories as $key => $category) {
            $category->filter_id = $filter->id;
            $category->save();
        }

        //Категорії аксесуарів //3
        $filter = new Filter();
        $filter->name = 'Фільтр аксесуарів';
        $filter->is_active = true;
        $filter->brand = ["2", "4", "5", "6", "7", "9", "10", "11", "12", "13", "14", "16", "17", "18", "19", "20", "21", "22", "23", "25"];
        $filter->direction = ["Запчастини до взуття", "Запчастини до шолому", "Скло на шолом"];
        $filter->save();

        $categories = Category::whereIn('name', ['Аксесуари'])->get();
        foreach ($categories as $key => $category) {
            $category->filter_id = $filter->id;
            $category->save();
        }

        //Запчастини //4
        $filter = new Filter();
        $filter->name = 'Запчастини';
        $filter->is_active = true;
        $filter->brand = ["4", "5", "9"];
        $filter->direction = ["Акумулятори", "Диски зчеплення", "Диски гальмівні", "Захисні дуги", "Гальмівні колодки", "Гума", "Ремені варіатору", "Сальники", "Свічки запалювання", "Фільтри повітряні"];
        $filter->save();

        $categories = Category::whereIn('name', ['Запчастини'])->get();
        foreach ($categories as $key => $category) {
            $category->filter_id = $filter->id;
            $category->save();
        }

        //Категорії для захисту //5
        $filter = new Filter();
        $filter->name = 'Категорії для захисту';
        $filter->is_active = true;
        $filter->brand = ["2", "5", "7", "17", "19", "20", "24"];
        $filter->direction = ["Захист колін", "Захист ліктів", "Захист спини", "Захист стегон"];
        $filter->save();

        $categories = Category::whereIn('name', ['Захист'])->get();
        foreach ($categories as $key => $category) {
            $category->filter_id = $filter->id;
            $category->save();
        }

        //Фільтр шолому //6
        $filter = new Filter();
        $filter->name = 'Фільтр шолому';
        $filter->is_active = true;
        $filter->brand = ["2", "3", "4", "5", "9", "10", "13", "14", "18", "19", "21", "22", "25"];
        $filter->material = ["Карбоноволокно", "Композит", "Пластмаса", "Термопластик"];
        $filter->direction = ["Напівлицевий", "Інтеграл", "Трансформер/FlipUp", "Off-road/Крос"];
        $filter->save();

        $categories = Category::whereIn('name', ['Шоломи'])->get();
        foreach ($categories as $key => $category) {
            $category->filter_id = $filter->id;
            $category->save();
        }

        //Фільтр взуття //7
        $filter = new Filter();
        $filter->name = 'Фільтр взуття';
        $filter->is_active = true;
        $filter->brand = ["2", "5", "16", "17", "20", "23", "25"];
        $filter->size = ["36", "37", "38", "39", "40", "41", "42", "43", "44", "45", "46", "47", "48", "49", "50"];
        $filter->material = ["Water resistant", "WaterProof", "WindProof", "Джинс", "Комбі (Шкіра/текстиль)", "Текстиь", "Карбоноволокно", "Х/Б"];
        $filter->direction = ["Спорт", "Крос/Offroad", "Стріт", "Туризм"];
        $filter->sex = ["Жіноча колекція", "Чоловіча колекція"];
        $filter->save();

        $categories = Category::whereIn('name', ['Взуття'])->get();
        foreach ($categories as $key => $category) {
            $category->filter_id = $filter->id;
            $category->save();
        }

        //Дощовики //8
        $filter = new Filter();
        $filter->name = 'Дощовики';
        $filter->is_active = true;
        $filter->brand = ["1", "2", "7", "11", "12", "16", "17"];
        $filter->material = ["WaterProof", "WaterResistant", "Windproof", "Джинс", "Карбоноволокно", "Шкіра", "Комбі (шкіра/текстиль)", "Текстиль", "Х/Б"];
        $filter->direction = ["Спорт", "Туризм", "Крос/Offroad", "Стріт"];
        $filter->sex = ["Жіноча колекція", "Чоловіча колекція"];
        $filter->save();

        $categories = Category::whereIn('name', ['Дощовики'])->get();
        foreach ($categories as $key => $category) {
            $category->filter_id = $filter->id;
            $category->save();
        }

        //Фільтр Рукавички //9
        $filter = new Filter();
        $filter->name = 'Рукавички';
        $filter->is_active = true;
        $filter->brand = ["2", "5", "7", "11", "15", "16", "17", "20"];
        $filter->size = ["5XL", "4XL", "XXXL", "XXL", "XL", "L", "M", "S", "XS", "T13", "T12", "T11", "T10", "T9", "T8",
            "T7", "T6", "T5", "T4", "T3", "T2", "T1", "T0"];
        $filter->material = ["WaterResistant", "WaterProof", "WindProof", "Джинс", "Карбоноволокно", "Шкіра", "Комбі (шкіра/текстиль)", "Х/Б"];
        $filter->direction = ["Спорт", "Крос/Offroad", "Стріт", "Туризм"];
        $filter->sex = ["Жіноча колекція", "Чоловіча колекція"];
        $filter->save();

        $categories = Category::whereIn('name', ['Перчатки'])->get();
        foreach ($categories as $key => $category) {
            $category->filter_id = $filter->id;
            $category->save();
        }

        //Фільтр Одяг для кросу //10
        $filter = new Filter();
        $filter->name = 'Одяг для кросу';
        $filter->is_active = true;
        $filter->brand = ["2", "5", "11", "27"];
        $filter->direction = ["Стабілізатори шолому", "Брюки для кросу", "Джерсі", "Окуляри для кросу", "Захист корпусу", "Захист колін", "Захист ліктів", "Шорти компресійні", "Рукавички для кросу"];
        $filter->save();

        $categories = Category::whereIn('name', ['Одяг для кросу'])->get();
        foreach ($categories as $key => $category) {
            $category->filter_id = $filter->id;
            $category->save();
        }

        //Фільтр Окуляри //11
        $filter = new Filter();
        $filter->name = 'Окуляри';
        $filter->is_active = true;
        $filter->brand = ["12", "13", "19"];
        $filter->save();

        $categories = Category::whereIn('name', ['Окуляри'])->get();
        foreach ($categories as $key => $category) {
            $category->filter_id = $filter->id;
            $category->save();
        }

        //Фільтр Сорочки //12
        $filter = new Filter();
        $filter->name = 'Сорочки';
        $filter->is_active = true;
        $filter->brand = ["17"];
        $filter->size = ["6XL", "5XL", "4XL", "XXXL", "XXL",
            "XL",
            "L",
            "T0",
            "T1",
            "T2",
            "T3",
            "T4",
            "T5",
            "T6",
            "36",
            "38",
            "40",
            "42",
            "44",
            "46",
            "48",
            "50",
            "52",
            "54",
            "56",
            "58",
            "60",
            "62",
            "64",
            "66",
            "68",
            "M",
            "S",
            "XS",
            "XXS"
        ];
        $filter->save();

        //Фільтр Вітрове скло //13
        $filter = new Filter();
        $filter->name = 'Вітрове скло';
        $filter->is_active = true;
        $filter->brand = ["12", "26"];
        $filter->save();

        $categories = Category::whereIn('name', ['Вітрове скло'])->get();
        foreach ($categories as $key => $category) {
            $category->filter_id = $filter->id;
            $category->save();
        }

        //Фільтр Дуги захисту двигуна //14
        $filter = new Filter();
        $filter->name = 'Дуги захисту двигуна';
        $filter->is_active = true;
        $filter->brand = ["12"];
        $filter->save();

        $categories = Category::whereIn('name', ['Дуги захисту двигуна'])->get();
        foreach ($categories as $key => $category) {
            $category->filter_id = $filter->id;
            $category->save();
        }

        /*//Фільтр Тюнінгу //15
        $filter = new Filter();
        $filter->name = 'Фільтр тюнінгу';
        $filter->is_active = true;
        $filter->brand = ["11", "12", "27"];
        $filter->direction = [
            "Армовані шланги",
            "Декоративні стрічки",
            "Зірочки регулювання",
            "Зірки ведені",
            "Кріплення глушника",
            "Набори тюнінгу",
            "Відбійники",
            "Повороти",
            "Важелі зчеплення"
        ];
        $filter->save();

        $categories = Category::whereIn('name', ['Тюнінг'])->get();
        foreach ($categories as $key => $category) {
            $category->filter_id = $filter->id;
            $category->save();
        }

        //Фільтр Наліпки //16
        $filter = new Filter();
        $filter->name = 'Наліпки';
        $filter->is_active = true;
        $filter->brand = ["27"];
        $filter->save();

        $categories = Category::whereIn('name', ['Наліпки'])->get();
        foreach ($categories as $key => $category) {
            $category->filter_id = $filter->id;
            $category->save();
        }

        //Фільтр Ручки //17
        $filter = new Filter();
        $filter->name = 'Ручки';
        $filter->is_active = true;
        $filter->brand = ["27"];
        $filter->save();

        $categories = Category::whereIn('name', ['Ручки'])->get();
        foreach ($categories as $key => $category) {
            $category->filter_id = $filter->id;
            $category->save();
        } */

        //Фільтр Кепки //18
        $filter = new Filter();
        $filter->name = 'Кепки';
        $filter->is_active = true;
        $filter->brand = ["4", "5", "19", "22", "23"];
        $filter->save();

        $categories = Category::whereIn('name', ['Кепки'])->get();
        foreach ($categories as $key => $category) {
            $category->filter_id = $filter->id;
            $category->save();
        }

        //Фільтр Футболки //19
        $filter = new Filter();
        $filter->name = 'Футболки';
        $filter->is_active = true;
        $filter->brand = ["5"];
        $filter->save();

        $categories = Category::whereIn('name', ['Футболки'])->get();
        foreach ($categories as $key => $category) {
            $category->filter_id = $filter->id;
            $category->save();
        }

        //Фільтр Ремені //20
        $filter = new Filter();
        $filter->name = 'Ремені';
        $filter->is_active = true;
        $filter->brand = ["5", "17"];
        $filter->save();

        $categories = Category::whereIn('name', ['Ремені'])->get();
        foreach ($categories as $key => $category) {
            $category->filter_id = $filter->id;
            $category->save();
        }

        //Фільтр Значки та брелоки //21
        $filter = new Filter();
        $filter->name = 'Значки та брелоки';
        $filter->is_active = true;
        $filter->brand = ["5"];
        $filter->save();

        $categories = Category::whereIn('name', ['Брелоки'])->get();
        foreach ($categories as $key => $category) {
            $category->filter_id = $filter->id;
            $category->save();
        }

        //Фільтр Годинники //22
        $filter = new Filter();
        $filter->name = 'Годинники';
        $filter->is_active = true;
        $filter->brand = ["5"];
        $filter->save();

        $categories = Category::whereIn('name', ['Годинники'])->get();
        foreach ($categories as $key => $category) {
            $category->filter_id = $filter->id;
            $category->save();
        }

        //Фільтр Термобілизни //23
        $filter = new Filter();
        $filter->name = 'Фільтр термобілизни';
        $filter->is_active = true;
        $filter->brand = ["12", "16", "17", "23"];
        $filter->direction = ["Термокомбінезон", "Термокофти", "Термобрюки", "Шкарпетки", "Жилет"];
        $filter->save();

        $categories = Category::whereIn('name', ['Термобілизна'])->get();
        foreach ($categories as $key => $category) {
            $category->filter_id = $filter->id;
            $category->save();
        }
    }
}
