@extends('admin.partials.site')

@section('content-title')
    All Posts
@endsection

@section('content')

<a href="{{route('admin.specials.create')}}"  class="btn btn-primary">Add New</a>

<div class="table-responsive">
    <!--Table-->
    <table class="table table-striped">

      <!--Table head-->
      <thead>
        <tr>
          <th>#</th>
          <th>Type</th>
          <th>Title</th>
          <th>Introduction</th>
          <th>Starts</th>
          <th>Ends</th>
          <th>Published</th>
          <th>Publish Start</th>
          <th>Publish End</th>
          <th>Last Updated</th>
          <th colspan='2'>Action</th>
        </tr>
      </thead>
      <!--Table head-->

      <!--Table body-->
      <tbody>
            @foreach ($posts as $post)
            <tr>
                <th scope="row">{{$post->id}}</th>
                <td>{{$post->type}}</td>
                <td>{{$post->title}}</td>
                <td>{{$post->intro}}</td>
                <td>{{$post->starts}}</td>
                <td>{{$post->ends}}</td>
                <td>{{$post->published}}</td>
                <td>{{$post->publish_start}}</td>
                <td>{{$post->publish_end}}</td>
                <td>{{$post->updated_at}}</td>
                <td>
                  <a href="{{route("admin.{$post->type}.edit", $post)}}">Edit</a>
                </td>
                <td>
                  <a href="{{route("admin.{$post->type}.destroy", $post)}}" onclick="return confirm('Are you sure you want to delete this item?');">Delete</a>
                </td>
              </tr>
            @endforeach
      </tbody>
      <!--Table body-->
    </table>
    <!--Table-->
  </div>
@endsection
