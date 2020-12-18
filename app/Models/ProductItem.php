<?php

namespace App\Models;

use App\Models\fragments\productItem\Relations;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductItem extends Model
{
    use HasFactory, Relations;

    protected $fillable = [
        'name',
        'text',
        'image',
        'price',
        'quantity',
        'bonus',
        'product_id',
        'creator_id',
        'editor_id',
    ];
}
