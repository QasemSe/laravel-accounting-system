<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\StoreCategoryRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{

    public function index()
    {
        // Get all categories
        $categories = Category::orderBy('created_at', 'desc') -> paginate(5);

        return view('dashboard.categories.index',
            compact('categories'));
    }


    public function create()
    {
        return view('dashboard.categories.create');
    }


    public function store(StoreCategoryRequest $request)
    {
        $category = Category::create([
            'name' => $request->name,
            'description' => $request->description,
            'created_by' => auth()->id()
        ]);


        return response()->json([
            'status' => true,
            'message' => __('Data has been added successfully'),
            'category_name' => $request->name
        ]);
    }


    public function show(Category $category)
    {
        //
    }


    public function edit(Category $category)
    {
        //
    }


    public function update(Request $request, Category $category)
    {
        //
    }


    public function destroy(Category $category)
    {
        Product::whereCategoryId($category->id)->update(['category_id' => null]);
        $category->delete();

        session()->flash('success', __('Data has been deleted successfully'));
        return redirect()->route('dashboard.categories.index');
    }
}
