<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $fillable = [
        'name'
    ];
    public function menu_sections() {
        return $this->hasMany(MenuSection::class)->with('menu_items');
    }

    public function menu_items() {
        return $this->hasManyThrough(MenuItem::class, MenuSection::class);
    }

}
