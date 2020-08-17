<?php

namespace App\Http\Controllers;

use App\Enums\PostType;
use App\Models\Menu;
use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller {

    public function index( Request $request ) {

        // gather all the posts for the homepage
        // todo could add helper that fetch once from the DB and sorts
        $home = Post::get(PostType::HOME(), 3);
        $events = Post::get(PostType::EVENT(), 3);
        $specials = Post::get(PostType::SPECIAL(), 4);
        $alerts = Post::get(PostType::ALERT());
        $news = Post::get(PostType::NEWS());

        return view('home', [
            "home" => $home,
            "alerts" => $alerts,
            "events" => $events,
            "specials" => $specials,
            "news" => $news,
        ]);

    }

}
