<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateFilterRequest extends FormRequest
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
        $this->merge([
            'is_active' => $isActive,
        ]);
    }


    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'name' => 'Назва фільтра',
            'category_id' => 'Категорії',
            'is_active' => 'Відображати',
            'brand' => 'Бренди',
            'price_from' => 'Найменша ціна',
            'price_until' => 'Найбільша ціна',
            'color' => 'Колір',
            'size' => 'Розмір',
            'material' => 'Матеріал',
            'direction' => 'Напрямок',
            'sex' => 'Стать',
            'season' => 'Сезонність',
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
            'name' => 'required|string|max:255|unique:filters,name,'.$this->filter->id,
            'category_id' => 'required|array',
            'is_active' => 'required|boolean',
            'brand' => 'nullable|array',
            'price_from' => 'nullable|numeric|max:999999|lt:price_until',
            'price_until' => 'nullable|numeric|max:999999|gt:price_from',
            'color' => 'nullable|array',
            'size' => 'nullable|array',
            'material' => 'nullable|array',
            'direction' => 'nullable|array',
            'sex' => 'nullable|array',
            'season' => 'nullable|array',
        ];
    }
}
