@extends('layouts.app')

@section('content')
<div class="container">
    
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class='col-md-2'>
                            {{ __('Pages List') }}
                        </div>
                        <div class="col-sm-3 offset-md-7">
                            <a href="{{route('pages.create')}}" class='btn btn-sm btn-outline-success'>Add Page</a>
                        </div>
                    
                    
                    </div>
                </div>

                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                            <td scope='col'>#</td>
                            <td scope='col'>Name</td>
                            <td scope='col'>Created By</td>
                            <th scope="col">Action</th>  
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($pages as $page)
                            <tr>
                                <td scope='col'>{{$page->id}}</td>
                                <td scope='col'>{{$page->title}}</td>
                                <td scope='col'>{{$page->user->name}}</td>
                                <td>
                                    <div class='row'>
                                        <div class="col-sm-4">
                                        <a href="{{route('posts.edit',$page->id)}}"  class="btn btn-sm btn-primary" style='width:59px;'>Edit</a>
                                        
                                        
                                        <form action="{{route('posts.destroy',$page->id)}}" method="POST">
                                        {{csrf_field()}}
                                        {{method_field('DELETE')}}
                                        
                                        <button class="btn btn-sm btn-danger mt-1" type='submit' style='width:59px;'>Delete</button>
                                        </form>
                                        </div>
                                </div>
                                </td>
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