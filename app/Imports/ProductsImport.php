<?php

namespace App\Imports;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithCustomCsvSettings;
use Maatwebsite\Excel\Concerns\WithValidation;
use Illuminate\Support\Facades\DB;
use Exception;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class ProductsImport implements ToCollection, WithCustomCsvSettings, WithValidation
{
    /**
     * Настройки особенностей CSV файла
     */
    public function getCsvSettings(): array
    {
        return [
            'delimiter' => ";",
            'enclosure' => "'",
        ];
    }

    /**
     * Название колонок
     * @return array
     */
    public function customValidationAttributes()
    {
        return [
            '0' => 'Артикул',
            '1' => 'Назва',
            '2' => 'Ціна для ділера',
            '3' => 'Відсоток знижки',
            '4' => 'Акційна ціна',
            '5' => 'Ціна',
            '6' => 'Підкатегорія',
            '7' => 'Колір',
            '8' => 'Розмір',
            '9' => 'Бренд',
            '10' => 'Матеріал',
            '11' => 'Матеріал шоломів',
            '12' => 'Напрямок',
            '13' => 'Напрямок шоломів',
            '14' => 'Стать',
            '15' => 'Сезонність',
            '16' => 'Категорія аксесуарів',
            '17' => 'Категорія захисту',
            '18' => 'Категорія багажні аксесуари',
            '19' => 'Категорія для тюнінга',
            '20' => 'Категорія для запчастин',
            '21' => 'Опис',
            '22' => 'Характеристика',
            '23' => 'Наявність',
            '24' => 'Код категорії',
            '25' => 'Код підкатегорії',
            '26' => 'Кількість',
        ];
    }

    /**
     * Приватная функция - парсер массива
     */
    private function array_parse(String $cell = null)
    {
        if ($cell) {
            $arr = array_map('trim', explode(',', $cell));
            $arr = array_filter($arr, function($item) {
                return !empty($item);
            });
            return $arr;
        };
        return [];
    }

    /**
     * Приватная функция - парсер описания
     */
    private function definition_parse(String $cell = null)
    {
        if ($cell) {
            return array_map('trim', explode('_', $cell));
        };
        return [];
    }

    /**
     * Подготовка перед валидацией
    */
    public function prepareForValidation($data, $index)
    {
        $data[7] = $this->array_parse($data[7]); //цвет
        $data[8] = $this->array_parse($data[8]); //размер
        $data[10] = $this->array_parse($data[10]); //материал
        $data[11] = $this->array_parse($data[11]); //материал шлема
        $data[12] = $this->array_parse($data[12]); //направление
        $data[13] = $this->array_parse($data[13]); //направление шлема
        $data[14] = $this->array_parse($data[14]); //пол
        $data[15] = $this->array_parse($data[15]); //сезонность
        //$data[21] = $this->definition_parse($data[21]); //описание
        //$data[22] = $this->definition_parse($data[22]); //характеристика
        $data[23] = boolval($data[23]);
        //категория
        if (filter_var($data[24], FILTER_SANITIZE_NUMBER_INT) !== '') {
            $data[24] = filter_var($data[24], FILTER_SANITIZE_NUMBER_INT);
        } else {
            $data[24] = null;
        };
        //подкатегория
        if (filter_var($data[25], FILTER_SANITIZE_NUMBER_INT) !== '') {
            $data[25] = filter_var($data[25], FILTER_SANITIZE_NUMBER_INT);
        } else {
            $data[25] = null;
        };
        return $data;
    }

    /**
     * Правила валидации данных
     */
    public function rules(): array
    {
        //Все категории
        //$categories = Category::pluck('name');
        $categories_codes = Category::pluck('import_code')->filter(); // filter() без параметров убивает null values items
        $brands = Brand::pluck('name');
        return [
            '0' => 'required', //артикуль
            '1' => 'required|string', //название
            '2' => 'required|numeric|max:999999.99', //цена для диллера
            '3' => 'required|numeric|max:99.99', //% скидки
            '4' => 'required|numeric|max:999999.99', //акционная цена
            '5' => 'required|numeric|max:999999.99', //цена
            //'6' => 'required|string|in:'.$categories, //подкатегория
            '7' => 'nullable|array', //цвет
            '8' => 'nullable|array', //размер
            '9' => ['required', Rule::in($brands)], //бренд
            '10' => 'nullable|array', //материал
            '11' => 'nullable|array', //материал шлемов
            '12' => 'nullable|array', //направление
            '13' => 'nullable|array', //направление шлемов
            '14' => 'nullable|array', //пол
            '15' => 'nullable|array', //сезонность
            //'16' => 'nullable|string|in:'.$categories, //подкатегория аксесуаров
            //'17' => 'nullable|string|in:'.$categories, //Подкатегория защиты
            //'18' => 'nullable|string|in:'.$categories, //Подкатегориябагажные аксесуары
            //'19' => 'nullable|string|in:'.$categories, //Подкатегория тюнинг
            //'20' => 'nullable|string|in:'.$categories, //Подкатегория запчасти
            //'21' => 'nullable|array', //Описание
            //'22' => 'nullable|array', //Характеристика
            '23' => 'required|boolean', //Наличие
            '24' => ['nullable', Rule::in($categories_codes)], //Код категории
            '25' => ['nullable', Rule::in($categories_codes)], //Код подкатегории
            '26' => 'required|numeric|integer', //Кількість товара
        ];
    }

    /**
    * Импорт
    *
    */
    public function collection(Collection $rows)
    {
        //Результаты
        $result = [
            'created' => 0,
            'updated' => 0,
            'deleted' => 0,
        ];
        //Старт транзакции
        DB::beginTransaction();
        try {
            foreach ($rows as $row) {
                $product = Product::where('article', $row[0])->first();
                //Подготовка данных
                $importing_product = [
                    'article' => $row[0],
                    'name' => $row[1],
                    'slug' => Str::slug($row[1]),
                    //'details' => implode(PHP_EOL, $row[21]),
                    'price' => $row[5],
                    'dealer_price' => $row[2]/10,
                    'discount' => $row[3],
                    'promotion_price' => $row[4],
                    'quantity' => $row[26],
                    'color' => $row[7],
                    'size' => $row[8],
                    'material' => array_merge($row[10], $row[11]),
                    'direction' => array_merge($row[12], $row[13]),
                    'sex' => $row[14],
                    'season' => $row[15],
                    'is_active' => true,
                    'brand_id' => Brand::where('name', $row[9])->first()->id,
                ];
                //$categoryIds = Category::whereIn('name', [$row[6], $row[16], $row[17], $row[18], $row[19], $row[20]])->get('id')->pluck('id');
                $categoryIds = Category::where('import_code', $row[24])->orWhere('import_code', $row[25])->get('id')->pluck('id');
                //если товар найден в базе
                if (isset($product)) {
                    // if ($row[23] == false) {
                    //     //Удаляем картинки товара
                    //     //$product->deleteImages();
                    //     //Удаляем Товар
                    //     //$product->delete();
                    //     //$result['deleted']++;
                    //     $product->quantity = 0;
                    // } else {
                        $product->update($importing_product);
                        $product->categories()->sync($categoryIds);
                        $result['updated']++;
                    // }
                // если товар не найден в базе
                } else {
                    // if (/*$row[23] ==*/ true ) {
                        $createdProduct = Product::create($importing_product);
                        $createdProduct->categories()->attach($categoryIds);
                        $result['created']++;
                    // }
                }
            }
            // Успешное завершение транзакции
            DB::commit();
            Session::flash('import-success', $result);
        } catch (Exception $e) {
                // Откат транзакции при ошибке
                DB::rollback();
                Session::flash('import-error', $result);
        };
    }
}
