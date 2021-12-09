<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateOrderRequest extends FormRequest
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
        $pikup =  ($this->has('pikup')) ? true : false;
        $this->merge([
            'pikup' => $pikup,
        ]);

        if ($this->missing('surname')) {
            $this->merge([
                'surname' => null,
            ]);
        };
        if ($this->missing('name')) {
            $this->merge([
                'name' => null,
            ]);
        };
        if ($this->missing('patronymic')) {
            $this->merge([
                'patronymic' => null,
            ]);
        };
        if ($this->missing('email')) {
            $this->merge([
                'email' => null,
            ]);
        };
        if ($this->missing('phone')) {
            $this->merge([
                'phone' => null,
            ]);
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
            'user_id' => 'Замовник',
            'surname' => 'Прізвище',
            'name' => "Ім'я",
            'patronymic' => 'По батькові',
            'email' => 'E-Mail',
            'phone' => 'Телефон',
            'city' => 'Місто',
            'address' => 'Адреса',
            'pikup' => 'Самовивіз',
            'manager_id' => 'Менеджер',
            'comment' => 'Коментар',
            'status_id' => 'Статус',
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
            'user_id' => 'required_if:name,null|nullable',
            'surname' => 'nullable|max:100',
            'name' => 'required_if:user_id,null|nullable|max:100',
            'patronymic' => 'nullable|max:100',
            'email' => 'nullable|email|unique:users,email',
            'phone' => ['required_if:user_id,null', 'nullable','regex:/\([0-9]{3}\)\s[0-9]{3}-[0-9]{2}-[0-9]{2}|\(_{3}\)\s_{3}-_{2}-_{2}/'],
            'city' => 'required_if:pikup,false||prohibited_if:pikup,true|nullable|string',
            'address' => 'required_if:pikup,false|prohibited_if:pikup,true|nullable|string',
            'pikup' => 'boolean',
            'manager_id' => 'nullable',
            'comment' => 'nullable|max:500',
            'status_id' => 'required',
        ];
    }
}
