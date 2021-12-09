<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     * Проверка наличия роли у пользователя
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$roles)
    {
        if(!$request->user()->hasRole(...$roles)) {
            return redirect()->route('main')->with('alert-error', 'У Вас недостатьньо прав для переходу на цю сторінку');
        }

        /*if($permission !== null && !$request->user()->can($permission)) {
            return redirect()->route('main')->with('error', 'У Вас недостатьньо прав для переходу на цю сторінку');
        }*/
        return $next($request);
    }
}
