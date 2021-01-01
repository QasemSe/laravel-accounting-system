<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\Invoice\StoreInvoiceRequest;
use App\Http\Requests\Invoice\UpdateInvoiceRequest;
use App\Http\Traits\Sales;
use App\Models\Invoice;
use App\Models\Product;
use Illuminate\Http\Request;

class InvoicesController extends Controller
{
    use Sales;

    public function index()
    {
        $invoices = Invoice::all(['invoice_number', 'total']);
        return response()->json([
            'status' => 'success',
            'count' => $invoices->count(),
            'data' => $invoices
        ]);
    }


    public function store(StoreInvoiceRequest $request)
    {
        $product = Product::where('id', $request->product_id)->first(['purchase_price']);

        $invoice = Invoice::create([
            'invoice_number' => $this->getNextInvoiceNumber(),
            'customer_id' => $request->input('customer_id'),
            'product_id' => $request->input('product_id'),
            'invoiced_at' => $request->input('invoiced_at'),
            'due_at' => $request->input('due_at'),
            'quantity' => $request->input('quantity'),
            'price' => $request->input('price'),
            'total' => $request->input('price') * $request->input('quantity'),
            'profit' => ( $request->input('price') - $product->purchase_price ) * $request->input('quantity')
        ]);

        return response()->json([
            'status' => __('Data has been added successfully'),
            'invoice_data' => $invoice
        ]);
    }


    public function show(Invoice $invoice)
    {
        return response()->json([
            'status' => 'success',
            'data' => $invoice
        ]);
    }


    public function update(UpdateInvoiceRequest $request, Invoice $invoice)
    {
        $product = Product::where('id', $request->product_id)->first(['purchase_price']);

        $invoice->update([
            'invoice_number' => $this->getNextInvoiceNumber(),
            'customer_id' => $request->input('customer_id'),
            'product_id' => $request->input('product_id'),
            'invoiced_at' => $request->input('invoiced_at'),
            'due_at' => $request->input('due_at'),
            'quantity' => $request->input('quantity'),
            'price' => $request->input('price'),
            'total' => $request->input('price') * $request->input('quantity'),
            'profit' => ( $request->input('price') - $product->purchase_price ) * $request->input('quantity')
        ]);

        return response()->json([
            'status' => __('Data has been updated successfully'),
            'invoice_data' => $invoice
        ]);
    }


    public function destroy(Invoice $invoice)
    {
        $invoice->delete();
        return response()->json([
            'status' => __('Data has been deleted successfully'),
            'invoice_data' => $invoice
        ]);
    }
}
