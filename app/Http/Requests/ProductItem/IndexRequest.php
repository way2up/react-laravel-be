<?php

namespace App\Http\Requests\ProductItem;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @property int product_id
 */
class IndexRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'product_id' => 'required|exists:products,id'
        ];
    }
}
