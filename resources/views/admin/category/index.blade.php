@extends('layouts.app')
@section('content')
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1>Category Page</h1>
        </div>
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
            <li class="breadcrumb-item active">Cateogry</li>
        </ol>
        </div>
    </div>
    </div><!-- /.container-fluid -->
</section>
<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
        <div class="card">
              <div class="card-header">
                <h3 class="card-title">All Category</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped table-sm">
                  <thead>
                  <tr>
                        <th>SL</th>
                        <th>Category</th>
                        <th>Slug</th>
                        <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach($category as $key=>$row)
                        <tr>
                            <td>{{ ++$key }}</thd>
                            <td>{{ $row->category_name }}</td>
                            <td>{{ $row->category_slug }}</td>
                            <td>
                                <a class="btn btn-primary btn-sm" href="{{route('category.edit',$row->id)}}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                <a class="btn btn-danger btn-sm" id="delete" href="{{route('category.delete',$row->id)}}"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                            </td>
                        </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>

            



















        <!-- ----------------------------comment-------------------------- -->
            <!-- <div class="card">
                <div class="card-header">{{ __('All Category') }}
                <a style="float:right;" class="btn btn-dark btn-sm" href="{{route('category.create')}}">+ Add Category</a>
                </div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Category</th>
                                    <th>Slug</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($category as $key=>$row)
                                <tr>
                                    <td>{{ ++$key }}</thd>
                                    <td>{{ $row->category_name }}</td>
                                    <td>{{ $row->category_slug }}</td>
                                    <td>
                                        <a class="btn btn-success btn-sm" href="{{route('category.edit',$row->id)}}">Edit</a>
                                        <a class="btn btn-danger btn-sm" href="{{route('category.delete',$row->id)}}">Delete</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div> -->
        </div>
    </div>
</div>
</div>
</div>
@endsection
