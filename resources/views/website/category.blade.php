@extends('website.template.master')
@section('content')

<header class="masthead" style="background-image: url({{ asset('website/assets/img/home-bg.jpg')}})">
    <div class="container position-relative px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="site-heading">
                    <h1>{{ucfirst($category->name)}}</h1> 
                    <span class="meta">
                        {{count($posts)}} {{count($posts)>1?'posts':'post'}}
                    </span>
                </div>
            </div>
        </div>
    </div>
</header>

<div class="container">
@if(count($posts)>0)
    @foreach($posts as $post)
    {{-- <div class="container px-4 px-lg-5"> --}}
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-8 col-lg-8 col-xl-7">

                <div class="post-preview">
                    <a href={{url('post/'.$post->slug)}}>
                        <h2 class="post-title">{{$post->title}}</h2>
                    </a>
                    <p class="post-meta">
                        Posted by: <strong>{{$post->user->name}}</strong><br>
                        <span class='category-time'>{{date('Y, M, d h:i a',strtotime($post->created_at))}}</span>
                    </p>
                </div>
                <hr class="my-4" />      
            </div>
        </div>
    {{-- </div> --}}
    @endforeach
@else  
    <div class="row">
        <div class="col-md-6 offset-md-5">
            <p text-align='center'>
                 <small><a href="/"><i class="fas fa-arrow-left    "></i></a> <strong>No Posts Under This Category</strong></small>
            </p>
        </div>
    </div>
@endif
    <div class="row">
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <strong>{{$posts->links()}}</strong>
        </div>
    </div>
</div>
@stop