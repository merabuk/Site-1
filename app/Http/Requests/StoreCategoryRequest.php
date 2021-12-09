<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCategoryRequest extends FormRequest
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
            'name' => "Назва категорії",
            'slug' => 'SEO-url категорії',
            'import_code' => 'Код для імпорта',
            'category_id' => 'Батьківська категорія',
            'keywords' => 'SEO Ключові слова',
            'description' => 'SEO Опис',
            'is_active' => 'Відображати',
            'is_main' => 'Головне зображення',
            'images' => 'Зображення',
            'images.*' => 'Зображення',
            'order' => 'Порядковий номер',
            'details' => 'Опис категорії',
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
            'name' => 'required|max:100',
            'slug' => 'required|max:100|unique:categories,slug',
            'import_code' => 'nullable|numeric|integer|min:1|unique:categories,import_code',
            'category_id' => 'nullable',
            'keywords' => 'nullable|max:150',
            'description' => 'nullable|max:250',
            'details' => 'max:5000',
            'is_active' => 'required|boolean',
            //images data
            'images' => 'sometimes|array',
            'images.*' => 'nullable|image|max:2000',
            'order' => 'sometimes|array',
            'order.*' => 'nullable|integer',
            'is_main' => 'sometimes|array',
            'is_main.*' => 'nullable|boolean',
        ];
    }
}
