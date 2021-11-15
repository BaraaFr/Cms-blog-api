@extends('website.template.master')
@section('content')
        <!-- Page Header-->
        <header class="masthead" style="background-image: url({{ asset('website/assets/img/home-bg.jpg')}})">
            <div class="container position-relative px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <div class="site-heading">
                            <h1>Clean Blog</h1>
                            <span class="subheading">A Blog Theme by Start Bootstrap</span>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Main Content-->
        <div class="container">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-8 col-lg-8 col-xl-7">
                    <!-- Post preview-->
                    @foreach($posts as $post)
                    <div class="post-preview">
                        <a href={{url('post/'.$post->slug)}}>
                            <h2 class="post-title">{{$post->title}}</h2>
                        </a>
                        <p class="post-meta">
                            Posted by
                            <a href="#!">{{$post->user->name}}</a>
                            on {{date('Y, M, d h:i',strtotime($post->created_at))}}
                            <span class="post-category">Category:<strong>{{$post->category->name}}</strong></span>
                        </p>
                    </div>
                    <!-- Divider-->
                    <hr class="my-4" />
                    @endforeach
                    <!-- Pager-->
                    <div class="d-flex justify-content-end mb-4">
                           {{$posts->links()}}  
                    </div>   
                </div>
                
                <div class="col-md-4 mol-lg-4 offset-md-1">
                    <div class="category">
                        <h2 class='category-title'>Category</h2>
                        <ul class='category-list'>
                            @if(!empty($categories))
                                @foreach($categories as $category)
                                <li><a href="category/{{$category->id}}" class="btn btn-category">{{$category->name}}</a></li>
                                @endforeach
                            @else
                                <div class='category-title'>
                                    <strong>No Category Available</strong>   
                                </div>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
@endsection