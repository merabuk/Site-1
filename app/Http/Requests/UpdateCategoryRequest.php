<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCategoryRequest extends FormRequest
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
            'parent_id' => 'Батьківська категорія',
            'keywords' => 'SEO Ключові слова',
            'description' => 'SEO Опис',
            'is_active' => 'Відображати',
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
            'slug' => 'required|max:100|unique:categories,slug,'.$this->category->id,
            'import_code' => 'nullable|numeric|integer|min:1|unique:categories,import_code,'.$this->category->id,
            'category_id' => 'nullable',
            'keywords' => 'nullable|max:150',
            'description' => 'nullable|max:250',
            'is_active' => 'required|boolean',
            'details' => 'max:5000',
        ];
    }
}
