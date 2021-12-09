<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreFrontPageRequest extends FormRequest
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
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'title' => "Назва сторінки",
            'slug' => 'SEO-url сторінки',
            'keywords' => 'Ключові слова сторінки',
            'description' => 'Опис сторінки',
            'articles_arr' => 'ID статей',
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
            'title' => 'required|max:30',
            'slug' => 'required|max:30|unique:front_pages,slug',
            'keywords' => 'nullable|max:150',           
            'description' => 'nullable|max:250',
            'articles_arr' => 'nullable',
        ];
    }
}
