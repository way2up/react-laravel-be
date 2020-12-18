<?php

namespace App\Models;

use App\Models\fragments\product\Relations;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory, Relations;

    protected $fillable = [
        'name',
        'description',
        'image',
        'user_id',
    ];
}
