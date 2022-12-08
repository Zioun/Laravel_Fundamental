@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        <div class="card card-info mt-5">
              <div class="card-header">
                <h3 class="card-title">Sub Create New Category</h3>
              </div>
              <div class="card-body">
                <form action="{{route('subcategory.update',$subcategory->id)}}" method="post">
                @csrf
                    <h6>Sub Cateogry Name</h6>
                    <div class="input-group">
                        <select name="category_id"  class="form-control">
                            @foreach($category as $row)
                                <option value="{{$row->id}}" @if($row->id == $subcategory->category_id)selected @endif>{{$row->category_name}}</option>
                            @endforeach
                        </select>
                        <input type="text" class="form-control @error('subcategory_name') is-invalid @enderror" name="subcategory_name" placeholder="Type Sub Category Name..." value="{{$subcategory->subcategory_name}}">
                        @error('subcategory_name')
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
@endsection