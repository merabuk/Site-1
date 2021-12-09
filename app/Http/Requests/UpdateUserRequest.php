<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
            'password' => 'Пароль',
            'confirm' => 'Підтвердження пароля',
            'role' => 'Роль',
            'manager_id' => 'Менеджер',
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
            'password' => 'nullable|min:8|max:50',
            'confirm' => 'required_with:password|same:password',
            'role' => 'sometimes|required',
            'manager_id' => 'nullable',
            'phone' => ['required', 'regex:/\([0-9]{3}\)\s[0-9]{3}-[0-9]{2}-[0-9]{2}|\(_{3}\)\s_{3}-_{2}-_{2}/'],
            'city' => 'nullable|max:50',
            'address' => 'nullable|max:100',
        ];
    }
}
