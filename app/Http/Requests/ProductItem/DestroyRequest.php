<?php

namespace App\Http\Requests\ProductItem;

use App\Models\ProductItem;
use Illuminate\Foundation\Http\FormRequest;

/**
 * @property ProductItem product_item
 */
class DestroyRequest extends FormRequest
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

    public function destroy()
    {
        $this->product_item->delete();

        return $this;
    }

    public function getMessage()
    {
        return "Product item successfully deleted";
    }
}
