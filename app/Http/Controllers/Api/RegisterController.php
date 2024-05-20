<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Jobs\UserRegisterJob;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function store(RegisterRequest $request): JsonResponse
    {
        $user = User::query()->create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password'=> bcrypt($request->get('password'))
        ]);

        //dispatching the job
        UserRegisterJob::dispatch($user);

        return response()->json(['message' => 'ok']);
    }
}
