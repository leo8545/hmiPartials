<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MenuItem extends Model
{
    public function menu_section(){
        return $this->hasOne(MenuSection::class);
    }
}
