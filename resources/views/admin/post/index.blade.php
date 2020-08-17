@extends('admin.partials.site')

@section('content-title')
    All Posts
@endsection

@section('content')
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
          <th>Action</th>
        </tr>
      </thead>
      <!--Table head-->
  
      <!--Table body-->
      <tbody>
            @foreach (App\Post::all() as $post)
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
                  <div class="dropdown">
                      <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Action
                      </button>
                      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="{{ route('post.edit', ['post' => $post]) }}">Update</a>
                        <form method="POST" action="{{ route('post.destroy', ['post'=> $post]) }}">
                            @method('DELETE')
                            @csrf
                            <button class="dropdown-item" type="submit">Delete</button>
                        </form>
                      </div>
                    </div>
                </td>
              </tr>
            @endforeach
      </tbody>
      <!--Table body-->
    </table>
    <!--Table-->
  </div>
@endsection