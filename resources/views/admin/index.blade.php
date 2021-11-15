@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mt-3">
                <div class="card-header">{{ __('Latest Categories') }}</div>

                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                            <td scope='col' width=60>#</td>
                            <td scope='col' width=60>Name</td>
                            <td scope='col' width=160>Created By</td>  
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($categories as $category)
                            <tr>
                                <td scope='col' width=60>{{$category->id}}</td>
                                <td scope='col' width=60>{{$category->name}}</td>
                                <td scope='col' width=160>{{$category->user->name}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card mt-3">
                <div class="card-header">{{ __('Latest Posts') }}</div>

                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                            <td scope='col' width=60>#</td>
                            <td scope='col' width=160>Name</td>
                            <td scope='col' width=60>Created By</td>  
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($posts as $post)
                            <tr>
                                <td scope='col' width=60>{{$post->id}}</td>
                                <td scope='col' width=160>{{$post->title}}</td>
                                <td scope='col' width=60>{{$post->user->name}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card mt-3">
                <div class="card-header">{{ __('Latest Pages') }}</div>

                <div class="card-body">
                    <table class="table table-striped ">
                        <thead>
                            <tr>
                            <td scope='col' width=60>#</td>
                            <td scope='col' width=60>Name</td>
                            <td scope='col' width=160>Created By</td>  
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($pages as $page)
                            <tr>
                                <td scope='col' width=60>{{$page->id}}</td>
                                <td scope='col' width=160>{{$page->title}}</td>
                                <td scope='col' width=60>{{$page->user->name}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
