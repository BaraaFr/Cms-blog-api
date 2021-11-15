@extends('layouts.app')

@section('content')
<div class="container">
    
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class='col-md-2'>
                            {{ __('Gallery List') }}
                        </div>
                        <div class="col-md-3 offset-md-7">
                        <a href="{{route('galleries.create')}}" class='btn btn-sm btn-outline-success'>Add Gallery</a>
                        </div>
                    </div>  
                </div>

                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                            <td scope='col'width='60'>#</td>
                            <td scope='col'width='200'>Username</td>
                            <td scope='col'width='129'>Image</td>
                            <td scope='col'>Created_at</td>
                            <th scope="col" width=200 >Action</th>  
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($galleries as $gallery)
                            <tr>
                                <td scope='col' >{{$gallery->id}}</td>
                                <td scope='col' >{{$gallery->user->name}}</td>
                                <td scope='col'>{{asset('storage/galleries/' . $gallery->img_url)}}</td>
                                <td scope='col'>{{date(' M, h:i a',strtotime($gallery->created_at))}}</td>

                                <td>
                                    <div class='row'>
                                        <div class="col-sm-2 m-1">
                                        <a href="{{route('galleries.edit',$gallery->id)}}"  class="btn btn-sm btn-primary">Edit</a>
                                        </div> 
                                        <div class="col-sm-3 m-1">
                                        <form action="{{route('galleries.destroy',$gallery->id)}}" method="POST">
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