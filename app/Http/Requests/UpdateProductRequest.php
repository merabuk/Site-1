<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Prepare request data before validation
     */
    protected function prepareForValidation()
    {
        $isActive =  ($this->has('is_active')) ? true : false;
        $isNew =  ($this->has('is_new')) ? true : false;
        $onSale =  ($this->has('on_sale')) ? true : false;
        $this->merge([
            'is_active' => $isActive,
            'is_new' => $isNew,
            'on_sale' => $onSale,
        ]);

        $options = ['color', 'size', 'material', 'direction', 'sex', 'season'];
        foreach ($options as $key => $option) {
            if ($this->missing($option)) {
                $this->merge([ $option => [] ]);
            };
        };
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'article' => 'Код товару',
            'name' => 'Назва товару',
            'details' => 'Опис товара',
            'brand_id' => 'Бренд товара',
            'category_id' => 'Категорії товара',
            'keywords' => 'SEO Ключові слова',
            'description' => 'SEO Опис',
            'is_active' => 'Відображати',
            'price' => 'Ціна товару',
            'dealer_price' => 'Ціна товару для ділера',
            'discount' => 'Відсоток знижки ціни товару',
            'discount_from' => 'Дата початку дії знижки на товар',
            'discount_until' => 'Дата завершення дії знижки на товар',
            'promotion_price' => 'Акційна ціна',
            'promotion_from' => 'Дата початку дії акції на товар',
            'promotion_until' => 'Дата завершення дії акції на товар',
            'is_new' => 'Товар-новинка',
            'on_sale' => 'Розпродаж товару',
            'quantity' => 'Кількість товару на складі',
            'color' => 'Колір товара',
            'color.*' => 'Колір товара',
            'size' => 'Розмір товара',
            'size.*' => 'Розмір товара',
            'material' => 'Матеріал товара',
            'material.*' => 'Матеріал товара',
            'direction' => 'Напрямок товара',
            'direction.*' => 'Напрямок товара',
            'sex' => 'Товар для статі',
            'sex.*' => 'Товар для статі',
            'season' => 'Сезонність товара',
            'season.*' => 'Сезонність товара',
            'length' => 'Довжина товару',
            'width' => 'Ширина товару',
            'height' => 'Висота товару',
            'dim_unit' => 'Одиниці виміру габаритів товару',
            'weight' => 'Маса товару',
            'weight_unit' => 'Одиниці виміру маси товару',

            'video-name.*' => 'Назва відео',
            'video-src.*' => 'Ссилка на відео',
            'video-order.*' => 'Порядковий номер відео',
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'article' => 'required|max:50|unique:products,article,'.$this->product->id,
            'name' => 'required|max:255',
            'details' => 'max:5000',
            'brand_id' => 'required',
            'category_id' => 'required',
            'keywords' => 'nullable|max:150',
            'description' => 'nullable|max:250',
            'is_active' => 'required|boolean',
            'price' => 'required|numeric|max:999999.99',
            'dealer_price' => 'required|numeric|max:999999.99',
            'discount' => 'nullable|numeric|max:99.99',
            'discount_from' => 'nullable|date|before:discount_until',
            'discount_until' => 'nullable|date|after:discount_from',
            'promotion_price' => 'nullable|numeric|max:999999.99',
            'promotion_from' => 'nullable|date|before:promotion_until',
            'promotion_until' => 'nullable|date|after:promotion_from',
            'is_new' => 'required|boolean',
            'on_sale' => 'required|boolean',
            'quantity' => 'required|integer',
            'color' => 'nullable|array',
            'color.*' => 'distinct',
            'size' => 'nullable|array',
            'size.*' => 'distinct',
            'material' => 'nullable|array',
            'material.*' => 'distinct',
            'direction' => 'nullable|array',
            'direction.*' => 'distinct',
            'sex' => 'nullable|array',
            'sex.*' => 'distinct',
            'season' => 'nullable|array',
            'season.*' => 'distinct',
            'length' => 'nullable|integer',
            'width' => 'nullable|integer',
            'height' => 'nullable|integer',
            'dim_unit' => 'nullable|string',
            'weight' => 'nullable|integer',
            'weight_unit' => 'nullable|string',

            'video-name.*' => 'nullable|max:255',
            'video-src.*' => 'nullable|max:255',
            'video-order.*' => 'nullable|integer',
        ];
    }
}
