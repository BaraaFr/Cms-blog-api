@extends('layouts.app')

@section('content')
        <!-- Main Content-->
        <style>
            .code-message{
                font-size:0.9rem;
                color:darkgray;
            }
        </style>
        <main class="mb-4">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <div class="my-5">
                            <form action="{{route('wall.submit')}}" method="POST">
                                @csrf
                                <p class="code-message">Enter the registration code</p>
                                <div class="form-floating">    
                                    <input class="form-control @error('code') is-invalid @enderror" id="inputName" name='code' type="password" placeholder="Enter the registration code..." />
                                    <label for="inputName">Registeration Code </label>

                                {{-- @error('code')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror --}}
                                </div>
                                <br />
                               <button class="btn btn-success text-uppercase" type="submit">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </main>

@endsection