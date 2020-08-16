<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MenusController extends Controller {

    public function index( Request $request ) {

        $menus = Menu::with('menu_sections')->with('menu_items')->get();
        return view('menus', ["menus" => $menus]);

    }

}
