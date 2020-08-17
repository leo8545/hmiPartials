<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.post.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.post.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post_data = $request->all();
        $this->validate($request, [
            'type' => 'required',
            'title' => 'required',
            'intro' => 'required',
            'description' => '',
            'starts' => '',
            'ends' => '',
            'published' => '',
            'publish_start' => '',
            'publish_end' => '',
        ]);

        // Images
        $images = [ 
            'intro_image', 'main_image', 'icon'
        ];

        $post = new Post();

        foreach($images as $image) {
            if($request->hasFile($image)) {
                if($request->file($image)->isValid()) {
                    $validated = $request->validate([
                        $image => 'mimes:jpeg,png|max:1014',
                    ]);
    
                    $extension = $request->{$image}->extension();
                    $fileName = Arr::get($post_data , 'title')."-$image.".$extension;
                    $request->{$image}->storeAs('/public', $fileName);
                    $url = Storage::url($fileName);
                    $post->{$image} = $url;
                }
            }
        }

        $post->user_id = Auth::user()->id;
        $post->type = Arr::get($post_data , 'type');
        $post->title = Arr::get($post_data , 'title');
        $post->intro = Arr::get($post_data , 'intro');
        $post->description = Arr::get($post_data , 'description');
        $post->starts = Arr::get($post_data , 'starts');
        $post->ends = Arr::get($post_data , 'ends');
        $post->published = Arr::get($post_data , 'published');
        $post->publish_start = Arr::get($post_data , 'publish_start');
        $post->publish_end = Arr::get($post_data , 'publish_end');

        $post->save();
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('admin.post.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $post->type = Arr::get($request , 'type');
        $post->title = Arr::get($request , 'title');
        $post->intro = Arr::get($request , 'intro');
        $post->description = Arr::get($request , 'description');
        $post->starts = Arr::get($request , 'starts');
        $post->ends = Arr::get($request , 'ends');
        $post->published = Arr::get($request , 'published');
        $post->publish_start = Arr::get($request , 'publish_start');
        $post->publish_end = Arr::get($request , 'publish_end');
        // Images
        $images = [ 
            'intro_image', 'main_image', 'icon'
        ];
        foreach($images as $image) {
            if($request->hasFile($image)) {
                if($request->file($image)->isValid()) {
                    $validated = $request->validate([
                        $image => 'mimes:jpeg,png|max:1014',
                    ]);
    
                    $extension = $request->{$image}->extension();
                    $fileName = Arr::get($request , 'title')."-$image.".$extension;
                    $request->{$image}->storeAs('/public', $fileName);
                    $url = Storage::url($fileName);
                    $post->{$image} = $url;
                }
            }
        }
        $post->save();
        return view('admin.post.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->back();
    }
}
