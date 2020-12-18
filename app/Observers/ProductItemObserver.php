<?php

namespace App\Observers;

use App\Models\Product;
use App\Models\ProductItem;

class ProductItemObserver
{
    public function created(ProductItem $productItem)
    {
        //
    }

    public function updated(ProductItem $productItem)
    {
        //
    }

    public function deleted(ProductItem $productItem)
    {
        $deleteProduct = ProductItem::where('product_id', $productItem->product_id)->count();
        if ($deleteProduct < 1){
            Product::where('id', $productItem->product_id)->delete();
        }
    }

    public function restored(ProductItem $productItem)
    {
        //
    }

    public function forceDeleted(ProductItem $productItem)
    {
        //
    }
}
