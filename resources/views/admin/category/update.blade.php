@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        <div class="card card-info mt-5">
              <div class="card-header">
                <h3 class="card-title">Update Category</h3>
              </div>
              <div class="card-body">
                <form action="{{route('category.update',$data->id)}}" method="POST">
                @csrf
                    <h6>Update Cateogry</h6>
                    <div class="input-group">
                        <input type="text" class="form-control @error('category_name') is-invalid @enderror" name="category_name" value="{{ $data->category_name }}">
                        @error('category_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <span class="input-group-append">
                            <button type="sumbit" class="btn btn-info btn-flat">Update!</button>
                        </span>
                    </div>
                </form>
              </div>
              <!-- /.card-body -->
            </div>
        </div>
    </div>
</div>




<!-- ---------------------------comment---------------------------- -->

<!-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Update Category') }}
                <a style="float:right;" class="btn btn-danger btn-sm" href="{{route('category.index')}}">- Back</a>
                </div>
                
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        
                        <form action="{{route('category.update',$data->id)}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label>Category Name</label>
                                <input  type="text" class="form-control mt-2 @error('category_name') is-invalid @enderror" name="category_name" placeholder="Type Category Name" value="{{ $data->category_name }}">
                                @error('category_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary mt-2">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> -->
@endsection