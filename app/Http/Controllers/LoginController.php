<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function create(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('bizNews.login.create');
    }

    public function store(LoginRequest $request): \Illuminate\Http\RedirectResponse
    {
        //find user with email
        //check if the password is correct
        //login user
        //redirect

        /**
         * @var User $user
         */
        $user = User::query()->where('email', $request->get('email'))->first();

        if(empty($user) || !Hash::check($request->get('password'), $user->password))
        {
            return back()->withErrors(['username or password is not valid!']);
        }

        auth()->login($user);

        return to_route('home');
    }

    public function destroy(Request $request): \Illuminate\Http\RedirectResponse
    {
        auth()->logout();

        return to_route('home');
    }
}
