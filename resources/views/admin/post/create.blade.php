@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        <div class="card card-info mt-5 mb-5">
              <div class="card-header">
                <h3 class="card-title">New Post Create</h3>
              </div>
              <div class="card-body">
                <form action="{{route('post.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                    <div class="input-form">
                        <div class="form-group">
                            <label for="">Post Title</label>
                            <input type="text" class="form-control @error('post_title') is-invalid @enderror" name="post_title" placeholder="Post Title..." value="{{ old('post_title') }}">
                            @error('post_title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="">Category</label>
                            <select name="subcategory_id" id="" class="form-control  @error('subcategory_id') is-invalid @enderror" value="{{ old('subcategory_id') }}">
                                <option disabled selected>Select Category</option>
                                @foreach($category as $cat)
                                    @php
                                        $subcategory = DB::table('subcategories')->where('category_id',$cat->id)->get();
                                    @endphp
                                        <option value="" class="text-info">{{$cat->category_name}}</option>
                                    @foreach($subcategory as $sub)
                                        <option value="{{$sub->id}}">----{{$sub->subcategory_name}}</option>
                                    @endforeach
                                @endforeach
                            </select>
                            @error('subcategory_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <!-- <div class="form-group">
                            <label for="">Sub-Category</label>
                            <select name="subcategory_id" id="" class="form-control">
                                <option value="">Select Category</option>
                                
                                    <option value=""></option>
                                
                            </select>
                        </div> -->

                        <div class="form-group">
                            <label for="">Post Date</label>
                            <input type="date" class="form-control @error('post_date') is-invalid @enderror" name="post_date" placeholder="Post Title..." value="{{ old('post_date') }}">
                            @error('post_date')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="">Tags</label>
                            <input type="text" class="form-control @error('post_tags') is-invalid @enderror" name="post_tags" placeholder="Post Title..." value="{{ old('post_tags') }}">
                            @error('post_tags')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="">Description</label>
                            <textarea type="text" id="summernote" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') }}" placeholder="Description..." rows="4"></textarea>
                            @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="">Choose Image</label>
                            <input type="file" name="image" class="form-control">
                        </div>

                        <div class="form-group">
                            
                            <input type="checkbox" class="form-check-input ml-0" name="status" value="1">
                            <label for="" class="ml-3">Published Now</label>
                        </div>

                        <span class="input-group-append mt-3">
                            <button type="sumbit" class="btn btn-info btn-flat">Upload!</button>
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

@push('script')
    <script type="text/javascript">
        $(document).ready(function(){
            console.log('hello World');
        });
    </script>
@endpush