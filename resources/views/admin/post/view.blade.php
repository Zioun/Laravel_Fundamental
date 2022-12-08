@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        <!-- Profile Image -->
        <div class="card card-primary card-outline mt-3">
              <div class="card-body box-profile">
                <div class="text-center">
                        @if($posts->image)
                            <img class="profile-user-img" style="width:500px;height:300px;"
                            src="/media/{{$posts->image}}"
                            alt="Post_Image">
                            @else
                            <img style="height:150px;width:150px;" 
                            src="/media/no_image.jpg" alt="postImage">
                        @endif
                </div>

                <h3 class="profile-username text-center">{{$posts->title}}</h3>

                <p class="text-muted text-center">{{$posts->description}}</p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Author</b> <a class="float-right"><span class="badge badge-success">{{$posts->user->name}}</span></a>
                  </li>
                  <li class="list-group-item">
                    <b>Category</b> <a class="float-right">{{$posts->category->category_name}}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Sub-Category</b> <a class="float-right">{{$posts->subcategory->subcategory_name}}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Post Date</b> <a class="float-right">{{date('d F Y',strtotime($posts->post_date))}}</a>
                  </li>
                </ul>

                <a href="{{url('post/index')}}" class="btn btn-primary btn-block"><b>Back</b></a>
              </div>
              <!-- /.card-body -->
            </div>
    </div>
</div>
@endsection