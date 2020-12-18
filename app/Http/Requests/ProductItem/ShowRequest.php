<?php

namespace App\Http\Requests\ProductItem;

use App\Models\ProductItem;
use Illuminate\Foundation\Http\FormRequest;

/**
 * @property ProductItem product_item
 */
class ShowRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            //
        ];
    }

    public function getProductItem()
    {
        return $this->product_item;
    }
}
