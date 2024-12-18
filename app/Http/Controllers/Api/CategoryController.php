<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\CategoryStoreRequest;
use App\Http\Requests\Api\CategoryUpdateRequest;
use App\Http\Resources\Client\CategoryResource;
use App\Models\Category;
use App\Utility\ResponseGenerator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Symfony\Component\HttpFoundation\Response;

class CategoryController extends Controller
{
    public function index()
    {
//       if(!Cache::has('categories')){
//           Cache::remember('categories', 1 * 60, function () {
//               return  Category::all();
//           });
//       }

        return ResponseGenerator::list(
                CategoryResource::collection(
                category::query()->paginate(perPage: 5, page: request()->get('page', 1)))
        );

    }

    public function store(CategoryStoreRequest $request)
    {
        Category::query()->create($request->validated());

        Cache::delete('categories');

        return response(['message' => 'Category created successfully.']);
    }

    public function update(CategoryUpdateRequest $request, $id)
    {
        $category = Category::query()->findOrFail($id);
        $category->update($request->validated());

        Cache::delete('categories');

        return response(['message' => 'Category updated successfully.']);
    }

    public function destroy(Category $category, $id)
    {
        $category = category::query()->findOrFail($id);
        $category->delete();

        Cache::delete('categories');

        return response(['message'=>'Category deleted successfully.']);
    }

}
