<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Image extends Model
{
    public $guarded = [];

    public function getImageUrlAttribute()
    {
        // 如果 image 字段本身就已经是完整的 url 就直接返回
        if (Str::startsWith($this->attributes['images'], ['http://', 'https://'])) {
            return $this->attributes['images'];
        }
        return \Storage::disk('public')->url($this->attributes['images']);
    }
}
