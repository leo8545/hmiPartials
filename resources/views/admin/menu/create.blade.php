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
                if(@$menu) {
                    $editable = true;
                    $headerText = "Edit Menu";
                } else {
                    $editable = false;
                    $headerText = "Add New Menu";
                }
            @endphp
            <div class="card-header">
                <h3 class="text-center font-weight-light my-4">{{$headerText}}</h3>
            </div>
            <div class="card-body">
                <form method="POST" enctype="multipart/form-data" action="{{($editable == true) ? route("admin.menu.update", $menu) : route('menu.store')}}">
                    @csrf
                    @if ($editable == true)
                        @method('PUT')
                    @endif
                    <div class="form-row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="small mb-1" for="name">Name</label>
                                <input class="form-control py-4 @error('name') is-invalid @enderror" name="name" id="name" type="text" placeholder="Enter Name" value="{{ ($editable == true) ? $menu->name : '' }}" />
                                @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <input class="form-control py-4 @error('info') is-invalid @enderror" name="info" id="info" type="text" placeholder="Introduction" value="{{ ($editable == true) ? $menu->info : '' }}" />
                        @error('info')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <textarea class="form-control py-4" name="description" id="description" placeholder="Description" cols="30" rows="5">{{ ($editable == true) ? $menu->description : '' }}</textarea>
                    </div>
                    
                    <div class="form-row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="small mb-1" for="published">Published</label>
                                <input class=" py-4" id="published" type="radio" name="published" value="1" {{ ($editable == true && $menu->published == '1') ? "checked" : '' }} />Yes
                                <input class="py-4" id="published" type="radio" name="published" value="0" {{ (($editable == true && $menu->published == '0') || ($editable == false)) ? "checked" : '' }} />No
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group mt-4 mb-0"><input class="btn btn-primary btn-block" type="submit" value="{{ ($editable == true) ? 'Update' : 'Create' }}"></div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection