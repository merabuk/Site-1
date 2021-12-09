<?php

namespace App\Http\Requests\Frontend;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBuyerRequest extends FormRequest
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
            'surname' => 'Прізвище',
            'name' => "Ім'я",
            'patronymic' => 'По батькові',
            'email' => 'E-Mail',
            'old-password' => 'Поточний пароль',
            'new-password' => 'Новий пароль',
            'confirm' => 'Підтвердження нового пароля',
            'phone' => 'Телефон',
            'city' => 'Місто',
            'address' => 'Адреса',
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
            'name' => 'required|min:3|max:100',
            'patronymic' => 'nullable|min:3|max:100',
            'email' => 'required|email|unique:users,email,'.$this->user->id,
            'old-password' => 'nullable|min:8|max:50|password',
            'new-password' => 'nullable|required_with:old-password|min:8|max:50|different:old-password',
            'confirm' => 'nullable|required_with_all:old-password, new-password|same:new-password',
            'phone' => ['nullable', 'regex:/\([0-9]{3}\)\s[0-9]{3}-[0-9]{2}-[0-9]{2}|\(_{3}\)\s_{3}-_{2}-_{2}/'],
            'city' => 'sometimes|max:50',
            'address' => 'sometimes|max:100',
        ];
    }
}
