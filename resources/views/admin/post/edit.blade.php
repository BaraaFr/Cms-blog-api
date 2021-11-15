@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
     
        <div class="card">
            <div class="card-header">
                <div class="row">
                       <h5>{{ __('Edit Post') }}</h5> 
                </div>
            </div>

            <div class="card-body">
            	{{Form::model($post, array('route' => array('posts.update', $post->id),'method'=>'PUT'))}}
                <div class="mb-3 row">
                    <label for="thumbnail" class="col-form-label">Thumbnail </label>
                    <div class=" row">
                      <input type="text" name="thumbnail" class="form-control ml-4" >
                    </div>
                  </div>
                <div class="mb-3 row">
                    <label for="title" class="col-form-label ">Title </label>
                    <div class=" row">
                      <input type="text" name="title" class=" form-control ml-4 " value="{{old('title',$post->title)}}"">
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="details" class="col-sm-2 col-form-label">Post Content</label>
                    <div class="row">
                        <div class="col-md-11 offset-sm-1">
                            <textarea class="form-control ml-4" name="details" id="details" style="height:300px;">{{old('details',$post->details)}}</textarea>
                        </div>
                    </div>
                </div>
                    
                    <div class="mb-3 row">
                        <div class="col-md-6 mt-3">
                            <label for="is_published" class="form-label ml-2">Post Publish</label>
                        </div>
                        <div class="col-md-6 mt-2">
                            <label for="category_id" class="form-label ml-2" >Category</label>
                        </div>
                        
                    </div>
                    
                    <div class="mb-3 row">
                        @if(old('is_published', $post->is_published)==0)
                        <div class="col-sm-6">
                            <select class="form-select " name="is_published" aria-label="Default select example">
                            <option value="0" selected>Draft</option>
                            <option value="1">Publish</option>
                            </select>
                        </div>
                        @else
                        <div class="col-sm-6">
                            <select class="form-select " name="is_published" aria-label="Default select example">
                            <option value="0">Draft</option>
                            <option value="1" selected>Publish</option>
                            </select>
                        </div>
                        @endif
                        <div class="col-sm-6 ">
                            <select class="form-select " name="category_id" aria-label="Default select example">
                            <option selected disabled>{{old('category_id',$post->category->name)}}</option>
                            @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                            </select>
                        </div>
                    </div>        	
                </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <button class="btn btn-primary mt-2" type="submit">Update</button>
                                <a href="{{route('posts.index')}}" class="btn btn-secondary">Cancel</a>
                            </div>
                        </div>
                    </div>
            {{Form::close()}}
           </div>
        </div>
    </div>
</div>
@endsection
@section('javascript')
<script src="https://cdn.ckeditor.com/4.16.1/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace( 'details' );
</script>
@endsection