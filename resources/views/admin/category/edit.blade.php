@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
     
        <div class="card">
            <div class="card-header">
                <div class="row">
                        {{ __('Edit Category') }}
                </div>
            </div>

            <div class="card-body">
            	{{Form::model($category, array('route' => array('categories.update', $category->id),'method'=>'PUT'))}}
                    <div class="mb-3 row">
                        <label for="thumbnail" class="col-sm-2 col-form-label">Thumbnail :</label>
                        <div class="col-sm-10">
                        <input type="thumbnail" name="thumbnail" class="form-control" value="{{ old('thumbnail', $category->thumbnail) }}" >
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="name" class="col-sm-2 col-form-label">Name :</label>
                        <div class="col-sm-10">
                        <input type="name" name="name" class="form-control"  placeholder="Category name"  value="{{ old('name', $category->name) }}">
                        </div>
                    </div>
                    @if(old('is_published', $category->is_published)==0)
                        <select class="form-select" name="is_published" aria-label="Default select example" value="{{ old('is_published', $category->is_published) }}">
                            <option value="0" selected>Draft</option>
                            <option value="1">Publish</option>
                        </select>
                    @else
                        <select class="form-select" name="is_published" aria-label="Default select example" value="{{ old('is_published', $category->is_published) }}">
                            <option value="0">Draft</option>
                            <option value="1" selected>Publish</option>
                        </select>
                    @endif
                    <div class="row">
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <button class="btn btn-outline-primary btn-sm mt-2" type="submit">Update</button>
                    </div>
                    </div>
            	{{Form::close()}}
            </div>
        </div>
        </div>
    </div>
</div>
@endsection