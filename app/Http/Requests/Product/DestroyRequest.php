<?php

namespace App\Http\Requests\Product;

use App\Models\Product;
use Illuminate\Foundation\Http\FormRequest;

/**
 * @property Product product
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
        $this->product->delete();
        return $this;
    }

    public function getMessage()
    {
        return "Product item successfully deleted";
    }
}
