<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function create(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('bizNews.register.create');
    }

    public function store(RegisterRequest $request): \Illuminate\Http\RedirectResponse
    {
        //validate data
        //encrypt the password
        //create user in database
        //login user
        //redirect

        /**
         * @var User $user
         */

        $user = User::query()->create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password'=> bcrypt($request->get('password'))
        ]);

        auth()->login($user);

        return to_route('home');
    }
}
