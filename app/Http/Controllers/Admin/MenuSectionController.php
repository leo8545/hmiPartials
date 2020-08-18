<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MenuSection;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Route;

class MenuSectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menuSections = MenuSection::all();
        return view('admin.menuSection.index' , compact('menuSections'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.menuSection.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $menuSection_data = $request->all();
        $this->validate($request, [
            'menu_id' => 'required',
            'section' => 'required',
            'info' => ''
        ]);

        $menuSection = new MenuSection();

        $menuSection->menu_id = Arr::get($menuSection_data , 'menu_id');
        $menuSection->section = Arr::get($menuSection_data , 'section');
        $menuSection->info = Arr::get($menuSection_data , 'info');

        $menuSection->save();
        return redirect()->back()->with('success', 'New Section added successfully!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\MenuSection  $menuSection
     * @return \Illuminate\Http\Response
     */
    public function edit(MenuSection $menuSection)
    {
        return view('admin.menuSection.create', compact('menuSection'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\MenuSction  $menuSection
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MenuSection $menuSection)
    {
        $this->validate($request, [
            'menu_id' => 'required',
            'section' => 'required',
            'info' => ''
        ]);

        $menuSection->menu_id = Arr::get($request , 'menu_id');
        $menuSection->section = Arr::get($request , 'section');
        $menuSection->info = Arr::get($request , 'info');

        $menuSection->update();
        return redirect()->back()->with('success', 'Section updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\MenuSection  $menuSection
     * @return \Illuminate\Http\Response
     */
    public function destroy(MenuSection $menuSection)
    {
        $menuSection->delete();
        return redirect()->back();
    }
}
