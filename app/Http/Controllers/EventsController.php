<?php

namespace App\Http\Controllers;

use App\Enums\PostType;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EventsController extends PostController {

    public function __construct()
    {
        parent::__construct(PostType::EVENT());
    }

}
