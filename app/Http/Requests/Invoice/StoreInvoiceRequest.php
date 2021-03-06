<?php

namespace App\Http\Requests\Invoice;

use Dotenv\Exception\ValidationException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class StoreInvoiceRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'customer_id' => 'nullable|exists:categories,id',
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|digits_between:1,11',
            'price' => 'required|integer|digits_between:1,11',
            'invoiced_at' => 'required|date',
            'due_at' => 'required|date',
        ];
    }


}
