<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\CategoryStoreRequest;
use App\Http\Requests\Api\CategoryUpdateRequest;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use App\Utility\ResponseGenerator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class CategoryController extends Controller
{
    public function index()
    {
//        if(!Cache::has('categories'))
//        {
//            Cache::remember('categories', 30 * 60, function () {
//                return Category::all();
//            });
//        }
//
//        return Cache::get('categories');

        $categories = Category::all();

        return ResponseGenerator::list(CategoryResource::collection($categories));
    }

    public function store(CategoryStoreRequest $request)
    {
        Category::query()->create($request->validated());

//        Cache::delete('categories');

        return response(['message' => 'OK!'], 200);
    }

    public function update(CategoryUpdateRequest $request, Category $category)
    {
        $category->update($request->validated());

//        Cache::delete('categories');

        return response(['message' => 'OK!'], 200);
    }

    public function destroy(Category $category)
    {
        $category->delete();

//        Cache::delete('categories');

        return response(['message' => 'OK!'], 200);
    }

    public function show(Category $category)
    {
        return ResponseGenerator::item(CategoryResource::make($category));
    }
}
