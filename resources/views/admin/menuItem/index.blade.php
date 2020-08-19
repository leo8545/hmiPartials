@extends('admin.partials.site')

@section('content-title')
    All Menus Items
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
          <th>Section</th>
          <th>Item</th>
          <th>Price</th>
          <th>Info</th>
          <th>Description</th>
          <th colspan='2'>Action</th>
        </tr>
      </thead>
      <!--Table head-->

      <!--Table body-->
      <tbody>
            @foreach ($menuItems as $menuItem)
            <tr>
                <th scope="row">{{$menuItem->id}}</th>
                <td>{{App\Models\MenuSection::whereId($menuItem->menu_section_id)->first()->section}}</td>
                <td>{{$menuItem->item}}</td>
                <td>{{$menuItem->price}}</td>
                <td>{{$menuItem->info}}</td>
                <td>{{$menuItem->description}}</td>
                <td>
                  <a href="{{route("admin.menuItem.edit", $menuItem)}}">Edit</a>
                </td>
                <td>
                  <a href="{{route("admin.menuItem.destroy", $menuItem)}}" onclick="return confirm('Are you sure you want to delete this Menu Item?');">Delete</a>
                </td>
              </tr>
            @endforeach
      </tbody>
      <!--Table body-->
    </table>
    <!--Table-->
  </div>
@endsection
