<?php

namespace App\Http\DataProviders\ProductItem;

use App\Http\Requests\ProductItem\IndexRequest;
use App\Models\ProductItem;

class ProductItemDataProvider
{
    public $request;

    public function __construct(IndexRequest $request)
    {
        $this->request = $request;
    }

    public function getData()
    {
        return ProductItem::where('product_id', $this->request->product_id)->get();
    }
}
