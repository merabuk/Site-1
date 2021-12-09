<?php

namespace App\Http\Requests\Frontend;

use Illuminate\Foundation\Http\FormRequest;

class StoreOrderRequest extends FormRequest
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
            'surname' => 'Ваше Прізвище',
            'name' => "Ваше ім'я",
            'patronymic' => 'По батькові',
            'email' => 'Ваш E-mail',
            'phone' => 'Ваш телефон',
            'password' => 'Пароль',
            'password_confirmation' => 'Підтвердження пароля',
            'city' => 'Місто',
            'address' => 'Адреса',
            'comment' => 'Комментар',
            'pikup' => 'Самовивіз',
            'captcha' => 'Captcha',
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
            'surname' => 'required|min:3|max:100',
            'name' => 'required|min:3|max:50',
            'patronymic' => 'nullable|min:3|max:100',
            'email' => 'required|min:3|max:50|email',
            'phone' => ['required', 'regex:/\([0-9]{3}\)\s[0-9]{3}-[0-9]{2}-[0-9]{2}|\(_{3}\)\s_{3}-_{2}-_{2}/'],
            'is_guest' => 'nullable|boolean',
            'password' => 'required_if:is_guest,==,null|string|min:8',
            'password_confirmation' => 'required_with:password|same:password',
            'city' => 'required_if:pikup,==,0|max:50',
            'address' => 'required_if:pikup,==,0|max:100',
            'comment' => 'nullable|max:250',
            'pikup' => 'nullable|boolean',
            'captcha' => 'required|captcha',
        ];
    }
}
