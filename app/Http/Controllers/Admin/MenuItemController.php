<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MenuItem;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Route;

class MenuItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menuItems = MenuItem::all();
        return view('admin.menuItem.index' , compact('menuItems'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.menuItem.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $menuItem_data = $request->all();
        
        // Images
        $image = 'picture' ;
        $menuItem = new MenuItem();
        if($request->hasFile($image)) {
            if($request->file($image)->isValid()) {
                $validated = $request->validate([
                    $image => 'mimes:jpeg,png|max:1014',
                ]);

                $extension = $request->{$image}->extension();
                $fileName = Arr::get($menuItem_data , 'item')."-$image.".$extension;
                $request->{$image}->storeAs('/public', $fileName);
                $url = Storage::url($fileName);
                $menuItem->{$image} = $url;
            }
        }
        $menuItem->menu_section_id = (int) Arr::get($menuItem_data , 'menu_section_id');
        $menuItem->item = Arr::get($menuItem_data , 'item');
        $menuItem->price = (float) Arr::get($menuItem_data , 'price');
        $menuItem->info = Arr::get($menuItem_data , 'info');
        $menuItem->description = Arr::get($menuItem_data , 'description');


        $menuItem->save();
        return redirect()->back()->with('success', 'New Item added successfully!');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\MenuItem  $menuItem
     * @return \Illuminate\Http\Response
     */
    public function edit(MenuItem $menuItem)
    {
        return view('admin.menuItem.create', compact('menuItem'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\MenuItem  $menuItem
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MenuItem $menuItem)
    {
        // Images
        $image = 'picture' ;

        if($request->hasFile($image)) {
            if($request->file($image)->isValid()) {
                $validated = $request->validate([
                    $image => 'mimes:jpeg,png|max:1014',
                ]);

                $extension = $request->{$image}->extension();
                $fileName = Arr::get($request , 'item')."-$image.".$extension;
                $request->{$image}->storeAs('/public', $fileName);
                $url = Storage::url($fileName);
                $menuItem->{$image} = $url;
            }
        }
        $menuItem->menu_section_id = (int) Arr::get($request , 'menu_section_id');
        $menuItem->item = Arr::get($request , 'item');
        $menuItem->price = (float) Arr::get($request , 'price');
        $menuItem->info = Arr::get($request , 'info');
        $menuItem->description = Arr::get($request , 'description');


        $menuItem->update();
        return redirect()->back()->with('success', 'Item updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\MenuItem  $menuItem
     * @return \Illuminate\Http\Response
     */
    public function destroy(MenuItem $menuItem)
    {
        $menuItem->delete();
        return redirect()->back();
    }
}
