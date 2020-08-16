<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MenuSection extends Model
{
    public function menu() {
        return $this->hasOne(Menu::class);
    }

    public function menu_items() {
        return $this->hasMany(MenuItem::class);
    }
}
