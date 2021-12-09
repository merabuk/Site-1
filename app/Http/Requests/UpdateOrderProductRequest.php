<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateOrderProductRequest extends FormRequest
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
            'product_id' => 'Продукт',
            'count' => 'Кількість',
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
            'product_id' => 'required',
            'count' => 'required|min:1|integer',
            'color' => 'nullable|string',
            'size' => 'nullable|string',
            'material' => 'nullable|string',
            'direction' => 'nullable|string',
            'sex' => 'nullable|string',
            'season' => 'nullable|string',
        ];
    }
}
