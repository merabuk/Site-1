<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\General\CollectionHelper;
use App\Models\User;
use App\Models\Order;
use App\Http\Requests\Frontend\UpdateBuyerRequest;
use Illuminate\Support\Facades\Hash;
use App\Notifications\UserPasswordUpdated;

class UserController extends Controller
{
    public function show(User $user, Request $request)
    {
        //запрет просмотра других профилей
        // abort_if($user->id !== auth()->user()->id, 404);
        $this->authorize('view', $user);//если условия не выполняются кидает на страницу 403 Запрещено

        //заказы покупателя
        $orders = Order::where('user_id', $user->id)->with('orders_products', 'products')->get();

        $favorites = $user->products()->get();

        //Сортировка
        $favorites = $favorites->when($request['sort'], function ($favorites) use ($request) {
            switch ($request['sort']) {
                case 'pop':
                    return $favorites->sortByDesc('views');
                    break;
                case 'up':
                    return $favorites->sortBy('price');
                    break;
                case 'dwn':
                    return $favorites->sortByDesc('price');
                    break;
                case 'promo':
                    return $favorites->sortBy('on_sale');
                    break;
                default:
                    return $favorites->sortByDesc('created_at');
                    break;
            }
        });
        $favorites = $favorites->unless($request['sort'], function ($favorites) {
            return $favorites->sortByDesc('created_at');
        });

        //Пагинация
        if ($request->has('count') && filter_var($request['count'], FILTER_VALIDATE_INT) == true) {
            $favorites = CollectionHelper::paginate($favorites, $request['count'])->withQueryString()->fragment('favorite-tab');
        } else {
            $favorites = CollectionHelper::paginate($favorites, 8)->withQueryString()->fragment('favorite-tab');
        }

        return view('frontend.admin-personal', compact('user', 'favorites', 'orders'));
    }

    public function update(UpdateBuyerRequest $request, User $user)
    {
        $validatedRequest = $request->validated();
        if (isset($validatedRequest['old-password']) && isset($validatedRequest['new-password'])) {
            //сохраняем незахешированный пароль
            $notHashPassword = $validatedRequest['new-password'];
            $validatedRequest['password'] = Hash::make($validatedRequest['new-password']);
        } else {
            unset($validatedRequest['password']);
        }
        $user->update($validatedRequest);
        //если пароль изменился
        if (isset($notHashPassword)) {
            //отправляеем письмо пользователю с логином и паролем
            $user->notify(new UserPasswordUpdated($user, $notHashPassword));
        }
        return redirect()->route('admin-personal', $user)->with('alert-success', 'Ваші данні успішно відредаговано');
    }
}
