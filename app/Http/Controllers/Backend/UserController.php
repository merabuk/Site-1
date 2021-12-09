<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Role;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Notifications\UserCreated;
use App\Notifications\UserPasswordUpdated;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        switch ($request->scope) {
            case '':
            case 'all':
                $users = User::get();
                $text = 'Всі користувачі';
                break;
            case 'admins':
                $users = User::withRole('admin');
                $text = 'Адміністратори';
                break;
            case 'managers':
                $users = User::withRole('manager');
                $text = 'Менеджери';
                break;
            case 'dealers':
                $users = User::withRole('dealer');
                $text = 'Ділери';
                break;
            case 'buyers':
                $users = User::withRole('buyer');
                $text = 'Покупці';
                break;
            default:
                abort(404);
                break;
        }
        return view('backend.users.index', compact('users', 'text'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::get();
        $managers = User::withRole('manager');
        return view('backend.users.create', compact('roles', 'managers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {
        $validatedRequest = $request->validated();
        //сохраняем незахешированный пароль
        $notHashPassword = $validatedRequest['password'];
        $validatedRequest['password'] = Hash::make($validatedRequest['password']);
        $validatedRequest['api_token'] = Str::random(60);
        $user = User::create($validatedRequest);
        $role = Role::roleIdFor($validatedRequest['role']);
        $user->roles()->detach();
        $user->roles()->attach($role);
        //отправляеем письмо пользователю с логином и паролем
        $user->notify(new UserCreated($user, $notHashPassword));
        return redirect()->route('users.index')->with('alert-success', 'Користувача успішно створено');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $roles = Role::get();
        $managers = User::withRole('manager');
        return view('backend.users.edit', compact('roles', 'user', 'managers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        $validatedRequest = $request->validated();
        if (isset($validatedRequest['password'])) {
            //сохраняем незахешированный пароль
            $notHashPassword = $validatedRequest['password'];
            $validatedRequest['password'] = Hash::make($validatedRequest['password']);
        } else {
            unset($validatedRequest['password']);
        }
        $user->update($validatedRequest);
        if (isset($validatedRequest['role'])) {
            $role = Role::roleIdFor($validatedRequest['role']);
            $user->roles()->detach();
            $user->roles()->attach($role);
        }
        //если пароль изменился
        if (isset($notHashPassword)) {
            //отправляеем письмо пользователю с логином и паролем
            $user->notify(new UserPasswordUpdated($user, $notHashPassword));
        }

        return redirect()->route('users.index')->with('alert-success', 'Користувача успішно відредаговано');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, User $user)
    {
        $user->delete();
        if ($request->ajax()) {
            return response('deleted');
        }
        return redirect()->back();
    }
}
