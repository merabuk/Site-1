<?php

namespace App\Http\Controllers\Frontend\API;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class LoggedController extends Controller
{
    //Проверка залогиненного пользователя
    public function getStatusDataUser()
    {
        $user = auth()->user();
        $switchDisable = Auth::check();
        if ($user->hasRole('superadmin', 'admin', 'manager')) {
            $url = route('home');
            return response(['user' => $user, 'url' => $url, 'switchDisable' => $switchDisable], 200);
        } else if ($user->hasRole('buyer', 'dealer')) {
            $url = route('admin-personal', $user);
            return response(['user' => $user, 'url' => $url, 'switchDisable' => $switchDisable], 200);
        }
    }
}
