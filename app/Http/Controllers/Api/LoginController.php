<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Resources\TokenResource;
use App\Models\User;
use App\Utility\ResponseGenerator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function store(LoginRequest $request): \Illuminate\Foundation\Application|\Illuminate\Http\Response|\Illuminate\Http\JsonResponse|\Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory
    {
        /**
         * @var User $user
         */
        $user = User::query()->where('email', $request->get('email'))->first();

        if(empty($user) || !Hash::check($request->get('password'), $user->password))
        {
            return response()->json(['message' => 'email or password is not correct']);
        }

        $token = $user->createToken('api-auth');

        return ResponseGenerator::item(
            TokenResource::make($token)
        );
    }

    public function destroy()
    {
        auth()->user()->tokens()->delete();

        return ResponseGenerator::success('logout successfully!');
    }
}
