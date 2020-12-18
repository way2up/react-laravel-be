<?php

namespace App\Models;

use App\Models\fragments\discount\Relations;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    use HasFactory, Relations;

    protected $fillable = [
        'percent',
        'category_id'
    ];
}
