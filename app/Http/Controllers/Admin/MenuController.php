<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Route;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menus = Menu::all();
        return view('admin.menu.index' , compact('menus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.menu.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $menu_data = $request->all();
        $this->validate($request, [
            'name' => 'required',
            'info' => '',
            'description' => '',
            'published' => ''
        ]);

        $menu = new Menu();

        $menu->name = Arr::get($menu_data , 'name');
        $menu->info = Arr::get($menu_data , 'info');
        $menu->description = Arr::get($menu_data , 'description');
        $menu->published = Arr::get($menu_data , 'published');

        $menu->save();
        return redirect()->back()->with('success', 'New Menu added successfully!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function edit(Menu $menu)
    {
        return view('admin.menu.create', compact('menu'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Menu $menu)
    {
        $this->validate($request, [
            'name' => 'required',
            'info' => '',
            'description' => '',
            'published' => ''
        ]);

        $menu->name = Arr::get($request , 'name');
        $menu->info = Arr::get($request , 'info');
        $menu->description = Arr::get($request , 'description');
        $menu->published = Arr::get($request , 'published');

        $menu->update();
        return redirect()->back()->with('success', 'Menu updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menu $menu)
    {
        $menu->delete();
        return redirect()->back();
    }
}
