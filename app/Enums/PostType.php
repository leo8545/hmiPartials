<?php


namespace App\Enums;


use Illuminate\Auth\Access\Gate;

class PostType
{
    public $type;
    public $title;
    public $prefix_width;
    public $prefix_height;
    public $image_width;
    public $image_height;

    public function __construct( $type, $title, $prefix_width = 100, $prefix_height = 100, $image_width = 250, $image_height = 250 )
    {
        $this->type = $type;
        $this->title = $title;
        $this->prefix_width = $prefix_width;
        $this->prefix_height = $prefix_height;
        $this->image_width = $image_width;
        $this->image_height = $image_height;
    }

    public static function HOME() {
        return new PostType("home", "Home") ;
    }

    public static function SPECIAL() {
        return new PostType("special", "Special") ;
    }

    public static function NEWS() {
        return new PostType("news", "News") ;
    }

    public static function EVENT() {
        return new PostType("event", "Event") ;
    }

    public static function ALERT() {
        return new PostType("alert", "Alert") ;
    }
}
