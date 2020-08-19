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
                if(@$menuItem) {
                    $editable = true;
                    $headerText = "Edit Menu Item";
                } else {
                    $editable = false;
                    $headerText = "Add New Menu Item";
                }
            @endphp
            <div class="card-header">
                <h3 class="text-center font-weight-light my-4">{{$headerText}}</h3>
            </div>
            <div class="card-body">
                <form method="POST" enctype="multipart/form-data" action="{{($editable == true) ? route("admin.menuItem.update", $menuItem) : route('menuItem.store')}}">
                    @csrf
                    @if ($editable == true)
                        @method('PUT')
                    @endif
                    <div class="form-row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="small mb-1" for="menu">Menu Section</label>
                                <select id="menu" required class="form-control @error('menuSection') is-invalid @enderror" name="menu_section_id">
                                    <option value="">---Select Menu Section---</option>
                                    @foreach(App\Models\MenuSection::all() as $menuSection)
                                        <option value="{{$menuSection->id}}" {{ ($editable == true && $menuItem->menu_section_id == $menuSection->id ) ? "selected" : '' }}>{{$menuSection->section}}</option>
                                    @endforeach
                                </select>
                                @error('menuSection')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="small mb-1" for="item">Item</label>
                                <input class="form-control py-4 @error('item') is-invalid @enderror" name="item" id="item" type="text" placeholder="Enter Item" value="{{ ($editable == true) ? $menuItem->item : '' }}" />
                                @error('item')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <input class="form-control py-4 @error('info') is-invalid @enderror" name="info" id="info" type="text" placeholder="Information" value="{{ ($editable == true) ? $menuItem->info : '' }}" />
                        @error('info')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="small mb-1" for="price">Price</label>
                                <input class="form-control py-4 @error('price') is-invalid @enderror" name="price" id="price" type="text" placeholder="Enter Price" value="{{ ($editable == true) ? $menuItem->price : '' }}" />
                                @error('price')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="small mb-1" for="picture">Upload Picture</label>
                                <input class="" name="picture" id="picture" type="file" />
                                @if ($editable == true)
                                    <img src="{{ $menuItem->picture }}" alt="" width="50">
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <textarea class="form-control py-4" name="description" id="description" placeholder="Description" cols="30" rows="5">{{ ($editable == true) ? $menuItem->description : '' }}</textarea>
                    </div>
                    <div class="form-group mt-4 mb-0"><input class="btn btn-primary btn-block" type="submit" value="{{ ($editable == true) ? 'Update' : 'Create' }}"></div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection