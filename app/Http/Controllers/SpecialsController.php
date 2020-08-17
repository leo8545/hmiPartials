<?php

namespace App\Http\Controllers;

use App\Enums\PostType;
use App\Models\Menu;

use Illuminate\Support\Facades\DB;

class SpecialsController extends PostController
{
    public function __construct()
    {
        parent::__construct(PostType::SPECIAL());
    }

}
