@extends('website.template.master')

@section('content')
        <!-- Page Header-->
        <header class="masthead" style="background-image: url('website/assets/img/contact-bg.jpg')">
            <div class="container position-relative px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <div class="page-heading">
                            <h1>Contact Me</h1>
                            <span class="subheading">Have questions? I have answers.</span>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Main Content-->
        <main class="mb-4">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <p>Want to get in touch? Fill out the form below to send me a message and I will get back to you as soon as possible!</p>
                        @if(session('message'))
                            <div class="alert alert-success">
                                {{session('message')}}
                            </div>
                        @endif
                        <div class="my-5">
                            <form action="{{route('contact.submit')}}" method="POST">
                                @csrf
                                <div class="form-floating">
                                    <input class="form-control" id="inputName" type="text"name='name' placeholder="Enter your name..." />
                                    <label for="inputName">Name</label>
                                </div>
                                <div class="form-floating">
                                    <input class="form-control" id="inputEmail" type="email" name='email' placeholder="Enter your email..." />
                                    <label for="inputEmail">Email address</label>
                                </div>
                                <div class="form-floating">
                                    <input class="form-control" id="inputPhone" type="tel" name='tel' placeholder="Enter your phone number..." />
                                    <label for="inputPhone">Phone Number</label>
                                </div>
                                <div class="form-floating">
                                    <input class="form-control" id="inputName" type="text" name='reason' placeholder="About..." />
                                    <label for="inputName">Contact Reason</label>
                                </div>
                                <div class="form-floating">
                                    <textarea class="form-control" id="inputMessage" name='message' placeholder="Enter your message here..." style="height: 12rem"></textarea>
                                    <label for="inputMessage">Message</label>
                                </div>
                                <br />
                                <a href="/" class='btn btn-secondary'><i class="fa fa-arrow-left" aria-hidden="true"></i></a> 
                                <button class="btn btn-primary text-uppercase" type="submit">Send</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </main>

@endsection