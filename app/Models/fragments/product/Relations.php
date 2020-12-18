<?php

namespace App\Models\fragments\product;

use App\Models\Category;
use App\Models\ProductItem;
use App\Models\User;

trait Relations
{
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function items()
    {
        return $this->hasMany(ProductItem::class);
    }
}
