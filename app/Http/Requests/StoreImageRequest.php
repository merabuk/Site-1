<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreImageRequest extends FormRequest
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
            'images' => 'Зображення',
            'order' => 'Порядковий номер',
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
            //'id' => 'nullable|integer',
            'path' => 'nullable|string',
            'order' => 'nullable|integer',
            'imageable_type' => 'required|string',
            'imageable_id' => 'required|integer',
        ];
    }
}
