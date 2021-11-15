@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
     
        <div class="card">
            <div class="card-header">
                <div class="row">
                        {{ __('Create Gallery') }}
                </div>
            </div>

            <div class="card-body">
            <form enctype="multipart/form-data" action="{{route('galleries.store')}}" method="POST">
                @csrf
                <div class="mb-3 row">
                    <div class="input-group mb-3">
                        <label class="input-group-text" for="image_url">Upload</label>
                        <input type="file" class="form-control" name='image_url' id="inputGroupFile01">
                      </div>
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
