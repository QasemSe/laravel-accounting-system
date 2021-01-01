<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Invoice\StoreInvoiceRequest;
use App\Models\Customer;
use App\Models\Invoice;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Traits\Sales;

class InvoicesController extends Controller
{
    use Sales;

    public function index()
    {
        $invoices = Invoice::orderBy('created_at', 'desc') -> paginate(15);
        return view('dashboard.invoices.index', compact('invoices'));
    }


    public function create()
    {
        $customers = Customer::all();
        $products = Product::all();

        // get next invoice number
        $next_invoice_number = $this->getNextInvoiceNumber();

        return view('dashboard.invoices.create', compact('customers', 'products', 'next_invoice_number'));
    }


    public function store(StoreInvoiceRequest $request)
    {
        $product = Product::where('id', $request->product_id)->first(['name', 'purchase_price']);

        Invoice::create([
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
            'status' => true,
            'message' => __('Data has been added successfully'),
            'data' => [
                'product_name' => $product->name,
                'next_invoice_number' => $this->getNextInvoiceNumber()
            ]
        ]);
    }


    public function show(Invoice $invoice)
    {
        return view('dashboard.invoices.show', compact('invoice'));
    }


    public function edit(Invoice $invoice)
    {
        //
    }


    public function update(Request $request, Invoice $invoice)
    {
        //
    }


    public function destroy(Invoice $invoice)
    {
        $invoice->delete();

        session()->flash('success', __('Data has been deleted successfully'));
        return redirect()->route('dashboard.sales.invoices.index');
    }
}
