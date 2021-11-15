@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
     
        <div class="card">
            <div class="card-header">
                <div class="row">
                        {{ __('Create Category') }}
                </div>
            </div>

            <div class="card-body">
            <form action="{{route('categories.store')}}" method="POST">
                @csrf
                <div class="mb-3 row">
                    <label for="thumbnail" class="col-sm-2 col-form-label">Thumbnail :</label>
                    <div class="col-sm-10">
                      <input type="thumbnail" name="thumbnail" class="form-control" >
                    </div>
                  </div>
                  <div class="mb-3 row">
                    <label for="name" class="col-sm-2 col-form-label">Name :</label>
                    <div class="col-sm-10">
                    <input type="name" name="name" class="form-control"  placeholder="Category name">
                    </div>
                  </div>

                    <select class="form-select" name="is_published" aria-label="Default select example">
                        <option selected disabled>Publish</option>
                        <option value="0">Draft</option>
                        <option value="1">Publish</option>
                      </select>

                <div class="row">
                  <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                       <button class="btn btn-outline-success btn-sm mt-2" type="submit">Create</button>
                  </div>
                </div>
              
        </form>
            </div>
        </div>
        </div>
    </div>
</div>
@endsection
