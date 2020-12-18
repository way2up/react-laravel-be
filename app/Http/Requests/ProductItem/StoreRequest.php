<?php

namespace App\Http\Requests\ProductItem;

use App\Models\ProductItem;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

/**
 * @property int product_id
 * @property string name
 * @property string text
 * @property int price
 * @property int quantity
 * @property int bonus
 */
class StoreRequest extends FormRequest
{
    public $productItem;

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'product_id'    => 'required|exists:products,id',
            'name'          => 'required|string',
            'text'          => 'required|string',
            'price'         => 'required|numeric',
            'quantity'      => 'required|integer|min:1',
            'bonus'         => 'numeric|min:0',
            'image'         => 'file'
        ];
    }

    public function persist()
    {
        $this->productItem = ProductItem::create(array_merge([
            'product_id'    => $this->product_id,
            'name'          => $this->name,
            'text'          => $this->text,
            'price'         => $this->price,
            'quantity'      => $this->quantity,
            'bonus'         => $this->bonus,
        ],$this->getMergingData()));

        return $this;
    }

    public function getMergingData()
    {
        return [
            'creator_id'    => Auth::id(),
            'editor_id'     => Auth::id()
        ];
    }

    public function getProductItem()
    {
        return $this->productItem;
    }
}
