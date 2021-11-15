@extends('layouts.app')

@section('content')
<div class="container">
    
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class='col-md-2'>
                            {{ __('Category List') }}
                        </div>
                        <div class="col-md-3 offset-md-7">
                            <a href="{{route('categories.create')}}" class='btn btn-sm btn-outline-success'>Add Category</a>
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
                            @foreach($categories as $category)
                            <tr>
                                <td scope='col'>{{$category->id}}</td>
                                <td scope='col'>{{$category->name}}</td>
                                <td scope='col'>{{$category->user->name}}</td>
                                <td>
                                    <div class='row'>
                                        <div class="col-sm-2 m-1">
                                        <a href="{{route('categories.edit',$category->id)}}"  class="btn btn-sm btn-primary">Edit</a>
                                        </div> 
                                        <div class="col-sm-3 m-1">
                                        <form action="{{route('categories.destroy',$category->id)}}" method="POST">
                                        {{csrf_field()}}
                                        {{method_field('DELETE')}}
                                        <button class="btn btn-sm btn-danger" type='submit'>Delete</button>
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
