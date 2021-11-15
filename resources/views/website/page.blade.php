@extends('website.template.master')
@section('content')

        @foreach($pages as $page)

        <!-- Page Header-->
        <header class="masthead" style="background-image: url('{{asset('website/assets/img/post-bg.jpg')}}')">
            <div class="container position-relative px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <div class="post-heading">
                            <h1>{{$page->title}}</h1>
                            <span class="meta">
                                Posted by
                                <a href="#!">{{$page->user->name}}</a>
                                on {{date('Y, M, d h:i a',strtotime($page->created_at))}}
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <!-- Post Content-->
        <article class="mb-4">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        {!!$page->details!!}
                    </div>
                </div>
            </div>
        </article>
        @endforeach
@endsection