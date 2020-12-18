<?php

namespace App\Http\Requests\Product;

use App\Models\Product;
use App\Models\ProductItem;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

/**
 * @property string product_name
 * @property string product_description
 * @property string item_name
 * @property string item_text
 * @property int item_price
 * @property int item_quantity
 * @property int item_bonus
 * @property int category_id
 */
class StoreRequest extends FormRequest
{
    public $product;

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'product_name'          => 'required',
            'product_description'   => 'required',
            'category_id'           => 'required|exists:categories,id',
            'item_name'             => 'required|string',
            'item_text'             => 'required|string',
            'item_price'            => 'required|numeric',
            'item_quantity'         => 'required|integer|min:1',
            'item_bonus'            => 'numeric|min:0',
            'item_image'            => 'file'
        ];
    }

    public function persist()
    {
        $this->product = Product::create(array_merge([
            'name'          => $this->product_name,
            'description'   => $this->product_description
        ], $this->getMergingData()));

        $this->manageRelations();

        return $this;
    }

    private function manageRelations()
    {
        $this->createProductItem();
        $this->createProductCategory();
    }

    private function createProductCategory()
    {
        $this->product->categories()->attach($this->category_id);
    }

    private function createProductItem()
    {
       ProductItem::create([
            'product_id'    => $this->product->id,
            'name'          => $this->item_name,
            'text'          => $this->item_text,
            'price'         => $this->item_price,
            'quantity'      => $this->item_quantity,
            'bonus'         => $this->item_bonus,
            'creator_id'    => Auth::id(),
            'editor_id'     => Auth::id(),
        ]);
    }

    private function getMergingData()
    {
        return [
          'user_id' => Auth::id(),
        ];
    }

    public function getProduct()
    {
        return $this->product;
    }
}
