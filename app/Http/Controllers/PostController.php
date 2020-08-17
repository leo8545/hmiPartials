<?php

namespace App\Http\Controllers;

use App\Enums\PostType;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class PostController extends Controller
{
    public $type;

    public function __construct( PostType $type )
    {
        $this->type = $type ;
    }

    public function index(Request $request) {

        $posts = Post::get($this->type, 3);

        return view(Str::plural($this->type->type), ['posts' => $posts]);
    }

}
