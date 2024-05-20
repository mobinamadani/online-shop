<?php

namespace App\Http\Controllers;

use App\Events\ProductCreatedEvent;
use App\Http\Requests\LogStoreRequest;
use App\Http\Requests\Products\ProductStoreRequest;
use App\Models\Category;
use App\Models\Log;
use App\Models\Product;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index()
    {
//        $products = Product::all();

//        return view('product-index', compact('products'));

//        return view('fruitkha.products', compact('products'));

//        caching the products

        if(!Cache::has('products'))
        {
            Cache::remember('products', 1 * 60, function () {

                return Product::all();
            });
        }

        $products = Cache::get('products');

        return view('bizNews.products.index', compact('products'));
    }

    public function show(int $id)
    {
        $product = Product::findOrFail($id);

        // $product = Product::find($id);

        // if(is_null($product))
        // {
        //     abort('404');
        // }

        // $product = Product::query()->findOrFail($id);

        return view('fruitkha.single-product', compact('product'));
    }

    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();

        return view('bizNews.products.create', compact('categories', 'tags'));
    }


    public function store(ProductStoreRequest $request)
    {
        try {
            DB::beginTransaction();

            $product = Product::query()
                ->create($request->only(['name', 'cost', 'count', 'description', 'category_id']));

            /**
             *  @var Product $product
             */
            $product->tags()->attach($request->get('tags'));

            cache()->delete('products');

            //dispatching or firing the event
//            ProductCreatedEvent::dispatch($product, $request);

            DB::commit();

        }catch(\Throwable $exception)
        {
            DB::rollBack();

//            dd($exception->getFile(), $exception->getLine(), $exception->getMessage());

            return redirect()->back()->withErrors(['Your transaction failed']);
        }

        return redirect(route('products.index'));
    }
}
