<?php


namespace App\Models\fragments\productItem;

use App\Models\Product;
use App\Models\User;

trait Relations
{
    public function creator()
    {
        return $this->belongsTo(User::class, 'creator_id');
    }

    public function editor()
    {
        return $this->belongsTo(User::class, 'editor_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
