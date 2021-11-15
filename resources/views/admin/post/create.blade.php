@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
     
        <div class="card">
            <div class="card-header">
                <div class="row">
                        <h5>{{ __('Create Post') }}</h5>
                </div>
            </div>

            <div class="card-body">
            <form action="{{route('posts.store')}}" method="POST">
                @csrf
                <input type="hidden" name='post_type' value='post'>
                <div class="mb-3 row">
                    <label for="thumbnail" class="col-form-label">Thumbnail </label>
                    <div class=" row">
                      <input type="text" name="thumbnail" class="form-control ml-4" >
                    </div>
                  </div>
                <div class="mb-3 row">
                    <label for="title" class="col-form-label ">Title </label>
                    <div class=" row">
                      <input type="text" name="title" class=" form-control ml-4 " >
                    </div>
                  </div>

                    <div class="mb-3 row">
                      <label for="details" class="col-sm-2 col-form-label">Post Content</label>
                      <div class="row">
                          <div class="col-md-11 offset-sm-1">
                            <textarea class="form-control ml-4" name="details" id="details" style="height:300px;"></textarea>
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
                        <div class="col-sm-6">
                            <select class="form-select " name="is_published" aria-label="Default select example">
                            <option selected disabled>Post Publish</option>
                            <option value="0">Draft</option>
                            <option value="1">Publish</option>
                            </select>
                        </div>
                        <div class="col-sm-6 ">
                            <select class="form-select " name="category_id" aria-label="Default select example">
                            <option selected disabled>Post Category</option>
                            @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                            </select>
                        </div>
                    </div>
                
              
        
            </div>
        </div>
            <div class="card-footer">
                <div class="row" >
                  <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                       <button class="btn btn-success" type="submit">Create</button>
                  </form>
                    </div>
                </div>
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
