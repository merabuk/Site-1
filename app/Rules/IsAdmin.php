<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Models\User;

class IsAdmin implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $user = User::where('email', $value)->first();
        if (isset($user)) {
            if ($user->hasRole('superadmin', 'admin', 'manager')) {
                return false;
            } else if ($user->hasRole('buyer', 'dealer')) {
                return true;
            };
        };
        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return trans('validation.is-admin');
    }
}
