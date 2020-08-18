@extends('admin.partials.site')

@section('content-title')
    All Menus
@endsection

@section('content')

<div class="mb-3">
  <a href="{{route('admin.menu.create')}}"  class="btn btn-primary">Add Menu</a>
  <a href="{{route('admin.menuSection.create')}}"  class="btn btn-primary">Add Section</a>
  <a href="{{route('admin.menuItem.create')}}"  class="btn btn-primary">Add Item</a>
</div>

<div class="table-responsive">
    <!--Table-->
    <table class="table table-striped">

      <!--Table head-->
      <thead>
        <tr>
          <th>#</th>
          <th>Name</th>
          <th>Description</th>
          <th>Info</th>
          <th>Published</th>
          <th colspan='2'>Action</th>
        </tr>
      </thead>
      <!--Table head-->

      <!--Table body-->
      <tbody>
            @foreach ($menus as $menu)
            <tr>
                <th scope="row">{{$menu->id}}</th>
                <td>{{$menu->name}}</td>
                <td>{{$menu->description}}</td>
                <td>{{$menu->info}}</td>
                <td>{{$menu->published}}</td>
                <td>
                  <a href="{{route("admin.menu.edit", $menu)}}">Edit</a>
                </td>
                <td>
                  <a href="{{route("admin.menu.destroy", $menu)}}" onclick="return confirm('Are you sure you want to delete this Menu?');">Delete</a>
                </td>
              </tr>
            @endforeach
      </tbody>
      <!--Table body-->
    </table>
    <!--Table-->
  </div>
@endsection
