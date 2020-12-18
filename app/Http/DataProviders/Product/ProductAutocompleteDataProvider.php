<?php

namespace App\Http\DataProviders\Product;

use App\Http\Requests\Product\AutocompleteRequest;
use App\Models\Product;

class ProductAutocompleteDataProvider
{
    public $request;

    public function __construct(AutocompleteRequest $request)
    {
        $this->request = $request;
    }

    public function getData()
    {
        return Product::wherehas('items', function ($query){
            $query->where('name', 'like', $this->request->search.'%')
                ->orWhere('name', 'like', '%' .$this->request->search)
                ->orWhere('name', 'like', '%' .$this->request->search. '%');
        })->with('items')->get();
    }
}
