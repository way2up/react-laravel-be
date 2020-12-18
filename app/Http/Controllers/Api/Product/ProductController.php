<?php

namespace App\Http\Controllers\Api\Product;

use App\Http\Controllers\Controller;
use App\Http\DataProviders\Product\ProductAutocompleteDataProvider;
use App\Http\DataProviders\Product\ProductDataProvider;
use App\Http\Requests\Product\AutocompleteRequest;
use App\Http\Requests\Product\DestroyRequest;
use App\Http\Requests\Product\IndexRequest;
use App\Http\Requests\Product\ShowRequest;
use App\Http\Requests\Product\StoreRequest;
use App\Http\Requests\Product\UpdateRequest;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(IndexRequest $request, ProductDataProvider $dataProvider)
    {
        return response(['products' => New ProductResource($dataProvider->getData())]);
    }

    public function store(StoreRequest $request , Product $product)
    {
        return response(['product' => New ProductResource($request->persist()->getProduct())]);
    }

    public function show(ShowRequest $request , Product $product)
    {
        return response(['product' => New ProductResource($request->getProduct())]);
    }

    public function update(UpdateRequest $request, Product $product)
    {
        //
    }

    public function destroy(DestroyRequest $request, Product $product)
    {
        return response($request->destroy()->getMessage());
    }

    public function productAutocomplete(AutocompleteRequest $request , ProductAutocompleteDataProvider $dataProvider)
    {
        return response(['products' => New ProductResource($dataProvider->getData())]);
    }
}
