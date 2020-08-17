@extends('admin.partials.site')


@section('content')
<div class="row justify-content-center">
    <div class="col-lg-7">
        <div class="card shadow-lg border-0 rounded-lg mt-5">
            <div class="card-header"><h3 class="text-center font-weight-light my-4">Update Post</h3></div>
            <div class="card-body">
                <form method="POST" enctype="multipart/form-data" action="{{route('post.update', ['post' => $post])}}">
                    @method('PUT')
                    @csrf
                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="small mb-1" for="type">Type</label>
                                <input class="form-control py-4 @error('type') is-invalid @enderror" name="type" id="type" type="text" placeholder="Enter type of post" value="{{$post->type }}"/>
                                @error('type')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="small mb-1" for="title">Title</label>
                                <input class="form-control py-4 @error('title') is-invalid @enderror" name="title" id="title" type="text" placeholder="Enter Title" value="{{$post->title }}"/>
                                @error('title')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <input class="form-control py-4 @error('intro') is-invalid @enderror" name="intro" id="intro" type="text" placeholder="Introduction of Post" value="{{$post->intro }}"/>
                        @error('intro')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <textarea class="form-control py-4" name="description" id="description" placeholder="Description of Post" cols="30" rows="5">{{$post->description }}</textarea>
                    </div>
                    <div class="form-row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="small mb-1" for="intro_image">Upload Intro Image</label>
                                <input class="" name="intro_image" id="intro_image" type="file" />
                                <img src="{{$post->intro_image}}" alt="" width="50">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="small mb-1" for="main_image">Upload Main Image</label>
                                <input class="" name="main_image" id="main_image" type="file" />
                                <img src="{{$post->main_image}}" alt="" width="50">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="small mb-1" for="icon">Upload Icon</label>
                                <input class="" name="icon" id="icon" type="file" />
                                <img src="{{$post->icon}}" alt="" width="50">
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="small mb-1" for="starts">Starts</label>
                                <input class="form-control py-4" name="starts" id="starts" type="text" placeholder="Select date & time" value="{{$post->starts }}"/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="small mb-1" for="ends">Ends</label>
                                <input class="form-control py-4" name="ends" id="ends" placeholder="Select date & time" type="text" value="{{$post->ends }}"/>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="small mb-1" for="published">Published</label>
                                <input class=" py-4" id="published" type="radio" name="published" value="1" {{($post->published == '1') ? 'checked' : ''}}/>Yes
                                <input class="py-4" id="published" type="radio" name="published" value="0" {{($post->published == '0') ? 'checked' : ''}} />No
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="small mb-1" for="publishStart">Start Publish</label>
                                <input class="form-control py-4" name="publish_start" id="publishStart" placeholder="Select date & time" type="text" value="{{$post->publish_start }}"/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="small mb-1" for="publishEnd">End Publish</label>
                                <input class="form-control py-4" name="publish_end" id="publishEnd" placeholder="Select date & time" type="text" value="{{$post->publish_end }}"/>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group mt-4 mb-0"><input class="btn btn-primary btn-block" type="submit" value="Update Post"></div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection