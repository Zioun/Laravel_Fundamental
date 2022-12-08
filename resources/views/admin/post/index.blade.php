@extends('layouts.app')
@section('content')
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1>Post Page</h1>
        </div>
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
            <li class="breadcrumb-item active">Post</li>
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
                <h3 class="card-title">Manage Post</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped table-sm">
                  <thead>
                  <tr>
                      <th>SL</th>
                      <th>Image</th>
                      <th>Category</th>
                      <th>Title</th>
                      <th>Author</th>
                      <th>Date</th>
                      <th>Status</th>
                      <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach($posts as $key=>$row)
                        <tr>
                            <td>{{ ++$key }}</thd>
                            <td>
                              @if($row->image)
                                <img style="height:150px;width:150px;" 
                                src="/media/{{$row->image}}" alt="postImage">
                              @else
                                <img style="height:150px;width:150px;" 
                                src="/media/no_image.jpg" alt="postImage">
                              @endif
                            </td>
                            <td>{{$row->category->category_name}}</td>
                            <td>{{$row->title}}</td>
                            <td>{{$row->user->name}}</td>
                            <td>{{date('d F Y',strtotime($row->post_date))}}</td>
                            <td>
                              @if($row->status == 1)
                                <span class="badge badge-success">Action</span>
                              @else
                                <span class="badge badge-danger">Inactive</span>
                              @endif
                            </td>

                            <td>
                                <a class="btn btn-primary btn-sm" href="{{route('post.view',$row->id)}}"><i class="fa fa-arrows-alt" aria-hidden="true"></i></a>
                                <a class="btn btn-primary btn-sm" href="{{route('post.edit',$row->id)}}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                <a class="btn btn-danger btn-sm" id="delete" href="{{route('post.delete',$row->id)}}"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
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
