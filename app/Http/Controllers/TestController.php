<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function ajax(Request $request)
    {
        $rules = [
            'avatar' => 'nullable|image|mimes:jpg,png,jpeg|max:1000',
            'first_name' => 'required|min:2|max:25',
            'last_name' => 'required|min:2|max:25'
        ];

        $request->validate($rules);

        return response()->json([
            'status' => true,
            'message' => __('Data has been added successfully'),
            'name' => $request->first_name . ' ' . $request->last_name
        ]);
    }
}
