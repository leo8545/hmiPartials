<?php

namespace App\Models;

use App\Enums\PostType;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Post extends Model
{
    protected $fillable = [
        'type',
        'title',
        'intro',
        'user_id',
    ];

    public static function get( PostType $type, $num = null ) {

        $query = Post::where('published', 1)
            ->where('type', $type->type)
            ->where(function($query) {
                $query->where('publish_start', '<=', Carbon::now())
                    ->orWhereNull('publish_start');
            })
            ->where(function($query) {
                $query->where('publish_end', '>=', Carbon::now())
                    ->orWhereNull('publish_end');
            })
            ->orderBy('created_at', 'desc');


        if( $num ) {
            $query->limit($num);
        }

        return $query->get();
    }
}
