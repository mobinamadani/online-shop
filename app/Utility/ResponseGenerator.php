<?php

namespace App\Utility;

use Symfony\Component\HttpFoundation\Response;

class ResponseGenerator
{
    public static function list($data)
    {
        response([
            'code'=> Response::HTTP_OK,
            'meta'=> [
                'current_page' => $data->resource->currentPage(),
                'per_page' => $data->resource->perPage(),
                'total' => $data->resource->total(),
                'path' => $data->resource->path(),
                'last_page' => $data->resource->lastPage(),
            ],
            'data'=> $data->resource->items(),
        ], response::HTTP_OK);
    }

    public static function item($data): \Illuminate\Foundation\Application|\Illuminate\Http\Response|\Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory
    {
        return response([
           'code'=> Response::HTTP_OK,
           'data'=> $data,
        ]
        ,response::HTTP_OK);
    }













}
