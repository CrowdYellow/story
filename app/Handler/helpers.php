<?php

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;

if ( !function_exists('user') ) {
    /**
     * @param null $driver
     * @return mixed
     */
    function user($driver = null)
    {
        if ( $driver ) {
            return app('auth')->guard($driver)->user();
        }
        return app('auth')->user();
    }
}

function make_excerpt($value, $length = 200)
{
    $excerpt = trim(preg_replace('/\r\n|\r|\n+/', ' ', strip_tags($value)));
    return Str::limit($excerpt, $length);
}

function category_nav_active($category_id)
{
    return active_class((if_route('categories.show') && if_route_param('category', $category_id)));
}

function getWebTitle()
{
    return Cache::remember("config", 1440, function(){
        return \App\Models\System::first();
    });
}