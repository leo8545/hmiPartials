<?php


namespace App\Enums;


use Illuminate\Auth\Access\Gate;

class PostType
{
    public function __construct( $type, $title )
    {
        $this->type = $type;
        $this->title = $title;
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
