@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        <div class="card card-info mt-5">
              <div class="card-header">
                <h3 class="card-title">Create New Category</h3>
              </div>
              <div class="card-body">
                <form action="{{route('category.store')}}" method="post">
                @csrf
                    <h6>Cateogry Name</h6>
                    <div class="input-group">
                        <input type="text" class="form-control @error('category_name') is-invalid @enderror" name="category_name" placeholder="Type Category Name..." value="{{ old('category_name') }}">
                        @error('category_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <span class="input-group-append">
                            <button type="sumbit" class="btn btn-info btn-flat">Create!</button>
                        </span>
                    </div>
                </form>
              </div>
              <!-- /.card-body -->
            </div>


<!-- --------------------comment------------------------ -->


            <!-- <div class="card">
                <div class="card-header">{{ __('Create Category') }}
                <a style="float:right;" class="btn btn-danger btn-sm" href="{{route('category.index')}}">- Back</a>
                </div>
                
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        
                        <form action="{{route('category.store')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label>Category Name</label>
                                <input  type="text" class="form-control mt-2 @error('category_name') is-invalid @enderror" name="category_name" placeholder="Type Category Name" value="{{ old('category_name') }}">
                                @error('category_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary mt-2">Submit</button>
                        </form>
                    </div>
                </div>
            </div> -->
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