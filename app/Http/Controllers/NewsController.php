<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NewsController extends PostController {

     public function index( Request $request ) {

         return view('news');

     }

}
