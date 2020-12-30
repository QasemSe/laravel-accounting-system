<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
{
    // Determine if the user is authorized to make this request.
    public function authorize()
    {
        return true;
    }

    // Get the validation rules that apply to the request.
    public function rules()
    {
        return [
            'name' => 'required|unique:products,name|min:3|max:255',
            'description' => 'nullable|max:255|min:5',
            'quantity' => 'required|integer|digits_between:1,11',
            'sale_price' => 'required|integer|digits_between:1,11',
            'purchase_price' => 'required|integer|digits_between:1,11',
            'category_id' => 'required|exists:categories,id'
        ];
    }
}
