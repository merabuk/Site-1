<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

use App\Http\Controllers\Frontend\CartController;
use Illuminate\Http\JsonResponse;
use App\Models\Cart;
use App\Rules\IsAdmin;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * The user has been authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    protected function authenticated(Request $request)
    {
        //Если запрос пришел через AJAX (AXIOS)
        if ($request->ajax()) {

            $user = auth()->user();
            //имя авторизированного пользователя
            $name = $user->name;
            //логин(мыло) авторизированного пользователя
            $email =  $user->email;
            //проверка существует ли в сессии набитая корзина при логине чтобы не затереть ее из БД
            $sessionUserCart = $request->session()->get('user_cart');
            if (!$sessionUserCart) {
                //если в сессии корзины нет
                if ($user->has('cart')) {
                    //получаем корзину пользователя из базы
                    $cart = $user->cart;
                    //запись в сессию корзины
                    if (isset($cart)) {
                        $cart = json_decode($cart->user_cart, true);
                        $request->session()->put('user_cart', $cart);
                    };
                };
            };
            //запись в сессию логина, имени
            session(['useremail' => $email, 'username' => $name]);

            if ($user->hasRole('superadmin', 'admin', 'manager')) {
                $url = route('home');
                return response(['user' => $user, 'url' => $url], 200);
            } else if ($user->hasRole('buyer', 'dealer')) {
                $url = route('admin-personal', $user);
                return response(['user' => $user, 'url' => $url], 200);
            };
        }
    }

    /**
     * Метод скопирован из AuthenticatesUsers, чтобы "переписать" под сохранение корзины покупателя из сессии в БД
     * Log the user out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    public function logout(Request $request)
    {
        //вызываем контроллер корзины
        $cart_class = new CartController();
        //обновляем корзину
    	$cart = $cart_class->updateCart($request);
        //если она существует пишем в базу
        if (isset($cart)) {
            //если запись корзины уже была
            $dbRowCartUser = Cart::where('user_id', auth()->user()->id)->first();
            if (isset($dbRowCartUser)) {
                $dbRowCartUser->update([
                    'user_id' => auth()->user()->id,
                    'user_cart' => json_encode($cart),
                ]);
            } else {
                Cart::create([
                    'user_id' => auth()->user()->id,
                    'user_cart' => json_encode($cart),
                ]);
            }
        };

        $this->guard()->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        if ($response = $this->loggedOut($request)) {
            return $response;
        }

        return $request->wantsJson()
            ? new JsonResponse([], 204)
            : redirect('/');
    }

    /**
     * Handle a login request to the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Http\JsonResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function loginUser(Request $request)
    {
        $this->validateLoginUser($request);

        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.
        if (method_exists($this, 'hasTooManyLoginAttempts') &&
            $this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        if ($this->attemptLogin($request)) {
            return $this->sendLoginResponse($request);
        }

        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
        $this->incrementLoginAttempts($request);

        return $this->sendFailedLoginResponse($request);
    }

    /**
     * Validate the user login request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    protected function validateLoginUser(Request $request)
    {
        $request->validate([
            $this->username() => ['required', 'string', new IsAdmin],
            'password' => 'required|string',
        ]);
    }

    /**
     * Get the login username to be used by the controller.
     *
     * @return string
     */
    public function username()
    {
        return 'email';
    }
}
