<?php

namespace App\Utility;


use Symfony\Component\HttpFoundation\Response;

class ResponseGenerator
{
    public static function list($data): \Illuminate\Foundation\Application|\Illuminate\Http\Response|\Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory
    {
        $resource = $data->resource;

        return response([
            'code' => Response::HTTP_OK,
            'meta' => [
                'currentPage' => method_exists($resource,'currentPage') ? $data->resource->currentPage() : null,
                'perPage' => method_exists($resource,'perPage') ? $data->resource->perPage() : null,
                'path' => method_exists($resource,'path') ? $data->resource->path() : null,
                'nextPage' => method_exists($resource,'nextPageUrl') ? $data->resource->nextPageUrl() : null,
                'lastPage' => method_exists($resource,'lastPage') ? $data->resource->lastPage() : null,
                'total' => method_exists($resource,'total') ? $data->resource->total() : null
            ],
            'data' =>  method_exists($resource,'items') ?$data->resource->items() : $data
        ], Response::HTTP_OK);
    }

    public static function item($data): \Illuminate\Foundation\Application|\Illuminate\Http\Response|\Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory
    {
        return response([
            'code' => Response::HTTP_OK,
            'data' => $data
        ], Response::HTTP_OK);
    }

    public static function success(string $message = 'OK'): \Illuminate\Foundation\Application|\Illuminate\Http\Response|\Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory
    {
        return response([
            'code' => Response::HTTP_OK,
            'message' => $message
        ], Response::HTTP_OK);
    }
}
