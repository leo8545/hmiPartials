<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MenuItem extends Model
{
    protected $fillable = [
        'menu_section_id', 'item', 'price', 'info', 'picture'
    ];

    protected $table = 'menu_items';
    
    public function menu_section(){
        return $this->hasOne(MenuSection::class);
    }
}
