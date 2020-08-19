@extends('admin.partials.site')

@section('content-title')
    All Menus Sections
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
          <th>Menu</th>
          <th>Section</th>
          <th>Info</th>
          <th colspan='2'>Action</th>
        </tr>
      </thead>
      <!--Table head-->

      <!--Table body-->
      <tbody>
            @foreach ($menuSections as $menuSection)
            <tr>
                <th scope="row">{{$menuSection->id}}</th>
                <td>{{App\Models\Menu::whereId($menuSection->menu_id)->first()->name}}</td>
                <td>{{$menuSection->section}}</td>
                <td>{{$menuSection->info}}</td>
                <td>
                  <a href="{{route("admin.menuSection.edit", $menuSection)}}">Edit</a>
                </td>
                <td>
                  <a href="{{route("admin.menuSection.destroy", $menuSection)}}" onclick="return confirm('Are you sure you want to delete this Menu Section?');">Delete</a>
                </td>
              </tr>
            @endforeach
      </tbody>
      <!--Table body-->
    </table>
    <!--Table-->
  </div>
@endsection
