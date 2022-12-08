@extends('layouts.app')
@section('content')
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1>Sub Category Page</h1>
        </div>
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
            <li class="breadcrumb-item active">Sub Cateogry</li>
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
                <h3 class="card-title">All Sub Category</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped table-sm">
                  <thead>
                  <tr>
                        <th>SL</th>
                        <th>Category</th>
                        <th>Sub Category Name</th>
                        <th>Sub Category Slug</th>
                        <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach($subcategory as $key=>$row)
                        <tr>
                            <td>{{ ++$key }}</thd>
                            <td>{{ $row->category->category_name }}</td>
                            <td>{{ $row->subcategory_name }}</td>
                            <td>{{ $row->subcategory_slug }}</td>
                            <td>
                                <a class="btn btn-primary btn-sm" id="edit" href="{{route('subcategory.edit',$row->id)}}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                <a class="btn btn-danger btn-sm" id="delete" href="{{route('subcategory.delete',$row->id)}}"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                            </td>
                        </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
        </div>
    </div>
</div>
</div>
</div>
@endsection