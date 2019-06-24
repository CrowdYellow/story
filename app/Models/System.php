<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class System extends Model
{
    public $guarded = [];

    public function getImageUrlAttribute()
    {
        // 如果 image 字段本身就已经是完整的 url 就直接返回
        if (Str::startsWith($this->attributes['we_chat'], ['http://', 'https://'])) {
            return $this->attributes['we_chat'];
        }
        return \Storage::disk('public')->url($this->attributes['we_chat']);
    }
}
