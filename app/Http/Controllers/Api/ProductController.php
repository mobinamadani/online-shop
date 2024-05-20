<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Products\ProductStoreRequest;
use App\Http\Resources\Client\ProductResource;
use App\Models\Product;
use App\Utility\ResponseGenerator;
use Illuminate\Http\Request;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;

class ProductController extends Controller
{
    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function index(): \Illuminate\Foundation\Application|\Illuminate\Http\Response|\Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory
    {
        return ResponseGenerator::list(
            ProductResource::collection(
                Product::query()->paginate(perPage: 10, page: request()->get('page', 1))
            )
        );
    }

    public function store(ProductStoreRequest $request)
    {
        return Product::query()->create($request->all());
    }

    public function show(Product $product): \Illuminate\Foundation\Application|\Illuminate\Http\Response|\Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory
    {
        return ResponseGenerator::item(
            ProductResource::make($product)
        );
    }
}
