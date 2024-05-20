@extends('bizNews.layouts.main')

@section('components')

@include('bizNews.components.trending')

@endsection

@section('content')

<div class="section-title mb-0">
    <h4 class="m-0 text-uppercase font-weight-bold">Welcome To Our Website</h4>
</div>
<div class="bg-white border border-top-0 p-4 mb-3">

    <form action="{{ route('login.store') }}" method="POST">

    @csrf

        <div class="form-row">
            <div class="col-md-6">
                <div class="form-group">
                    <input id="email" type="email" class="form-control p-4" name="email" placeholder="mail@example.com"/>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <input id="password" type="password" class="form-control p-4" name="password" placeholder="Password">
                </div>
            </div>
        </div>
        <div>
            <button class="btn btn-primary font-weight-semi-bold px-4" style="height: 50px;"
                    type="submit">Login</button>
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
