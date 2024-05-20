@extends('bizNews.layouts.main')

@section('components')

@include('bizNews.components.trending')

@endsection

@section('content')

<div class="section-title mb-0">
    <h4 class="m-0 text-uppercase font-weight-bold">Create New Product</h4>
</div>
<div class="bg-white border border-top-0 p-4 mb-3">

    <form id="productStore" action="{{ route('products.store') }}" method="POST">

    @csrf

        <div class="form-row">
            <div class="col-md-6">
                <div class="form-group">
                    <input id="name" type="text" class="form-control p-4" name="name" placeholder="Name"/>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <input id="cost" type="number" class="form-control p-4" name="cost" placeholder="Cost"/>
                </div>
            </div>
        </div>
        <div class="form-row">
            <div class="col-md-6">
                <div class="form-group">
                    <input id="count" type="number" class="form-control p-4" name="count" placeholder="Count">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <select name="category_id" class="form-control p-4" id="category_id">
                        <option value="" selected disabled>Select a category</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        <div class="form-group">
            <textarea id="description" class="form-control" rows="4" name=description placeholder="Description"></textarea>
        </div>

        <div class="form-group">
           <div>
               <label>Product Tags: </label>
           </div>
            @foreach($tags as $tag)
                <label class="p-2">
                    <input type="checkbox" name="tags[]" value="{{ $tag->id }}">
                    <label class="ml-2">{{ $tag->name }}</label>
                </label>
            @endforeach
        </div>

        <div>
            <button class="btn btn-primary font-weight-semi-bold px-4" style="height: 50px;"
                    type="submit">Create</button>
        </div>
    </form>
</div>

@if(count($errors->all()))
    @foreach($errors->all() as $error)

    <a href="" class="d-block w-100 text-white text-decoration-none mb-3" style="background: #DC472E;">
            <i class="fab fa-youtube text-center py-4 mr-3" style="width: 65px; background: rgba(0, 0, 0, .2);"></i>
            <span class="font-weight-medium">{{ $error }}</span>
    </a>

    @endforeach
@endif

@endsection
