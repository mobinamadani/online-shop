@extends('bizNews.layouts.main')

@section('components')

    @include('bizNews.components.trending')

@endsection

@section('content')
    <div class="section-title mb-0">
        <h4 class="m-0 text-uppercase font-weight-bold">Log Users Action</h4>
    </div>
    <div class="bg-white border border-top-0 p-4 mb-3">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">User Name</th>
                <th scope="col">Model</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($logs as $log)
                <tr>
                    <th scope="row">{{ $log->id }}</th>
                    <td>{{ $log->user->name }}</td>
                    <td>{{ $log->model }}</td>
                    <td>{{ $log->action }}</td>
                </tr>
            @endforeach

            </tbody>
        </table>
    </div>


@endsection

