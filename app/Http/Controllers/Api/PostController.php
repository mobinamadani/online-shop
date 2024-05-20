<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ThirdParties\PostStoreRequest;
use App\Http\Requests\ThirdParties\PostUpdateRequest;
use App\Http\Resources\ThirdParty\PostResource;
use App\Models\Log;
use App\Utility\ResponseGenerator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PostController extends Controller
{
    public function index(): \Illuminate\Foundation\Application|\Illuminate\Http\Response|\Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory
    {
        $response = Http::get('https://jsonplaceholder.typicode.com/posts');

//        dd($response->body());
//        dd($response->collect());
//        dd($response->json());

//        for sending authentication token with request
//        Http::withToken('')->get('https://jsonplaceholder.typicode.com/posts');

        return ResponseGenerator::list(
            PostResource::collection(collect($response->json()))
        );
    }

    /**
     * @throws \Exception
     */
    public function store(PostStoreRequest $request): \Illuminate\Foundation\Application|\Illuminate\Http\Response|\Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory
    {
        $response = Http::post('https://jsonplaceholder.typicode.com/posts', $request->validated());

//        Log::query()->create([
//            'user_id' => $request->user()->id,
//            'user_ip' => $request->ip(),
//            'user_agent' => $request->userAgent(),
//            'action' => 'create',
//            'model' => get_class($response),
//            'inputs' => $request->validated(),
//            'other' => $response->json(),
//            'status' => $response->status()
//        ]);

        if ($response->status() !== 200 || empty($response->json()['title']))
        {
            throw new \Exception();
        }

        return ResponseGenerator::item(
            PostResource::make($response->json())
        );
    }

    /**
     * @throws \Exception
     */
    public function update(PostUpdateRequest $request, int $id): \Illuminate\Foundation\Application|\Illuminate\Http\Response|\Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory
    {
        $response = Http::patch(
            "https://jsonplaceholder.typicode.com/posts/{$id}", $request->validated()
        );

        //log the request and response in logs table

        if($response->status() !== 200 || empty($response->json()['title']))
        {
            throw new \Exception();
        }

        return ResponseGenerator::item(
            PostResource::make($response->json())
        );
    }

    /**
     * @throws \Exception
     */
    public function destroy(int $id): \Illuminate\Foundation\Application|\Illuminate\Http\Response|\Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory
    {
        $response = Http::delete("https://jsonplaceholder.typicode.com/posts/{$id}");

        if ($response->status() !== 200)
        {
            throw new \Exception();
        }

        return ResponseGenerator::success('post deleted successfully!');
    }
}
