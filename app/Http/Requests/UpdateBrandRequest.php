<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBrandRequest extends FormRequest
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
            'name' => "Назва бренду",
            'slug' => 'SEO-url бренду',
            'brand_order' => 'Порядковий номер бренду',
            'is_active' => 'Відображати',
            'keywords' => 'SEO Ключові слова',
            'description' => 'SEO опис',
            'title' => 'Заголовок бренду',
            'details' => 'Опис бренду',

            'is_main' => 'Головне зображення',
            'images' => 'Зображення',
            'order' => 'Порядковий номер',

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
            'name' => 'required|max:30',
            'slug' => 'required|max:30|unique:brands,slug,'.$this->brand->id,
            'brand_order' => 'nullable|integer',
            'is_active' => 'required|boolean',
            'keywords' => 'nullable|max:150',
            'description' => 'nullable|max:250',
            'title' => 'nullable|max:150',
            'details' => 'nullable|max:5000',

            'is_main.*' => 'nullable|boolean',
            'images.*' => 'image|max:2000',
            'order.*' => 'nullable|integer',

            'video-name.*' => 'nullable|max:255',
            'video-src.*' => 'nullable|max:255',
            'video-order.*' => 'nullable|integer',
        ];
    }
}
