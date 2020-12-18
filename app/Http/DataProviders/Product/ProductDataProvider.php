<?php

namespace App\Http\DataProviders\Product;

use App\Models\Product;
use Illuminate\Support\Facades\DB;

class ProductDataProvider
{
    public function getData()
    {
        return Product::whereHas('items')
            ->withCount(['items as total_count', 'items as total_price' => function($query){
                $query->select(DB::raw('sum(price)'));
            }, 'items as total_bonus' => function($query){
                $query->select(DB::raw('sum(bonus)'));
            }])->get();
    }
}
