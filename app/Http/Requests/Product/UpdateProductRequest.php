<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'name' => "required|min:3|max:255|unique:products,name,{$this->product->id}",
            'description' => 'nullable|max:255|min:5',
            'quantity' => 'required|integer|digits_between:1,11',
            'sale_price' => 'required|integer|digits_between:1,11',
            'purchase_price' => 'required|integer|digits_between:1,11',
            'category_id' => 'required|exists:categories,id'
        ];
    }
}
