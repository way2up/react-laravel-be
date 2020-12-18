<?php

namespace App\Http\Controllers\Api\ProductItem;

use App\Http\Controllers\Controller;
use App\Http\DataProviders\ProductItem\ProductItemDataProvider;
use App\Http\Requests\ProductItem\DestroyRequest;
use App\Http\Requests\ProductItem\IndexRequest;
use App\Http\Requests\ProductItem\ShowRequest;
use App\Http\Requests\ProductItem\StoreRequest;
use App\Http\Resources\ProductItemResource;
use App\Models\ProductItem;
use Illuminate\Http\Request;

class ProductItemController extends Controller
{
    public function index(IndexRequest $request, ProductItemDataProvider $dataProvider)
    {
        return response(['product_items' => New ProductItemResource($dataProvider->getData())]);
    }

    public function store(StoreRequest $request)
    {
        return response(['product_item' => New ProductItemResource($request->persist()->getProductItem())]);
    }

    public function show(ShowRequest $request,ProductItem $productItem)
    {
        return response(['product' => New ProductItemResource($request->getProductItem())]);
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy(DestroyRequest $request, ProductItem $productItem)
    {
        return response($request->destroy()->getMessage());
    }
}
