<?php

namespace App\Models\fragments\category;

use App\Models\Product;
use App\Models\User;

trait Relations
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
}
