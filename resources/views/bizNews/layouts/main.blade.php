@include('bizNews.partials.header')

@include('bizNews.partials.topBar')

@include('bizNews.partials.navbar')

@yield('components')

<!-- News With Sidebar Start -->
<div class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                @yield('content')
            </div>

            <div class="col-lg-4">
                @include('bizNews.partials.sidebar')
            </div>
        </div>
    </div>
</div>
<!-- News With Sidebar End -->

@include('bizNews.partials.footer')
