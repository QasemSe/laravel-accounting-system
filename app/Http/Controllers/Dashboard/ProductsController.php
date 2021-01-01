<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\UpdateProductRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Requests\Product\StoreProductRequest;

class ProductsController extends Controller
{

    public function index()
    {
        // Get all categories
        $products = Product::orderBy('created_at', 'desc') -> paginate(15);

        return view('dashboard.products.index',
            compact('products'));
    }


    public function create()
    {
        $categories = Category::all();
        return view('dashboard.products.create', compact('categories'));
    }


    public function store(StoreProductRequest $request)
    {
        Product::create($request->only([
            'name',
            'description',
            'sale_price',
            'purchase_price',
            'quantity',
            'category_id'
        ]));

        return response()->json([
            'status' => true,
            'message' => __('Data has been added successfully'),
            'category_name' => $request->name
        ]);
    }


    public function edit(Product $product)
    {
        $categories = Category::all();

        return view('dashboard.products.edit', compact('categories', 'product'));
    }


    public function update(UpdateProductRequest $request, Product $product)
    {

        $product->update($request->only([
            'name',
            'description',
            'sale_price',
            'purchase_price',
            'quantity',
            'category_id'
        ]));

        return response()->json([
            'status' => true,
            'message' => __('Data has been updated successfully')
        ]);
    }


    public function destroy(Product $product)
    {
        $product->delete();

        session()->flash('success', __('Data has been deleted successfully'));
        return redirect()->route('dashboard.products.index');
    }
}
