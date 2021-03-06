<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // add the admin user
        $user = new \App\User();
        $user->name = "Ian Hannaford";
        $user->email = "ian@truecommerce.co.uk";
        $user->email_verified_at = \Carbon\Carbon::now();
        $user->password = Hash::make("qwerty123");
        $user->role = 'admin' ;
        $user->save();

        $menu = new \App\Models\Menu();
        $menu->name = "Food Menu";
        $menu->description = "Join us for our tasty home cooked food every day from 10am";
        $menu->info = "Food Served All Day";
        $menu->published = 1;
        $menu->save();

        $starter = new \App\Models\MenuSection();
        $starter->section = "Starters" ;
        $starter->menu_id = $menu->id;
        $starter->save();

        $item1 = new \App\Models\MenuItem();
        $item1->item = "Bruchetta";
        $item1->info = "(Cold)";
        $item1->description = "Lovely dough bread, sprinkled with finely diced tomatoes and glazed in vinegar.";
        $item1->picture = "" ;
        $item1->price = 2.99;
        $item1->menu_section_id = $starter->id;
        $item1->save() ;

        $mains = new \App\Models\MenuSection();
        $mains->section = "Mains" ;
        $mains->menu_id = $menu->id;
        $mains->save();

        $lunch = new \App\Models\MenuSection();
        $lunch->section = "Lunches" ;
        $lunch->info = "Served 10am-2pm";
        $lunch->menu_id = $menu->id;
        $lunch->save() ;

        $dmenu = new \App\Models\Menu();
        $dmenu->name = "Drinks Menu";
        $dmenu->published = 1;
        $dmenu->save();



    }
}
