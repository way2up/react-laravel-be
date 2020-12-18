<?php

namespace App\Models\fragments\discount;

use App\Models\Category;

trait Relations
{
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
