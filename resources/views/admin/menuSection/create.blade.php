@extends('admin.partials.site')

@section('content')
@if (\Session::has('success'))
    <div class="alert alert-success">
        {!! \Session::get('success') !!}
    </div>
@endif
<div class="row justify-content-center">
    <div class="col-lg-7">
        <div class="card shadow-lg border-0 rounded-lg mt-5">
            @php
                if(@$menuSection) {
                    $editable = true;
                    $headerText = "Edit Menu Section";
                } else {
                    $editable = false;
                    $headerText = "Add New Menu Section";
                }
            @endphp
            <div class="card-header">
                <h3 class="text-center font-weight-light my-4">{{$headerText}}</h3>
            </div>
            <div class="card-body">
                <form method="POST" enctype="multipart/form-data" action="{{($editable == true) ? route("admin.menuSection.update", $menuSection) : route('menuSection.store')}}">
                    @csrf
                    @if ($editable == true)
                        @method('PUT')
                    @endif
                    <div class="form-row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="small mb-1" for="menu">Menu</label>
                                <select id="menu" required class="form-control @error('menu') is-invalid @enderror" name="menu_id">
                                    <option value="">---Select Menu---</option>
                                    @foreach(App\Models\Menu::all() as $menu)
                                        <option value="{{$menu->id}}" {{ ($editable == true && $menuSection->menu_id == $menu->id ) ? "selected" : '' }}>{{$menu->name}}</option>
                                    @endforeach
                                </select>
                                @error('menu')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="small mb-1" for="section">Section</label>
                                <input class="form-control py-4 @error('section') is-invalid @enderror" name="section" id="section" type="text" placeholder="Enter Section" value="{{ ($editable == true) ? $menuSection->section : '' }}" />
                                @error('section')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <input class="form-control py-4 @error('info') is-invalid @enderror" name="info" id="info" type="text" placeholder="Information" value="{{ ($editable == true) ? $menu->info : '' }}" />
                        @error('info')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="form-group mt-4 mb-0"><input class="btn btn-primary btn-block" type="submit" value="{{ ($editable == true) ? 'Update' : 'Create' }}"></div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection