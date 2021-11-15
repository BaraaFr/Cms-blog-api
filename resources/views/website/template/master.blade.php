<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Blog</title>
        <link rel="icon" type="image/x-icon" href="{{ asset('website/assets/icon.png') }}" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v5.15.3/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{ asset('website/css/styles.css') }}" rel="stylesheet" />

        <style>
            .ck.ck-editor__editable_inline {
                overflow:200px !important;
            }
            .btn-category{
                border:0.1px solid grey;
                border-radius:12px;
                padding:6px 18px;
            }
            .btn-category:hover{
                background-color:rgb(0, 125, 151) ;
                color:white;
                border:rgb(0, 126, 151) ;
                width:10.5rem;
                
            }
            .category-list{
                padding:0;
                margin:0;
            }
            .category-list li{
                list-style:none;
                padding-top:1rem;
                margin-left:5rem;
            }
            .category-title{
                margin-top:30px;
                margin-left:5rem;
                margin-bottom:10px;
            }
            .post-categpry a{
                text-decoration:none;
            }
        </style>
    </head>
    <body>
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light" id="mainNav">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="/">{{_('CMS_Blog')}}</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto py-4 py-lg-0">
                       <?php
                       $pages=\App\Post::where(['post_type'=>'page'])->where(['is_published'=>'1'])->get();
                       
                       ?>
                        @foreach ($pages as $page)
                            <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="{{url('page/'.$page->slug)}}">{{$page->title}}</a></li>
                        @endforeach
                        <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="{{route('contact.form')}}">Contact</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        @yield('content')

        
        <!-- Footer-->
        <footer class="border-top">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <ul class="list-inline text-center">
                            <li class="list-inline-item">
                                <a href="#!">
                                    <span class="fa-stack fa-lg">
                                        <i class="fas fa-circle fa-stack-2x"></i>
                                        <i class="fab fa-twitter fa-stack-1x fa-inverse"></i>
                                    </span>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#!">
                                    <span class="fa-stack fa-lg">
                                        <i class="fas fa-circle fa-stack-2x"></i>
                                        <i class="fab fa-facebook-f fa-stack-1x fa-inverse"></i>
                                    </span>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#!">
                                    <span class="fa-stack fa-lg">
                                        <i class="fas fa-circle fa-stack-2x"></i>
                                        <i class="fab fa-github fa-stack-1x fa-inverse"></i>
                                    </span>
                                </a>
                            </li>
                        </ul>
                        <div class="small text-center text-muted fst-italic"> CopyRights&copy; -- All Rights Reserved®️ --2021</div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="{{ asset('website/js/scripts.js') }}"></script>
    </body>
</html>
